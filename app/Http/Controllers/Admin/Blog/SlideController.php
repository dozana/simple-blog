<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Slide;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Requests\Slides\CreateSlideRequest;
use App\Http\Requests\Slides\UpdateSlideRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends IndexController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.blog.slides.index')->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideRequest $request)
    {
        $image = $request->image->store('slides');

        Slide::create([
           'title' => $request->title,
           'body' => $request->body,
           'image' => $image
        ]);

        session()->flash('success', 'Slide created successfully.');

        return redirect()->route('admin.slides.index');
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
    public function edit(Slide $slide)
    {
        return view('admin.blog.slides.edit')->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $data = $request->all();

        // check if new image
        if($request->hasFile('image')) {
            // upload it
            $image = $request->image->store('slides');

            // delete old one
            Storage::delete($slide->image);

            $data['image'] = $image;
        }

        $slide->update($data);

        session()->flash('success', 'Slide updated successfully.');

        return redirect()->route('admin.slides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        Storage::delete($slide->image);
        $slide->delete();

        session()->flash('success', 'Slide deleted successfully');

        return redirect()->route('admin.slides.index');
    }
}
