<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            toastr()->info('Create post categories to create a post');
            return redirect()->back();
        }
        return view('admin.posts.create', compact('categories'))->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        // Handle saving the image first. Change the image name
        // to avoid name collisions - user uploading resource with
        // same name more than once.
        $featured = $request->featured;
        $featuredNewName = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featuredNewName);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featuredNewName,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        // Handling the Many-To-Many Relationship
        // The attach() method becomes available to us when
        // we've created our Pivot table. It takes an array as
        // argument

        $post->tags()->attach($request->tags);

        if ($post instanceof Post) {
            toastr()->success('Post created successfully');
            return redirect()->route('posts.index');
        }
        toastr()->error('An error occurred while creating post. Try again');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'))
                    ->with('categories', Category::orderBy('name', 'asc')->get())
                    ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'featured' => $this->setValidationForFile($request),
            'tags' => 'required'
        ]);

        $updates = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id
        ];

        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featuredNewName = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featuredNewName);

            $updates['featured'] = 'uploads/posts/'.$featuredNewName;
        }
        $postWasUpdated = $post->update($updates) &&
                            $post->tags()->sync($request->tags);

        if ($postWasUpdated) {
            toastr()->success("Post updated successfully");
            return redirect()->route('posts.index');
        }
        toastr()->error("Post could not be updated. An error occurred. Try Again");
        return redirect()->back();
    }

    private function setValidationForFile(Request $request)
    {
        if ($request->hasFile('featured')) {
            return 'image';
        }
        return '';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /*
        *   Was getting http doesn't allow unlinking cos an accessor mutates
        *   the returned value of the Post `featured` attribute to yield the full path
        *   To delete we have to use the server's absolute path to the file.
        *   not the http:// path.
        *   Geez! I just learnt this. We're using SoftDeletes. I wasn't supposed to unlink
        *   The files. Choi!!
        */
        // $featured = substr($post->featured, strpos($post->featured, '/uploads/posts'));
        // $featured = __DIR__.'/../../../public'.$featured;

        if ( $post->delete() ) {
            toastr()->success("Post successfully sent to trash");
        } else {
            toastr()->error("Post couldn't be trashed. An error occurred. Try again");
        }
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->first();
            if ($post->restore()) {
                toastr()->success("Post successfully restored");
                return redirect()->route('posts.index');
            }
            toastr()->error("Post could not be restored. An error occurred. Try Again");
            return redirect()->back();
    }

    public function delete($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->first();

        $featured = substr($post->featured, strpos($post->featured, '/uploads/posts'));
        $featured = __DIR__.'/../../../public'.$featured;

        if (unlink($featured) && $post->forceDelete()) {
            toastr()->success("Post permanently deleted successfully");
        } else {
            toastr()->error("An error occurred. Post couldn't be deleted. Try Again");
        }
        return redirect()->back();
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash', compact('posts'));
    }
}
