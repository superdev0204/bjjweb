<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use ReCaptcha\ReCaptcha;
use App\Models\Reviews;
use App\Models\Gyms;
use App\Models\User;

class ReviewController extends Controller
{
    public function send_review(Request $request)
    {
        $user = Auth::user();

        $method = $request->method();
        $gymId = $request->input('gymId');
        $message = 'You can leave a message using the form below.';
        $review = [];

        if (!$gymId) {
            return redirect('/');
        }

        $gym = Gyms::where('gyms.id', $gymId)
                    ->join('country as c', 'gyms.country_id', '=', 'c.id')
                    ->select('gyms.*', 'c.name as cname')
                    ->first();

        if (!$gym) {
            return redirect('/');
        }

        if ($method == "POST") {
            $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
            $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());
            
            $withErrors = [];
            if(!$request->review){
                $withErrors['review'] = 'The review field is required';
            }

            if(!$request->rating1 || !$request->rating2 || !$request->rating3 || !$request->rating4 || !$request->rating5){
                $withErrors['rating'] = 'The rating field is required';
            }

            if(!isset($user->type)){
                if ($response->isSuccess()) {
                    // reCAPTCHA verification successful, process the form submission
                }
                else{
                    $withErrors['recaptcha-token'] = 'The recaptcha-token field is required.';
                }

                if(!$request->review_userEmail){
                    $withErrors['review_userEmail'] = 'The review user email field is required';
                }

                if(!$request->review_userName){
                    $withErrors['review_userName'] = 'The review user name field is required';
                }

                if($request->review_userName && strlen($request->review_userName) < 5){
                    $withErrors['review_userName'] = 'The review user name field must be at least 5 characters.';
                }
            }

            if(count($withErrors) > 0){
                return view('gym-review', compact('gym', 'user', 'message', 'request'))->withErrors($withErrors);
            }            
            
            if(isset($user->type)){
                $review = Reviews::create([
                    'gym_id' => $gymId,
                    'overall_rating' => $request->rating1,
                    'facilities_rating' => $request->rating2,
                    'curriculum_rating' => $request->rating3,
                    'teachers_rating' => $request->rating4,
                    'safety_rating' => $request->rating5,
                    'comment' => $request->review,
                    'user_id' => $user->id,
                    'approved' => '0',
                    'email' => $user->email,
                    'review_by' => $user->firstname . " " . $user->lastname,
                    'experience' => $request->experience,
                    'ip_address' => request()->ip(),
                    'email_verified' => '1',
                ]);
            }
            else{
                $review = Reviews::create([
                    'gym_id' => $gymId,
                    'overall_rating' => $request->rating1,
                    'facilities_rating' => $request->rating2,
                    'curriculum_rating' => $request->rating3,
                    'teachers_rating' => $request->rating4,
                    'safety_rating' => $request->rating5,
                    'comment' => $request->review,
                    'email' => $request->review_userEmail,
                    'review_by' => $request->review_userName,
                    'experience' => $request->experience,
                    'ip_address' => request()->ip()
                ]);
            }

            $message = 'Your comment is successfully save.  It will be displayed after we review and approve your comment.';
        }
        
        return view('gym-review', compact('gym', 'review', 'user', 'message', 'request'));
    }

    public function approve_review_ok(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type)){
            $reviewid = $request->id;
            if(!empty($reviewid)){
                $review = Reviews::where('id', $reviewid)->first();
                $review->approved = '1';
                $review->save();
                return redirect('/admin')->with('success', 'The review is approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }        
    }

    public function approve_review_no(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type) && $user->type=='ADMIN'){
            $reviewid = $request->id;
            if(!empty($reviewid)){
                $review = Reviews::where('id', $reviewid)->first();
                $review->approved = '-1';
                $review->save();
                return redirect('/admin')->with('success', 'The review is not approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }        
    }

    public function review_editor(Request $request)
    {
        $user = Auth::user();
        $ratings = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'];

        if(isset($user->type) && ($user->type == 'ADMIN')){
            if(isset($request->id) && !empty($request->id)){
                $review = Reviews::find($request->id);
                if(!empty($review)){
                    return view('admin.review_editor', compact('user', 'review'))->with('ratings', $ratings);
                }
                else{
                    return redirect('/admin');
                }
            }
            else{
                return redirect('/admin');
            }
        }
    }

    public function review_update(Request $request)
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            if(isset($request->review_id) && !empty($request->review_id)){
                $review = Reviews::where('id', $request->review_id)->first();
                $review->overall_rating = $request->overall_rating;
                $review->facilities_rating = $request->facilities_rating;
                $review->curriculum_rating = $request->curriculum_rating;
                $review->teachers_rating = $request->teachers_rating;
                $review->safety_rating = $request->safety_rating;
                $review->comment = $request->comment;                
                $review->save();
                return redirect('/admin');
            }            
        }
        else{
            return redirect('/');
        }
    }

    public function helpful_counter(Request $request)
    {
        $user = Auth::user();
        
        if(isset($request->review_id) && !empty($request->review_id)){
            $review = Reviews::where('id', $request->review_id)->first();
            $review->helpful = $request->helpful + 1;                
            $review->save();
        }
    }

    public function nohelp_counter(Request $request)
    {
        $user = Auth::user();
        
        if(isset($request->review_id) && !empty($request->review_id)){
            $review = Reviews::where('id', $request->review_id)->first();
            $review->nohelp = $request->nohelp + 1;
            $review->save();
        }
    }
}
