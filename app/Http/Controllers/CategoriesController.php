<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'unique:categories', 'string']
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        // Set toastr notification
        toastr()->success('Category created successfully');
        return redirect()->route('categories.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:categories', 'string']
        ]);
        $category->update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        toastr()->success('Category updated successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // To force delete all posts associated with said category
        // before deleting the category itself.
        foreach ($category->posts as $post) {
            // unlink the featured image.
            // Remember the accessor we set for featured to convert featured to
            // http long path with asset()
            $featured = substr($post->featured, strpos($post->featured, '/uploads/posts'));
            $featured = __DIR__.'/../../../public'.$featured;
            unlink($featured);
            $post->forceDelete();
        }
        $category->delete();
        toastr()->success('Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
