<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\Gyms;
use ReCaptcha\ReCaptcha;

class QuestionController extends Controller
{
    public function send_question(Request $request)
    {
        $user = Auth::user();
        
        $method = $request->method();
        $message = 'You can leave a message using the form below.';
        
        $gymId = $request->input('gymId');

        if (!$gymId && !$request->page_url) {
            return redirect('/');
        }

        $gym = [];
        $page_url = "";

        if ($gymId) {
            $gym = Gyms::where('gyms.id', $gymId)
                        ->join('country as c', 'gyms.country_id', '=', 'c.id')
                        ->select('gyms.*', 'c.name as cname')
                        ->first();

            if (!$gym) {
                return redirect('/');
            }
        }

        if ($request->page_url) {
            $page_url = $request->page_url;
        }
        
        if ($method == "POST") {
            $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
            $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

            $valid_item = [
                'question' => 'required'
            ];

            if(!$user){
                $valid_item['userName'] = 'required|min:3';
                $valid_item['userEmail'] = 'required';
                if ($response->isSuccess()) {
                    // reCAPTCHA verification successful, process the form submission
                }
                else{
                    $valid_item['recaptcha-token'] = 'required';
                }
            }

            $validated = $request->validate($valid_item);

            $push_data = [
                'question' => strip_tags($request->question),
                'approved' => '0'
            ];

            if(isset($user->type)){
                $push_data['user_id'] = $user->id;
                $push_data['question_by'] = $user->firstname . ' ' . $user->lastname;
                $push_data['question_email'] = $user->email;
            }
            else{
                $push_data['question_by'] = $request->userName;
                $push_data['question_email'] = $request->userEmail;
            }

            if ($gymId) {
                $push_data['gym_id'] = $gymId;
            }

            if ($request->page_url) {
                $push_data['page_url'] = $request->page_url;
            }

            $question = Questions::create($push_data);

            $message = 'Your question is successfully save.  It will be displayed after we review and approve your question.';
            // return redirect('/dojo-detail/'.$gymId);
        }

        return view('gym-question', compact('gym', 'page_url', 'user', 'message', 'request'));
        // }
        // else{
        //     return redirect('/');
        // }        
    }

    public function send_answer(Request $request)
    {
        $user = Auth::user();

        $method = $request->method();
        $message = 'You can leave a message using the form below.';
        
        $gymId = $request->input('gymId');
        $questionId = $request->input('questionId');

        if ((!$gymId && !$request->page_url) || !$questionId) {
            return redirect('/');
        }

        $gym = [];
        $page_url = "";

        if ($gymId) {
            $gym = Gyms::where('gyms.id', $gymId)
                        ->join('country as c', 'gyms.country_id', '=', 'c.id')
                        ->select('gyms.*', 'c.name as cname')
                        ->first();

            if (!$gym) {
                return redirect('/');
            }
        }

        if ($request->page_url) {
            $page_url = $request->page_url;
        }

        $question = Questions::where('id', $questionId)->first();

        if (!$question) {
            return redirect('/');
        }

        if ($method == "POST") {
            $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
            $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

            $valid_item = [
                'answer' => 'required'
            ];

            if(!$user){
                $valid_item['answer_userName'] = 'required|min:3';
                $valid_item['answer_userEmail'] = 'required';
                if ($response->isSuccess()) {
                    // reCAPTCHA verification successful, process the form submission
                }
                else{
                    $valid_item['recaptcha-token'] = 'required';
                }
            }

            $validated = $request->validate($valid_item);

            $push_data = [
                'question_id' => $questionId,
                'answer' => strip_tags($request->answer),
                'approved' => '0'
            ];

            if(isset($user->type)){
                $push_data['user_id'] = $user->id;
                $push_data['answer_by'] = $user->firstname . ' ' . $user->lastname;
                $push_data['answer_email'] = $user->email;
            }
            else{
                $push_data['answer_by'] = $request->answer_userName;
                $push_data['answer_email'] = $request->answer_userEmail;
            }

            if ($gymId) {
                $push_data['gym_id'] = $gymId;
            }

            if ($request->page_url) {
                $push_data['page_url'] = $request->page_url;
            }

            $answer = Answers::create($push_data);

            $message = 'Your answer is successfully save.  It will be displayed after we review and approve your answer.';
        }

        return view('gym-answer', compact('gym', 'page_url', 'question', 'user', 'message', 'request'));
        // else{
        //     return redirect('/');
        // }        
    }

    public function approve_question_ok(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type)){
            $questionid = $request->id;
            if(!empty($questionid)){
                $question = Questions::where('id', $questionid)->first();
                $question->approved = '1';
                $question->save();
                return redirect('/admin')->with('success', 'The question is approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }
    }

    public function approve_question_no(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type)){
            $questionid = $request->id;
            if(!empty($questionid)){
                $question = Questions::where('id', $questionid)->first();
                $question->approved = '-1';
                $question->save();
                return redirect('/admin')->with('success', 'The question is not approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }
    }

    public function approve_answer_ok(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type)){
            $answerid = $request->id;
            if(!empty($answerid)){
                $answer = Answers::where('id', $answerid)->first();
                $answer->approved = '1';
                $answer->save();
                return redirect('/admin')->with('success', 'The answer is approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }
    }

    public function approve_answer_no(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type)){
            $answerid = $request->id;
            if(!empty($answerid)){
                $answer = Answers::where('id', $answerid)->first();
                $answer->approved = '-1';
                $answer->save();
                return redirect('/admin')->with('success', 'The answer is not approved successfully');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }
    }

    public function question_editor(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type) && ($user->type == 'ADMIN')){
            if(isset($request->id) && !empty($request->id)){
                $question = Questions::find($request->id);
                if(!empty($question)){
                    return view('admin.question_editor', compact('user', 'question'));
                }
                else{
                    return redirect('/admin');
                }
            }
            else{
                return view('admin.question_editor', compact('user'));
            }
        }
    }

    public function question_update(Request $request)
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            if(isset($request->question_id) && !empty($request->question_id)){
                $question = Questions::where('id', $request->question_id)->first();
                $question->question = $request->question;
                $question->save();
                
                return redirect('/admin')->with('success', 'The Question updated successfully');
            }
            else{
                $question = Questions::create([
                    'gym_id' => 0,
                    'question' => $request->question,
                    'user_id' => $user->id,
                    'question_by' => $user->firstname . ' ' . $user->lastname,
                    'question_email' => $user->email,
                    'approved' => '1'
                ]);

                return redirect('/admin')->with('success', 'The Question created successfully');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function answer_editor(Request $request)
    {
        $user = Auth::user();

        if(isset($user->type) && ($user->type == 'ADMIN')){
            if(isset($request->id) && !empty($request->id)){
                $answer = Answers::find($request->id);
                if(!empty($answer)){
                    return view('admin.answer_editor', compact('user', 'answer'));
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

    public function answer_update(Request $request)
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            if(isset($request->answer_id) && !empty($request->answer_id)){
                $answer = Answers::where('id', $request->answer_id)->first();
                $answer->answer = $request->answer;
                $answer->save();
                return redirect('/admin')->with('success', 'The Answer updated successfully');
            }            
        }
        else{
            return redirect('/');
        }
    }
}
