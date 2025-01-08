<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if(isset($user->type) && $user->type == 'ADMIN'){
            $comments = Comment::where('approved', '0')
                                ->orderByDesc('created')
                                ->limit(100)
                                ->get();
            
            return view('admin.comment', compact('comments', 'user'));
        }
        else{
            return redirect('/user/login');
        }
    }
}
