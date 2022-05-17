<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comments;

class CommentController extends Controller
{
    // Create products comment
    public function comment(Request $request)
    {
        if(Auth()->user() != null) {
            comments::create([
                'comment_username'=>Auth()->user()->name,
                'comment_email'=>Auth()->user()->email,
                'comment_content'=>$request->comment,
                'product_id'=>(int)$request->product_id,
                'active'=>1,
            ]);
        } else {
            comments::create([
                'comment_username'=>$request->name,
                'comment_email'=>$request->email,
                'comment_content'=>$request->comment,
                'product_id'=>(int)$request->product_id,
                'active'=>1,
            ]);
        }
            return redirect()->back()->with('comment', 'Đã gởi bình luận.');
    }
}
