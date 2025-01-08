<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Auth;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $method = $request->method();
        $recaptcha = new ReCaptcha(env('DATA_SECRETKEY'));
        $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());
        $message = 'You can leave a message using the contact form below.';

        if ($method == "POST") {

            $valid_item = [
                'name' => 'required|min:4',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ];

            if ($response->isSuccess()) {
                // reCAPTCHA verification successful, process the form submission
            }
            else{
                $valid_item['recaptcha-token'] = 'required';
            }

            $validated = $request->validate($valid_item);

            if(preg_match("/mail.ru/i",$request->email) ||
                preg_match("/mal.ru/i",$request->email) ||
                substr_count($request->email,".") > 3 ||
                substr_count($request->message,"http") > 3 ||
                preg_match("/(218.10.17.41|91.207.4.242)/",$request->ip()) ||
                preg_match("/\b(viagra|levitra|cialis|marijuana)\b/i",$request->message)) {
                return view('contact', compact('user', 'message', 'request'));
            }

            if (preg_match("/(http:\/\/|href=)/i",$request->message)) {
                if (preg_match("/(clearance|outlet|webnode|Cocaine|zithromax|boots|loan|watches|jersey|phone|shoe|prescription|coach)/i",$request->message) ||
                    preg_match("/(replica|vuitton|imitation|coupon|fake|generic|goose|film|cocktail|cartridge|gold|nike|skin|gucci)/i",$request->message) ||
                    preg_match("/(karen|millen|co.uk|purse|webdesign|bags|marque)/i",$request->message) ||
                    preg_match("/(moisture|herbal|fragrance|exfoliate|chanel|wedding|gowns|furniture|Simferopol|beach|moisturize)/i",$request->message) ||
                    preg_match("/(arthritis|shopping|handbag|vaporizer|costume|snoring|movie|sex|blogspot|abercrombie|\?\?\?\?\?)/i",$request->message)) {
                    return view('contact', compact('user', 'message', 'request'));
                }
            }

            if (preg_match("/\.ru/i",$request->email) &&
                preg_match("/\?\?\?\?\?/i",$request->message)) {
                return view('contact', compact('user', 'message', 'request'));
            }

            try {
                // if user from the share internet   
                if(!empty($_SERVER['HTTP_CLIENT_IP'])) {   
                    $client_ip = $_SERVER['HTTP_CLIENT_IP'];
                }   
                //if user is from the proxy   
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
                    $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }   
                //if user is from the remote address   
                else{   
                    $client_ip = $_SERVER['REMOTE_ADDR'];
                }

                $message = 'From Name: ' . $request->name . ' <br/>';
                $message.= 'From Email: ' . $request->email . ' <br/>';
                $message.= 'Referral Url: ' . $request->referer . ' <br/>';
                $message.= 'Client IP: ' . $client_ip . '<br /><br />';
                $message.= $request->message;
                
                $data = array(
                    'from_name' => $request->name,
                    'from_email' => config('mail.from.address'),
                    'subject' => $request->subject,
                    'message' => $message,
                );

                Mail::to(config('mail.localto.address'))->send(new SendEmail($data));

                $message = 'Email sent successfully';
                
                if(isset($user->type)){
                    $contact = Contacts::create([
                        'from_name' => $request->name,
                        'from_email' => $request->email,
                        'from_userid' => $user->id,
                        'subject' => $request->subject,
                        'message' => $request->message,
                        'ip_sent' => request()->ip(),
                    ]);
                }
                else{
                    $contact = Contacts::create([
                        'from_name' => $request->name,
                        'from_email' => $request->email,
                        'subject' => $request->subject,
                        'message' => $request->message,
                        'ip_sent' => request()->ip(),
                    ]);
                }      
            } catch (\Exception $e) {
                $message = $e->getMessage();
            }
        }

        return view('contact', compact('user', 'message', 'request'));
    }

    public function manage_contact(Request $request)
    {
        $user = Auth::user();

        $contacts = Contacts::all();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            return view('admin.manage_contact', compact('user', 'contacts'))->with('success', session('success'));
        }
        else{
            return redirect('/');
        }
    }

    public function delete_contact(Request $request)
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            if(isset($request->contactID) && !empty($request->contactID)){
                $contact = Contacts::find($request->contactID);
                $contact->delete();
            }
            return redirect('/admin/manage_contact')->with('success', 'The contact deleted successfully');
        }
        else{
            return redirect('/')->with('error', 'Invalid credentials.');
        }
        
    }
}
