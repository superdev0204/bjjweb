<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gyms;
use App\Models\Gymlogs;
use App\Models\States;
use App\Models\Country;

class GymLogController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();

        $id = request()->route()->parameter('id');
        if(!empty($id)){
            $gymlog = Gymlogs::where('id', $id)
                            ->first();
            
            if(!empty($gymlog)){
                $gym = Gyms::where('id', $gymlog->gym_id)
                            ->first();
            }
            else{
                $gym = [];
                $gymlog = [];
            }
        }
        else{
            $gym = [];
            $gymlog = [];
        }

        if(isset($user->type) && $user->type == 'ADMIN'){
            return view('admin.compair_gym', compact('user', 'gym', 'gymlog'));
        }
        else{
            return redirect('/user/login');
        }
    }


    public function approve_gymlog(Request $request)
    {
        $user = Auth::user();

        $gymlog = Gymlogs::find($request->id);

        if(!empty($gymlog)){
            // $filename = mb_strtolower($salonsuitelog->name, 'UTF-8');
            // $filename = str_replace(" ", "-", $filename);
            // $filename = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);
            // $filename = preg_replace('/-+/', '-', $filename);
            $gym = Gyms::find($gymlog->gym_id);
            $gym->name = $gymlog->name;
            // $gym->filename = $filename;
            $gym->website = $gymlog->website;
            $gym->phone = $gymlog->phone;
            $gym->address = $gymlog->address;
            $gym->city = $gymlog->city;
            $gym->state = $gymlog->state;
            $gym->country_id = $gymlog->country_id;
            $gym->zip = $gymlog->zip;
            $gym->lat = $gymlog->lat;
            $gym->lng = $gymlog->lng;
            $gym->stars = $gymlog->stars;
            $gym->details = $gymlog->details;
            $gym->logo_url = $gymlog->logo_url;
            $gym->kids_program_url = $gymlog->kids_program_url;
            $gym->kids_program_detail = $gymlog->kids_program_detail;
            $gym->woman_only_program_url = $gymlog->woman_only_program_url;
            $gym->woman_only_program_detail = $gymlog->woman_only_program_detail;
            $gym->other_programs = $gymlog->other_programs;
            $gym->pricing = $gymlog->pricing;
            $gym->schedule_url = $gymlog->schedule_url;
            $gym->business_hour = $gymlog->business_hour;
            $gym->head_professor = $gymlog->head_professor;
            $gym->special_offer = $gymlog->special_offer;
            $gym->email = $gymlog->email;
            $gym->facebook_url = $gymlog->facebook_url;
            $gym->youtube_channel = $gymlog->youtube_channel;
            $gym->video_url = $gymlog->video_url;
            $gym->awards = $gymlog->awards;
            $gym->multiple_locations = $gymlog->multiple_locations;
            $gym->updatedby = $gymlog->updatedby;
            $gym->user_id = $gymlog->user_id;
            $gym->approved = '1';
            $gym->save();

            $gymlog->approved = '1';
            $gymlog->save();
        }
        
        return redirect('/admin')->with('success', 'The gym approved successfully');
    }

    public function disapprove_gymlog(Request $request)
    {
        $user = Auth::user();

        $gymlog = Gymlogs::find($request->id);
        
        if(!empty($gymlog)){
            $gymlog->approved = '-1';
            $gymlog->save();
        }
        
        return redirect('/admin')->with('success', 'The gym is not approved successfully');
    }

    public function delete_gymlog(Request $request)
    {
        $user = Auth::user();

        $gymlog = Gymlogs::find($request->id);
        
        if(!empty($gymlog)){
            $gymlog->delete();
        }
        
        return redirect('/admin')->with('success', 'The gym deleted successfully');
    }

    public function approve_gym(Request $request)
    {
        $user = Auth::user();

        $gym = Gyms::find($request->id);
        
        if(!empty($gym)){
            $gym->approved = '1';
            $gym->save();
        }
        
        return redirect('/admin')->with('success', 'The gym approved successfully');
    }

    public function disapprove_gym(Request $request)
    {
        $user = Auth::user();

        $gym = Gyms::find($request->id);
        
        if(!empty($gym)){
            $gym->approved = '-1';
            $gym->save();
        }
        
        return redirect('/admin')->with('success', 'The gym is not approved successfully');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        
        if( !isset($user->type) || $user->type != "ADMIN" ){
            return redirect('/user/login?return_url='.$request->fullUrl());
        }
        
        $gymId = $request->id;
        if (!$gymId) {
            return redirect('/');
        }

        $method = $request->method();
        $message = 'You can add your gym using the form below.';
        // $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
        // $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        /** @var Gym $gym */
        $gym = Gyms::where('gyms.id', $gymId)
                    ->join('country as c', 'gyms.country_id', '=', 'c.id')
                    ->select('gyms.*', 'c.name as cname')
                    ->first();
        // $gym->phone = $this->formatPhoneNumber($gym->phone);
        
        if (!$gym) {
            return redirect('/');
        }

        $states = States::where("country", "US")->get();
        if($gym->country_id){
            $states = States::where("country", $gym->country_id)->get();
        }
        if(old("country")){
            $states = States::where("country", old("country"))->get();
        }
        if($request->country){
            $states = States::where("country", $request->country)->get();
        }
        $countries = Country::orderBy("name", "asc")->get(["id", "name"]);

        if ($method == "POST") {
            $valid_item = [
                'name' => 'required|min:5',
                'address' => 'required|min:5',
                'city' => 'required|min:3',
                'country' => 'required|min:2',
                // 'state' => 'required',
                'zip' => 'required|min:5',
                'phone' => 'required|min:10',
                'details' => 'required'
            ];

            if($request->country == "US" || $request->country == "CA" || $request->country == "AU"){
                $valid_item['state'] = 'required';
            }

            // if ($response->isSuccess()) {
            //     // reCAPTCHA verification successful, process the form submission
            // }
            // else{
            //     $valid_item['recaptcha-token'] = 'required';
            // }

            $validated = $request->validate($valid_item);

            $gym->name = $request->name;
            $gym->website = $request->website;
            $gym->phone = $request->phone;
            $gym->address = $request->address;
            $gym->country_id = $request->country;
            $gym->city = $request->city;
            $gym->state = ($request->state) ? $request->state : "";
            $gym->zip = $request->zip;
            $gym->details = $request->details;
            $gym->kids_program_url = $request->kidsProgramUrl;
            $gym->kids_program_detail = $request->kidsProgramDetail;
            $gym->woman_only_program_url = $request->womanOnlyProgramUrl;
            $gym->woman_only_program_detail = $request->womanOnlyProgramDetail;
            $gym->other_programs = $request->otherPrograms;
            $gym->pricing = $request->pricing;
            $gym->schedule_url = $request->scheduleUrl;
            $gym->business_hour = $request->businessHour;
            $gym->head_professor = $request->headProfessor;
            $gym->special_offer = $request->specialOffer;
            $gym->facebook_url = $request->facebookUrl;
            $gym->youtube_channel = $request->youtubeChannel;
            $gym->video_url = $request->videoUrl;
            $gym->awards = $request->awards;
            $gym->multiple_locations = $request->multipleLocations;
            $gym->updatedby = $user->id;

            $gym->save();

            $message = 'Thank you for posting your property information.  <br/><br/>';
        }

        return view('admin.gym-edit', compact('gym', 'user', 'states', 'message', 'request', 'countries'));
    }

    public function delete_gym(Request $request)
    {
        $user = Auth::user();

        $gym = Gyms::find($request->id);
        
        if(!empty($gym)){
            $gym->delete();
        }
        
        return redirect('/admin')->with('success', 'The gym deleted successfully');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $method = $request->method();

        if(!$user || $user->type != 'ADMIN'){
            return redirect('/user/login');
        }

        $states = States::all();
        
        if ($method == "POST") {
            $post = $request->all();
            $post = array_filter($post);
            unset($post['search']);
            unset($post['_token']);

            if (empty($post)) {
                $message = 'Please enter a search criteria!';
                return view('admin.gym-search', compact('user', 'states', 'request', 'message'));
            }

            $query = Gyms::orderBy('name', 'asc');
            if($request->name){
                $values = explode(' ', $request->name);
                foreach ($values as $value) {
                    $query->where('name', 'like', '%' . $value . '%');
                }
            }

            if($request->phone){
                $strippedPhoneNumber = preg_replace("/[^0-9]/", "", $request->phone);
                if (strlen($strippedPhoneNumber) == 10) {
                    $query->where('phone', 'like', '%' . substr($strippedPhoneNumber, 0, 3) . '%')
                        ->where('phone', 'like', '%' . substr($strippedPhoneNumber, 3, 3) . '-' . substr($strippedPhoneNumber, -4));
                } else {
                    $query->where('phone', 'like', '%' . $request->phone . '%');
                }
            }

            if($request->address){
                $query->where('address', 'like', '%' . $request->address . '%');
            }

            if($request->zip){
                $query->where('zip', $request->zip);
            }

            if($request->city){
                $query->where('city', $request->city);
            }

            if($request->state){
                $query->where('state', $request->state);
            }

            if($request->email){
                $query->where('email', $request->email);
            }

            if($request->id){
                $query->where('id', $request->id);
            }

            $gyms = $query->limit(100)->get();

            return view('admin.gym-search', compact('user', 'states', 'request', 'gyms'));
        }

        return view('admin.gym-search', compact('user', 'states', 'request'));
    }

    public function getCountryInfo($countryname)
    {
        // $country = Country::where('name', $countryname)->select("id")->first();
        $country = DB::select('SELECT * FROM country where name="United States" limit 1');
        if($country){
            return $country[0];
        }
	}
}
