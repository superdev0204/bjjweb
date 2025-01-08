<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gyms;
use App\Models\Gymlogs;
use App\Models\Images;
use App\Models\Reviews;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\Visitors;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if(isset($user->type) && $user->type == 'ADMIN'){
            $gyms = Gyms::where('approved', 0)
                    ->orderBy('name')
                    ->get();

            $gymLogs = GymLogs::where('approved', 0)
                            ->orderBy('name')
                            ->get();

            $images = Images::where('approved', 0)
                            ->orderBy('created')
                            ->get();

            $new_reviews = Reviews::where('approved', '0')->get();
            foreach ($new_reviews as $review) {
                $gym = Gyms::where('id', $review->gym_id)->first();
                $review->gym_name = $gym->name;
                $review->gym_link = "/dojo-detail/" . $review->gym_id;
            }

            $new_questions = Questions::where('approved', '0')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
            
            foreach ($new_questions as $question) {
                if($question->gym_id){
                    $gym = Gyms::where('id', $question->gym_id)->first();
                    $question->name = $agency->name;
                    $question->link = "/dojo-detail/" . $question->gym_id;
                }
                else{
                    $question->name = $question->page_url;
                    $question->link = $question->page_url;
                }
            }

            $new_answers = Answers::where('approved', '0')
                                ->orderBy('created_at', 'desc')
                                ->get();
            
            foreach ($new_answers as $answer) {
                if($answer->gym_id){
                    $gym = Gyms::where('id', $answer->gym_id)->first();
                    $answer->name = $gym->name;
                    $answer->link = "/dojo-detail/" . $answer->gym_id;
                }
                else{
                    $answer->name = $answer->page_url;
                    $answer->link = $answer->page_url;
                }
            }

            return view('admin.index', compact('gyms', 'gymLogs', 'images', 'new_reviews', 'new_questions', 'new_answers', 'user'))->with('success', session('success'));
        }
        else{
            return redirect('/user/login');
        }
    }

    public function visitor_counts(Request $request)
    {
        $user = Auth::user();
        $visitor_counts = Visitors::orderBy('date', 'desc')->paginate(100);

        if(isset($user->type) && $user->type == 'ADMIN'){
            return view('admin.visitor_counts', compact('user', 'visitor_counts'))->with('success', session('success'));
        }
        else{
            return redirect('/user/login?return_url='.request()->path());
        }
    }

    public function delete_visitor(Request $request)
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            if(isset($request->vID) && !empty($request->vID)){
                $visitor_count = Visitors::find($request->vID);
                $visitor_count->delete();
            }
            return redirect('/admin/visitor_counts')->with('success', 'The visitor count deleted successfully');
        }
        else{
            return redirect('/')->with('error', 'Invalid credentials.');
        }
        
    }
}
