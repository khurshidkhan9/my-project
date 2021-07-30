<?php
use App\Models\User;


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

      return view('profile');
    }


    public function storeImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         $id = $request->user_id;
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');

        }

        $this->avatar = $imageName;
        $this->img_path = '/storage/'.$path;

        $query = DB::update('update users set avatar = ?, img_path = ? where id = ?', [$this->avatar, $this->img_path, $id]);

        return response()->json('Image uploaded successfully');
    }

   
}
