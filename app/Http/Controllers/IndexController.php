<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gyms;
use App\Models\Cities;
use App\Models\Zipcodes;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if( isset($request->location) ){            
            $validated = $request->validate([
                'location' => 'required|min:3'
            ]);

            $location = $request->location;
            
            if (preg_match('/\d+/', $location, $matches)) {
                $zip = $matches[0];
                $gyms = Gyms::where('approved', 1)
                            ->where('zip', $zip)
                            ->limit(100)
                            ->get();
            } else {
                @list($city, $stateCode) = explode(',', $location);

                $city = trim($city);
                $state = trim($stateCode);

                $gyms = Gyms::where('approved', 1)
                            ->where('city', $city)
                            ->where('state', $state)
                            ->limit(100)
                            ->get();
            }
        }
        else{
            $gyms = Gyms::where('approved', 1)
                    // ->where('country_id', 'US')
                    ->orderByDesc('updated_at')
                    ->limit(5)
                    ->get();
        }

        foreach($gyms as $gym){
            $gym->phone = $this->formatPhoneNumber($gym->phone);
        }        

        return view('index', compact('gyms', 'user', 'request'));

    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $method = $request->method();

        if ($method == "GET") {
            $message = 'Please enter one of the following criteria for search.';
            return view('search', compact('user', 'message'));
        }

        $valid_item = [
            'location' => 'required|min:3'
        ];
        
        if( isset($request->name) && !empty($request->name) ){
            $valid_item['name'] = 'required|min:5';
        }

        if( isset($request->address) && !empty($request->address) ){
            $valid_item['address'] = 'required|min:5';
        }

        if( isset($request->phone) && !empty($request->phone) ){
            $valid_item['phone'] = 'required|min:10';
        }

        $validated = $request->validate($valid_item);

        $location = $request->location;

        if (preg_match('/\d+/', $location, $matches)) {
            $zip = $matches[0];
            $zipcode = Zipcodes::where('zipcodes.zipcode', strtoupper(trim($zip)))
                                ->join('states as s1', 'zipcodes.state', '=', 's1.state_code')
                                ->join('cities as c1', 'zipcodes.city', '=', 'c1.city')
                                ->join('cities as c2', 'zipcodes.state', '=', 'c2.state')
                                ->select('c1.filename as cfilename', 's1.statefile as sfilename')
                                ->first();
            if( !empty($zipcode) && !$request->address && !$request->name && !$request->phone ){
                return redirect('/' . $zipcode->sfilename . '-dojos/' . $zipcode->cfilename . '-city')->with('location', $location);
            }

            $query = Gyms::where('approved', 1)
                        ->where('zip', $zip)
                        ->limit(100);
        } else {
            @list($cityname, $statecode) = explode(',', $location);

            $cityname = trim($cityname);
            $statecode = trim($statecode);

            $city = Cities::where('cities.city', $cityname)
                        ->where('cities.state', $statecode)
                        ->join('states as s1', 'cities.state', '=', 's1.state_code')
                        ->select('cities.filename as cfilename', 's1.statefile as sfilename')
                        ->first();

            if( !empty($city) && !$request->address && !$request->name && !$request->phone ){
                return redirect('/' . $city->sfilename . '-dojos/' . $city->cfilename . '-city')->with('location', $location);
            }

            $query = Gyms::where('approved', 1)
                        ->where('city', $cityname)
                        ->where('state', $statecode)
                        ->limit(100);
        }

        if ($request->address) {
            $query->where('address', $request->address);
        }

        if ($request->name) {
            $query->where('name', $request->name);
        }

        if ($request->phone) {
            $query->where('phone', $request->phone);
        }

        $gyms = $query->get();

        // if (!count($gyms)) {
        //     $message = 'There is no result for your selected criteria.  Please try again with different criteria.';
        //     return view('search', compact('user', 'message', 'request'));
        // }

        $message = 'There are ' . count($gyms) . ' gyms found.';

        return view('search', compact('gyms', 'user', 'message', 'request'));
    }

    public function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);

		if(strlen($phoneNumber) == 7) {
            return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phoneNumber);
        } elseif(strlen($phoneNumber) == 10) {
            return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phoneNumber);
        } else {
            return $phoneNumber;
        }
	}
}
