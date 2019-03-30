<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Settings;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome')
                    ->with('categories', Category::take(4)->get())
                    ->with('first_post', Post::orderBy('created_at', 'DESC')->first())
                    ->with('second_post', Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first())
                    ->with('settings', Settings::first());
    }
}
