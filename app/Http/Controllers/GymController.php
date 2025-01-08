<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ReCaptcha\ReCaptcha;
use App\Models\Gyms;
use App\Models\Gymlogs;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Comment;
use App\Models\Reviews;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\Images;
use Carbon\Carbon;
use App\Services\BadWordService;

class GymController extends Controller
{
    protected $badWordService;

    public function __construct(BadWordService $badWordService)
    {
        $this->badWordService = $badWordService;
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if( !isset($user->type) ){
            return redirect('/user/login?return_url='.$request->fullUrl());
        }        
        
        $gym = [];
        $states = States::where("country", "US")->get();
        if(old("country")){
            $states = States::where("country", old("country"))->get();
        }
        if($request->country){
            $states = States::where("country", $request->country)->get();
        }
        $countries = Country::orderBy("name", "asc")->get(["id", "name"]);
        $message = 'You can add your gym using the form below.';
        $method = $request->method();
        $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
        $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());
        
        if ($method == "POST") {
            $valid_item = [
                'name' => 'required|min:5',
                'address' => 'required|min:5',
                'city' => 'required|min:3',
                'country' => 'required',
                // 'state' => 'required',
                'zip' => 'required|min:5',
                'phone' => 'required|min:10',
                'details' => 'required'
            ];

            if($request->country == "US" || $request->country == "CA" || $request->country == "AU"){
                $valid_item['state'] = 'required';
            }
            
            if(!isset($user->type)){
                if ($response->isSuccess()) {
                    // reCAPTCHA verification successful, process the form submission
                }
                else{
                    $valid_item['recaptcha-token'] = 'required';
                }
            }

            $validated = $request->validate($valid_item);
            
            $gym = Gyms::create([
                'name' => $request->name,
                'website' => $request->website,
                'phone' => $request->phone,
                'address' => $request->address,
                'country_id' => $request->country,
                'city' => $request->city,
                'state' => ($request->state) ? $request->state : "",
                'zip' => $request->zip,
                'details' => $request->details,
                'kids_program_url' => $request->kidsProgramUrl,
                'kids_program_detail' => $request->kidsProgramDetail,
                'woman_only_program_url' => $request->womanOnlyProgramUrl,
                'woman_only_program_detail' => $request->womanOnlyProgramDetail,
                'other_programs' => $request->otherPrograms,
                'pricing' => $request->pricing,
                'schedule_url' => $request->scheduleUrl,
                'business_hour' => $request->businessHour,
                'head_professor' => $request->headProfessor,
                'special_offer' => $request->specialOffer,
                'facebook_url' => $request->facebookUrl,
                'youtube_channel' => $request->youtubeChannel,
                'video_url' => $request->videoUrl,
                'awards' => $request->awards,
                'multiple_locations' => $request->multipleLocations,
                'created' => new \DateTime(),
            ]);

            $message = 'Thank you for posting your gym information.  <br/><br/>';
            if(isset($user->type)){
                $gym->updatedby = $user->id;
                
                if($user->type == 'ADMIN'){
                    $gym->approved = 1;
                    $message .= 'The information has been saved.<br/><br/>';
                    $message .= '<a href="/dojo-detail/' . $gym->id . '">View to listing details</a>';
                }
                else{
                    $gym->approved = 0;
                    $message .=  'Your information will be reviewed for approval within 1-2 business days.';
                }
            }
            else{
                $gym->approved = 0;
                $message .=  'Your information will be reviewed for approval within 1-2 business days.';
            }

            $gym->save();
        }

        return view('gym-form', compact('gym', 'user', 'states', 'message', 'request', 'countries'));
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $gymId = request()->route()->parameter('id');

        $gym = Gyms::where('gyms.id', $gymId)
                    ->join('country as c', 'gyms.country_id', '=', 'c.id')
                    ->select('gyms.*', 'c.name as cname')
                    ->first();

        if (!$gym || $gym->approved <= -2) {
            return redirect('/');
        }

        $gym->phone = $this->formatPhoneNumber($gym->phone);

        if (!$gym->lat || !$gym->lng) {
            $coordinates = $this->geocode($gym->address, $gym->city, $gym->state, $gym->zip);

            if ($coordinates) {
                $coordinatesSplit = explode(",", $coordinates,2);
                $gym->lat = $coordinatesSplit[1];
                $gym->lng = $coordinatesSplit[0];
                $gym->save();
            }
        }

        $state = States::where('state_code', $gym->state)->first();
        
