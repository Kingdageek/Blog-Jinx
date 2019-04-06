<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Settings;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = $this->sortCategories();
        return view('index')
                    ->with('categories', $categories)
                    ->with('first_post', Post::orderBy('created_at', 'DESC')->first())
                    ->with('second_post', Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first())
                    ->with('settings', Settings::first());
    }

    public function singlePost ($category, $slug)
    {
        $categories = $this->sortCategories();
        $post = Post::where('slug', $slug)->first();
        return view('single')
                    ->with('post', $post)
                    ->with('categories', $categories)
                    ->with('tags', Tag::all())
                    ->with('settings', Settings::first());
    }

    private function sortCategories ()
    {
        $categories = Category::all();

        // Use Collection sort method to sort Categories according to the
        // number of posts they have, if we have some Categories

        if ( ! $categories->isEmpty() ) {
            $categories = $categories->sort(function ($a, $b) {
                $aCount = $a->posts()->count();
                $bCount = $b->posts()->count();
                if ($aCount === $bCount) {
                    return 0;
                }
                return ($aCount < $bCount) ? 1 : -1;
            });
        }

        // Take the top four categories

        $categories = $categories->take(4);
        return $categories;
    }
}
