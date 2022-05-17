<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comments;

class ContactController extends Controller
{
    //Display about page
    public function aboutUs()
    {
        $comments = comments::orderby('id', 'desc')->limit(5)->get();
        return view('organic.aboutUs.about', compact('comments'));
    }

    //Display contact page
    public function contact()
    {
        return view('organic.aboutUs.contact');
    }
}
