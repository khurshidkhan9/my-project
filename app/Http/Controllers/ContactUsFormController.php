<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsFormController extends Controller
{

    public function index()
    {
        $messages = Contact::all();
        return view('admin.messages.index', compact('messages'));
    }

    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        //       //  Store data in database
        Contact::create($request->all());

        //          //  Send mail to admin
        // \Mail::send('mail', array(
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'phone' => $request->get('phone'),
        //     'subject' => $request->get('subject'),
        //     'user_query' => $request->get('message'),
        // ), function($message) use ($request){
        //     $message->from($request->email);
        //     $message->to('khursheedali053@gmail.com', 'Admin')->subject($request->get('subject'));
        // });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function markAsRead()
    {
     $this->forceFill(['read' => true])->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Contact $message)
    {

        $message->delete();
        return redirect()->back()->with('success', 'Photo has been deleted successfully!');
    }
}
