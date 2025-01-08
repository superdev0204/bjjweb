<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use ReCaptcha\ReCaptcha;
use App\Models\User;
use App\Models\States;
use App\Models\Gyms;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $states = States::all();

        $gym = [];
        if (request()->query('id')) {
            /** @var Gyms $gym */
            $gym = Gyms::where('id', request()->query('id'))->first();
        }
        
        $method = $request->method();
        $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
        $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());
        $message = "";

        if ($method == "POST") {
            $valid_item = [
                'firstname' => 'required|min:2',
                'lastname' => 'required|min:2',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
                'city' => 'required|min:3',
                'state' => 'required',
                'zip' => 'required|min:5'
            ];

            if ($response->isSuccess()) {
                // reCAPTCHA verification successful, process the form submission
            }
            else{
                $valid_item['recaptcha-token'] = 'required';
            }

            $validated = $request->validate($valid_item, [
                'email.unique' => 'This email has already been taken.',
                'password.min' => 'Password must be at least 6 characters.',
            ]);

            $push_data = [];

            if (request()->query('id')) {
                if ($gym) {
                    $push_data["property_id"] = $gym->id;
                }
                else{
                    $push_data["property_id"] = 0;
                }
            }
            else{
                $push_data["property_id"] = 0;
            }

            $push_data["firstname"] = $request->firstname;
            $push_data["lastname"] = $request->lastname;
            $push_data["email"] = $request->email;
            $push_data["state"] = $request->state;
            $push_data["zip"] = $request->zip;
            $push_data["city"] = $request->city;
            $push_data["created"] = new \DateTime();
            $push_data["pwd"] = $request->password;
            $push_data["password"] = bcrypt($request->password);
            $push_data["ip_address"] = request()->ip();
            $push_data["type"] = '';
            $push_data["address"] = '';
            $push_data["status"] = false;
            $push_data["resetcode"] = rand(1000001, 99999999);
            $push_data["attempt"] = 0;
            $push_data["logintime"] = 0;
            $push_data["recieve_email"] = 0;

            $user = User::create($push_data);

            if($user){
                try {
                    $message = 'Please click on the link below to activate your Bjjweb.com account. <br /><br />';
                    $message .= $request->getSchemeAndHttpHost() . '/user/activate?id=' . $user->id . '&email=' . $user->email;
                    
                    $data = array(
                        'from_name' => config('mail.from.name'),
                        'from_email' => config('mail.from.address'),
                        'subject' => 'Bjjweb.com Registration E-Mail Validation',
                        'message' => $message,
                    );
    
                    Mail::to($request->email)->send(new SendEmail($data));
    
                    $message = 'Thank you for registering.  Your information was successfully saved. <br/> Please check your email for information to activate your account.';
                    $message .= '<br/> If you do not see an email from us, please <strong>check your Spam folder or Junk mail folder</strong>. ';
                } catch (\Exception $e) {
                    // $message = 'An error occurred. Please try again later.';
                    $message = $e;
                }
            }
            else{
                $message = 'Please make the following corrections and submit again.';
            }
        }

        return view('register', compact('message', 'states', 'request', 'gym'));
    }

    public function signupPopup(Request $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->new_email,
            'password' => bcrypt($request->new_password),
            'status' => 'active',
        ]);

        // Auth::login($user);

        return redirect('/user/login');
    }

    public function activate(Request $request)
    {
        $id = $request->id;
        $email = $request->email;

        if (!$id || !$email) {
            return redirect('/');
        }

        /** @var User $user */
        $user = User::where('id', $id)
                    ->where('email', $email)
                    ->first();

        if (!$user) {
            return redirect('/');
        }

        $user->status = 1;
        $user->save();

        return redirect('/user/login');
    }
}
