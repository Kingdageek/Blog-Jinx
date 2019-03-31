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
        $categories = Category::all();

        // Use Collection sort method to sort Categories according to the
        // number of posts they have, if we have some Categories

        if ( ! $categories->isEmpty() ) {
            $categories->sort(function ($a, $b) {
                $aCount = $a->posts()->count();
                $bCount = $b->posts()->count();
                if ($aCount === $bCount) {
                    return 0;
                }
                return ($aCount > $bCount) ? 1 : -1;
            });

            // Take the top four categories

            $categories = $categories->take(4);
        }

        return view('welcome')
                    ->with('categories', $categories)
                    ->with('first_post', Post::orderBy('created_at', 'DESC')->first())
                    ->with('second_post', Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first())
                    ->with('settings', Settings::first());
    }
}
