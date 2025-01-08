<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReCaptcha\ReCaptcha;
use App\Models\Gyms;
use App\Models\States;
use App\Models\Cities;
use App\Models\Comment;
use App\Models\Reviews;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\Images;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $user = Auth::user();

        if( !isset($user->type) ){
            return redirect('/user/login?return_url='.$request->fullUrl());
        }
        
        $gymId = $request->id;
        $method = $request->method();
        $message = "";

        if (!$gymId) {
            return redirect('/');
        }

        $gym = Gyms::where('id', $gymId)->first();

        if (!$gym) {
            return redirect('/');
        }

        $images = Images::where('gym_id', $gymId)->get();
        $imageCount = count($images);

        if ($imageCount >= 8) {
            $message = 'You cannot upload anymore pictures at this point.';
            return view('gym-upload', compact('gym', 'images', 'user', 'message', 'request'));
        }

        $imagePath = public_path() . '/images/gyms/' . substr($gymId, -1) . '/' . $gymId;

        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        
        if ($method == "POST") {
            $valid_item = [];            
            $image1 = $request->file('image1');
            $image2 = $request->file('image2');
            $image3 = $request->file('image3');
            $image4 = $request->file('image4');

            if($request->image1Alt){
                $valid_item = [
                    'image1Alt' => 'required|min:4'
                ];
            }

            if($request->image2Alt){
                $valid_item = [
                    'image2Alt' => 'required|min:4'
                ];
            }

            if($request->image3Alt){
                $valid_item = [
                    'image3Alt' => 'required|min:4'
                ];
            }

            if($request->image4Alt){
                $valid_item = [
                    'image4Alt' => 'required|min:4'
                ];
            }

            $validated = $request->validate($valid_item);

            if(!empty($image1)){
                $valid_item = [
                    'image1Alt' => 'required|min:4'
                ];
                
                $validated = $request->validate($valid_item);

                if ($imageCount >= 8) {
                    $message = 'You cannot upload anymore pictures at this point.';
                    return view('gym-upload', compact('gym', 'images', 'user', 'message', 'imageCount', 'request'));
                }
                else{
                    $imageName = $image1->getClientOriginalName();
                    $path = $image1->move($imagePath . '/' , $imageName);
                    
                    $image = Images::create([
                        'gym_id' => $gymId,
                        'type' => 'IMAGE',
                        'imagename' => $imageName,
                        'altname' => $request->image1Alt,
                        'updatedby' => $user->id,
                        'approved' => 0,
                        'created' => new \DateTime(),
                    ]);

                    $imageCount++;

                    if($user->type == "ADMIN"){
                        $image->approved = 1;
                        $image->save();
                    }
                }
            }

            if(!empty($image2)){
                $valid_item = [
                    'image2Alt' => 'required|min:4'
                ];

                $validated = $request->validate($valid_item);
                
                if ($imageCount >= 8) {
                    $message = 'You cannot upload anymore pictures at this point.';
                    return view('gym-upload', compact('gym', 'images', 'user', 'message', 'imageCount', 'request'));
                }
                else{
                    $imageName = $image2->getClientOriginalName();
                    $path = $image2->move($imagePath . '/' , $imageName);
                    
                    $image = Images::create([
                        'gym_id' => $gymId,
                        'type' => 'IMAGE',
                        'imagename' => $imageName,
                        'altname' => $request->image2Alt,
                        'updatedby' => $user->id,
                        'approved' => 0,
                        'created' => new \DateTime(),
                    ]);

                    $imageCount++;

                    if($user->type == "ADMIN"){
                        $image->approved = 1;
                        $image->save();
                    }
                }
            }

            if(!empty($image3)){
                $valid_item = [
                    'image3Alt' => 'required|min:4'
                ];

                $validated = $request->validate($valid_item);

                if ($imageCount >= 8) {
                    $message = 'You cannot upload anymore pictures at this point.';
                    return view('gym-upload', compact('gym', 'images', 'user', 'message', 'imageCount', 'request'));
                }
                else{
                    $imageName = $image3->getClientOriginalName();
                    $path = $image3->move($imagePath . '/' , $imageName);
                    
                    $image = Images::create([
                        'gym_id' => $gymId,
                        'type' => 'IMAGE',
                        'imagename' => $imageName,
                        'altname' => $request->image3Alt,
                        'updatedby' => $user->id,
                        'approved' => 0,
                        'created' => new \DateTime(),
                    ]);

                    $imageCount++;

                    if($user->type == "ADMIN"){
                        $image->approved = 1;
                        $image->save();
                    }
                }
            }

            if(!empty($image4)){
                $valid_item = [
                    'image4Alt' => 'required|min:4'
                ];

                $validated = $request->validate($valid_item);

                if ($imageCount >= 8) {
                    $message = 'You cannot upload anymore pictures at this point.';
                    return view('gym-upload', compact('gym', 'images', 'user', 'message', 'imageCount', 'request'));
                }
                else{
                    $imageName = $image4->getClientOriginalName();
                    $path = $image4->move($imagePath . '/' , $imageName);
                    
                    $image = Images::create([
                        'gym_id' => $gymId,
                        'type' => 'IMAGE',
                        'imagename' => $imageName,
                        'altname' => $request->image4Alt,
                        'updatedby' => $user->id,
                        'approved' => 0,
                        'created' => new \DateTime(),
                    ]);

                    $imageCount++;

                    if($user->type == "ADMIN"){
                        $image->approved = 1;
                        $image->save();
                    }
                }
            }

            if(empty($image1) && empty($image2) && empty($image3) && empty($image4)){
                $message = 'Please upload at least one file';
            }
            else{
                $message = 'The images have been saved and will be reviewed before setting LIVE. <br/>';
            }        
        }

        return view('gym-upload', compact('gym', 'images', 'user', 'message', 'imageCount', 'request'));
    }

    public function approve(Request $request)
    {
        $user = Auth::user();
        $method = $request->method();
        
        $imageId = $request->id;

        if (!$method == "POST" || !$imageId) {
            return redirect('/admin');
        }

        $image = Images::where('id', $imageId)->first();

        $image->approved = 1;
        $image->save();

        // if ($image->type == "LOGO") {
        //     $apartment = Apartments::where('id', $image->property_id)->first();
        //     $apartment->logo = $image->imagename;
        //     $apartment->save();
        // }

        return redirect('/admin');
    }

    public function disapprove(Request $request)
    {
        $user = Auth::user();
        $method = $request->method();

        $imageId = $request->id;

        if (!$method == "POST" || !$imageId) {
            return redirect('/admin');
        }

        $image = Images::where('id', $imageId)->first();

        $image->approved = -2;
        $image->save();

        return redirect('/admin');
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $method = $request->method();

        $imageId = $request->id;

        if (!$method == "POST" || !$imageId) {
            return redirect('/admin');
        }

        $image = Images::where('id', $imageId)->first();
        $image->delete();

        return redirect('/admin');
    }
}
