<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => 'required',
            'password' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file')->storeAs('uploads/', $imageName, 'public');

        }

        $this->img_name = $imageName;
        $this->img_path = '/storage/' . $path;

        if (user::create($request->only(['name', 'email', 'password', 'avatar', 'img_path']) + ['avatar' => $this->img_name, 'img_path' => $this->img_path])) {

            return redirect()->back()->with('success', "User has been created successfully!");
        } else {
            return redirect()->back()->with('error', "User failed to create!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $user = User::find($id);
            $path = "./" . $user->img_path;
            
            if (empty($user->img_path)) {
                $path = $request->file('file')->storeAs('uploads/', $imageName, 'public');
            }else {
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $path = $request->file('file')->storeAs('uploads/', $imageName, 'public');
            }

        }

        $this->img_name = $imageName;
        $this->img_path = '/storage/'.$path;

        if(user::where('id', $id)->update($request->only(['name', 'email', 'password', 'avatar', 'img_path', 'phone', 'address']) + ['avatar' => $this->img_name, 'img_path' => $this->img_path])){

            return redirect()->back()->with('success', "User has been Updated successfully!");
        }else {
            return redirect()->back()->with('error', "User Update failed to create!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $path = "./" . $user->img_path;
        if (file_exists($path)) {
            unlink($path);
        }
        $user->delete();
        return redirect()->back()->with('success', 'User has been deleted successfully!');
    }

    public function deleteall(Request $request)
    {
       $ids = $request->ids;  
        DB::table("users")->whereIn('id',explode(",",$ids))->delete();  
        return response()->json(['success'=>"Users Deleted successfully."]);  

    }

    public function show_profile()
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
        $this->img_path = '/storage/' . $path;

        $query = DB::update('update users set avatar = ?, img_path = ? where id = ?', [$this->avatar, $this->img_path, $id]);

        return response()->json('Image uploaded successfully');
    }

}
