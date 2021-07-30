<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photo.index', compact('photos'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $input = $request->all();

  

        if ($image = $request->file('image')) {

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $path = $image->storeAs('uploads/photos', $profileImage, 'public');

            $input['photo'] = "$profileImage";
            $input['photo_path'] = '/storage/'.$path;

        }else{

            unset($input['image']);

        }

        // $this->photo = $profileImage;
        // $this->photo_path = '/storage/'.$path;
          

        photo::create($input);

    

        return redirect()->route('photos.index')

                        ->with('success','Photo updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('admin.photo.update', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('admin.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([

            'name' => 'required',

        ]);

  

        $input = $request->all();

  

        if ($image = $request->file('image')) {

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $path = $image->storeAs('uploads/photos', $profileImage, 'public');

            $input['image'] = "$profileImage";

        }else{

            unset($input['image']);

        }

        $photo->photo = $profileImage;
        $photo->photo_path = '/storage/'.$path;
          

        $photo->update($input);

    

        return redirect()->route('photos.index')

                        ->with('success','Photo updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $path = "./".$photo->photo_path;
        if(file_exists($path)){
            unlink($path);
        }
        $photo ->delete();
        return redirect()->route('photos.index')->with('success', 'Photo has been deleted successfully!');
    }
}
