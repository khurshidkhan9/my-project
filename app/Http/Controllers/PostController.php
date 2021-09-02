<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = rand(5, 30) . "." . $imagePath->getClientOriginalExtension();

            $path = $request->file('file')->storeAs('uploads/posts', $imageName, 'public');

        }

        $this->img_name = $imageName;
        $this->img_path = '/storage/'.$path;
        
        if(Post::create($request->only(['title', 'body', 'img_name', 'img_path']) + ['img_name' => $this->img_name, 'img_path' => $this->img_path])){

            return redirect()->back()->with('success', "Post has been created successfully!");
        }else {
            return redirect()->back()->with('error', "Post failed to create!");
        }

        // Post::create($request->all());

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post )
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = date('Ymd') . "." . $imagePath->getClientOriginalExtension();
            $input['image'] = $imageName;

            $post = Post::find($post->id);
            $path = "./" . $post->img_path;

            if (empty($post->img_path)) {
                $path = $request->file('file')->storeAs('uploads/posts', $imageName, 'public');
            }else {
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $path = $request->file('file')->storeAs('uploads/posts', $imageName, 'public');
            }


        }else{

            unset($input['image']);

        }

        $post->img_name = $imageName;
        $post->img_path = '/storage/'.$path;
        $post->update($input);

    

        return redirect()->route('posts.index')

                        ->with('success','Photo updated successfully');

    }

    public function show($id)
    {
        $shareButtons = \Share::page(

            'https://www.itsolutionstuff.com',

            'Your share text comes here',

        )

        ->facebook()

        ->twitter()

        ->linkedin()

        ->telegram()

        ->whatsapp()        

        ->reddit();
        
        $post = Post::where('id', $id)->get();
        return view('blog-details', compact('shareButtons','post'));
    
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $path = "./".$post->img_path;
        if(file_exists($path)){
            unlink($path);
        }
        $post ->delete();
        return redirect()->back()->with('success', 'Posts has been deleted successfully!');
    }
    public function deleteall(Request $request)
    {
       $ids = $request->ids;  
        DB::table("posts")->whereIn('id',explode(",",$ids))->delete();  
        return response()->json(['success'=>"Posts Deleted successfully."]);  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $photo
     * @return \Illuminate\Http\Response
     */

    public function services()
    {
        $posts = Post::all();
        return view('services', compact('posts'));
    }
}
