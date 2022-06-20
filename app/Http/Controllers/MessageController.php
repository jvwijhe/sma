<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageEditRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Http;


class MessageController extends Controller
{

    public function random_slug() {
        $str_result = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, 15);
    }

    public function getContacts() {
        $res = Http::get('https://pastebin.com/raw/uDzdKzGG');
        $contacts = $res->json();
        return $contacts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', [
            'messages' => $messages
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      

        return view('messages.create', [
            'contacts'=>$this->getContacts()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageCreateRequest $request)
    {
        $user = Auth::user();
       
        $user->messages()->create([
            'name' => $request->name,
            'slug' =>  $this->random_slug(),
            'contacts' => $request->contacts,
            'message' => $request->message,
            'password' => $request->password,
        ]);

        return redirect()->route('messages.index')->withMessage('message', 'Successfully done the operation.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
public function show(Message $message)
    {
        return view('messages.show', [
            'message' => $message
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {

        return view('messages.edit', [
            'message' => $message,
            'contacts'=>$this->getContacts()
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageEditRequest $request,Message $message)
    {
        // $message = Message::findOrFail($id);

        $message->name = $request->name;
        $message->slug = Str::slug($request->name, '-');
        $message->message = $request->message;
        $message->contacts = $request->contacts;
        $message->password  = $request->password;
        $message->save();

        return Redirect::route('messages.index')->with(['mesage' => 'Message updated'])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
