<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reviews;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            return redirect('/');
        }

        $method = $request->method();
        $errorMessage = null;
        
        if ($method == "POST") {
            $valid_item = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            $validated = $request->validate($valid_item);

            if (Auth::attempt($validated)) {
                $user = Auth::user();
                $user->login = new \DateTime();
                $user->logintime = ($user->logintime + 1);
                $user->attempt = 0;                
                
                // if ($user->status) {
                if(!empty($request->return_url)){
                    return redirect($request->return_url);
                }
                else{
                    if($user->type == 'ADMIN'){
                        return redirect('/admin');
                    }

                    return redirect('/');
                }
                // }

                if (!$user->status) {
                    $errorMessage = 'Your account has not been activated yet.  Please activate';
                }
                // Auth::logout();
            }
            else{
                $errorMessage = 'Wrong login info';
            }
        }

        return view('login', compact('request', 'errorMessage'));
    }

    public function loginPopup(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $review = Reviews::where('id', $request->review_id)->first();
            $review->user_id = $user->id;
            $review->email_verified = "1";
            $review->save();

            return redirect('/dojo-detail/'.$review->gym_id);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
        return redirect('/login')->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
