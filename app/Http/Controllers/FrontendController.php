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
        $prev_post_id = Post::where('id', '<', $post->id)->max('id');
        $next_post_id = Post::where('id', '>', $post->id)->min('id');
        return view('single')
                    ->with('post', $post)
                    ->with('prev_post', Post::find($prev_post_id))
                    ->with('next_post', Post::find($next_post_id))
                    ->with('categories', $categories)
                    ->with('tags', Tag::all())
                    ->with('settings', Settings::first());
    }

    public function category ($category)
    {
        $category = Category::where('slug', $category)->first();
        return view('category', compact('category'))
                    ->with('categories', $this->sortCategories())
                    ->with('tags', Tag::all())
                    ->with('settings', Settings::first());
    }

    public function tag ($tag)
    {
        $tag = Tag::where('slug', $tag)->first();
        return view('tag', compact('tag'))
                    ->with('categories', $this->sortCategories())
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
