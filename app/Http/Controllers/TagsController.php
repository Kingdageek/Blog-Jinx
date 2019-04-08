<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => ['required', 'max:50', 'string', 'unique:tags']
        ]);

        $tagWasCreated = Tag::create([
            'tag' => $request->tag,
            'slug' => str_slug($request->tag)
        ]);

        if ($tagWasCreated) {
            toastr()->success('Tag successfully created');
            return redirect()->route('tags.index');
        }
        toastr()->error('Tag could not be created. Try Again');
        return redirect()->back();
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
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'tag' => ['required', 'max:50', 'string', 'unique:tags']
        ]);
        $tagWasUpdated = $tag->update([
            'tag' => $request->tag,
            'slug' => str_slug($request->tag)
        ]);
        if ($tagWasUpdated) {
            toastr()->success('Tag successfully updated');
            return redirect()->route('tags.index');
        }
        toastr()->error('Tag could not be updated. Try Again');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        toastr()->success('Tag successfully deleted');
        return back();
    }
}