        $city = Cities::where('city', $gym->city)
                        ->where('state', $gym->state)
                        ->first();
        
        // $comments = Comment::where('gym_id', $gymId)
        //                     ->where('approved', 1)
        //                     ->get();

        $images = Images::where('gym_id', $gymId)
                        ->where('approved', 1)
                        ->get();

        $reviews = Reviews::where('gym_id', $gymId)
                        ->where('approved', '1')
                        ->get();

        foreach($reviews as $review){
            $review->review_by = $this->badWordService->maskBadWords($review->review_by);
            $review->comment = $this->badWordService->maskBadWords($review->comment);
        }

        $questions = Questions::where(function($query) use ($gymId) {
                                $query->where('gym_id', 0)
                                    ->orWhere('gym_id', $gymId);
                            })
                            ->where('approved', '1')
                            ->orderBy('created_at', 'desc')
                            ->get();
        foreach ($questions as $question) {
            $answers = Answers::where('question_id', $question->id)
                                ->where('gym_id', $gymId)
                                ->where('approved', '1')
                                ->orderBy('created_at', 'desc')
                                ->get();
            if( !empty($answers) ){
                foreach ($answers as $answer) {
                    $answer->answer_by = $this->badWordService->maskBadWords($answer->answer_by);
                    $answer->answer = $this->badWordService->maskBadWords($answer->answer);
                }
                $question->answers = $answers;
            }
            else{
                $question->answers = [];
            }

            $created = Carbon::createFromFormat('Y-m-d H:i:s', $question->created_at);
            $now = Carbon::now();
            $interval = $now->diff($created);

            $question->passed = $this->formatInterval($interval);
            $question->question_by = $this->badWordService->maskBadWords($question->question_by);
            $question->question = $this->badWordService->maskBadWords($question->question);
        }

