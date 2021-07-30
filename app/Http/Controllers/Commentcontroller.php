<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class Commentcontroller extends Controller
{
    public function index(Type $var = null)
    {
        echo  "working";
    }
    public function store(Request $request)
    {

        $request->validate([
            'body' => 'required',
        ]);

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}
