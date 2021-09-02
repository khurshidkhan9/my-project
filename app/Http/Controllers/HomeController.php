<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Comment;
use App\Mail\MyMail;  
use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\View;
use DB;
use Mail; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('index');
    // }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()

    {

        $user = User::all();
        $post = Post::all();
        $photo = Photo::all();
        $comment = Comment::all();
  
            // $viewer = View::select(DB::raw("SUM(numberofview) as count"))  
            //     ->orderBy("created_at")  
            //     ->groupBy(DB::raw("year(created_at)"))  
            //     ->get()->toArray();  
            // $viewer = array_column($viewer, 'count');  
              
            // $click = Click::select(DB::raw("SUM(numberofclick) as count"))  
            //     ->orderBy("created_at")  
            //     ->groupBy(DB::raw("year(created_at)"))  
            //     ->get()->toArray();  
            // $click = array_column($click, 'count');  
               
                     
        


        return view('admin.index', compact('user', 'post', 'photo', 'comment'));
        // ->with('gmail',json_encode($gmail,JSON_NUMERIC_CHECK));
        // ->with('click',json_encode($click,JSON_NUMERIC_CHECK)); 

    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('profile');
    }

      /**  
     * It will display the application dashboard.  
     *  
     * @return \Illuminate\Contracts\Support\Renderable  
     */  
    public function myMail()  
    {  
        $myEmail = 'abcxyz@gmail.com';  
     
        $details = [  
            'title' => 'Demo of Mail from Javatpoint.com',  
            'url' => 'https://www.javatpoint.com'  
        ];  
    
        \Mail::to($myEmail)->send(new MyMail($details));  
     
        dd("Mail Send Successfully");  
    }  

}