        return view('gym-show', compact('user', 'gym', 'state', 'city', 'reviews', 'questions', 'images'))->with('loginpopup', session('loginpopup'))->with('signuppopup', session('signuppopup'));
    }

    public function state(Request $request)
    {
        $user = Auth::user();
        
        $stateName = request()->route()->parameter('statename');

        $state = States::where('statefile', $stateName)->first();

        if (!$state) {
            return redirect('/');
        }

        $cities = Cities::where('state', $state->state_code)
                        ->where('gym_count', '>', 0)
                        ->orderBy('city')
                        ->get();

        $gyms = Gyms::where('approved', 1)
                    ->where('state', $state->state_code)
                    ->orderByDesc('updated_at')
                    ->limit(5)
                    ->get();

        foreach($gyms as $gym){
            $gym->phone = $this->formatPhoneNumber($gym->phone);
        }

        $parsedUrl = parse_url(url()->current());
        // Get the path and query
        $page_url = $parsedUrl['path'] . (isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '');
        $questions = Questions::where(function($query) use ($page_url) {
                                $query->where('gym_id', 0)
                                    ->orWhere('page_url', $page_url);
                            })
                            ->where('approved', '1')
                            ->orderBy('created_at', 'desc')
                            ->get();
        foreach ($questions as $question) {
            $answers = Answers::where('question_id', $question->id)
                                ->where('page_url', $page_url)
                                ->where('approved', '1')
                                ->orderBy('created_at', 'desc')
                                ->get();
            if( !empty($answers) ){
                foreach ($answers as $answer) {
                    $answer->answer_by = $this->badWordService->maskBadWords($answer->answer_by);
                    $answer->answer = $this->badWordService->maskBadWords($answer->answer);
                }
                $question->answers = $answers;
            }
            else{
                $question->answers = [];
            }

            $created = Carbon::createFromFormat('Y-m-d H:i:s', $question->created_at);
            $now = Carbon::now();
            $interval = $now->diff($created);

            $question->passed = $this->formatInterval($interval);
            $question->question_by = $this->badWordService->maskBadWords($question->question_by);
            $question->question = $this->badWordService->maskBadWords($question->question);
        }
 
        return view('gym-state', compact('user', 'gyms', 'state', 'cities', 'request', 'questions', 'page_url'));
    }

    public function city(Request $request)
    {
        $user = Auth::user();
        
        $cityName = request()->route()->parameter('cityname');

        $city = Cities::where('filename', $cityName)->first();

        if (!$city) {
            return redirect('/');
        }

        $state = States::where('state_code', $city->state)
                        ->where('country', $city->country_id)
                        ->first();
        
        $gyms = Gyms::where('approved', 1)
                    ->where('state', $city->state)
                    ->where('city', $city->city)
                    ->orderBy('name')
                    ->get();
    
        foreach($gyms as $gym){
            $gym->phone = $this->formatPhoneNumber($gym->phone);
        }

        $parsedUrl = parse_url(url()->current());
        // Get the path and query
        $page_url = $parsedUrl['path'] . (isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '');
        $questions = Questions::where(function($query) use ($page_url) {
                                $query->where('gym_id', 0)
                                    ->orWhere('page_url', $page_url);
                            })
                            ->where('approved', '1')
                            ->orderBy('created_at', 'desc')
                            ->get();
        foreach ($questions as $question) {
            $answers = Answers::where('question_id', $question->id)
                                ->where('page_url', $page_url)
                                ->where('approved', '1')
                                ->orderBy('created_at', 'desc')
                                ->get();
            if( !empty($answers) ){
                foreach ($answers as $answer) {
                    $answer->answer_by = $this->badWordService->maskBadWords($answer->answer_by);
                    $answer->answer = $this->badWordService->maskBadWords($answer->answer);
                }
                $question->answers = $answers;
            }
            else{
                $question->answers = [];
            }

            $created = Carbon::createFromFormat('Y-m-d H:i:s', $question->created_at);
            $now = Carbon::now();
            $interval = $now->diff($created);

            $question->passed = $this->formatInterval($interval);
            $question->question_by = $this->badWordService->maskBadWords($question->question_by);
            $question->question = $this->badWordService->maskBadWords($question->question);
        }
        
        return view('gym-city', compact('user', 'gyms', 'state', 'city', 'request', 'questions', 'page_url'))->with('location', session('location'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        
        if( !isset($user->type) ){
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

            if ($user->type != "ADMIN") {
                $gymlog = Gymlogs::create([
                    'gym_id' => $gymId,
                    'name' => $request->name,
                    'website' => $request->website,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country_id' => $request->country,
                    'city' => $request->city,
                    'state' => ($request->state) ? $request->state : "",
                    'zip' => $request->zip,
                    'details' => $request->details,
                    'kids_program_url' => $request->kidsProgramUrl,
                    'kids_program_detail' => $request->kidsProgramDetail,
                    'woman_only_program_url' => $request->womanOnlyProgramUrl,
                    'woman_only_program_detail' => $request->womanOnlyProgramDetail,
                    'other_programs' => $request->otherPrograms,
                    'pricing' => $request->pricing,
                    'schedule_url' => $request->scheduleUrl,
                    'business_hour' => $request->businessHour,
                    'head_professor' => $request->headProfessor,
                    'special_offer' => $request->specialOffer,
                    'facebook_url' => $request->facebookUrl,
                    'youtube_channel' => $request->youtubeChannel,
                    'video_url' => $request->videoUrl,
                    'awards' => $request->awards,
                    'multiple_locations' => $request->multipleLocations,
                    'updatedby' => $user->id,
                    'approved' => 0,
                    'user_id' => $user->id,
                    'ip_address' => request()->ip(),
                    'created_at' => new \DateTime(),
                ]);
            }
            else{
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
            }

            $message = 'Thank you for posting your property information.  <br/><br/>';
            $message .= 'Your information will be reviewed for approval within 1-2 business days.';
        }

        return view('gym-edit', compact('gym', 'user', 'states', 'message', 'request', 'countries'));
    }

    public function geocode($street, $city, $state, $zip)
    {
        $url = "http://maps.googleapis.com/maps/api/geocode/xml?sensor=false";

        $address = $street . " " . $city . " " . $state . " " . $zip;

        $requestUrl = $url . "&address=" . urlencode($address);
        $xml = simplexml_load_file($requestUrl);

        if (!$xml) {
            return false;
        }

        $status = $xml->status;

        if (strcmp($status, "OK") == 0) {
            $location = $xml->result->geometry->location;

            return $location->lng . "," . $location->lat;
        } else {
            return false;
        }
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

    public function states_in_country(Request $request)
    {
        $states = States::where('country', $request->country_id)->get();
        return $states;
	}

    public function formatInterval($interval) {
        if ($interval->y > 0) {
            return $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
        } elseif ($interval->m > 0) {
            return $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
        } elseif ($interval->d > 0) {
            return $interval->d . ' day' . ($interval->d > 1 ? 's' : '');
        } elseif ($interval->h > 0) {
            return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '');
        } elseif ($interval->i > 0) {
            return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '');
        } else {
            return $interval->s . ' second' . ($interval->s > 1 ? 's' : '');
        }
    }
}
