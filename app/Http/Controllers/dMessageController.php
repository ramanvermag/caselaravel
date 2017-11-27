<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use Auth;
use Session;

class MessageController extends Controller
{
    
    public function __construct()
    {
        // die('gfhdfdhj');
        $this->middleware(['auth'])
            ->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
       die('here');
        $messages = message::orderby('id', 'desc')->paginate(10);
        return view('message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // die('here');
        return view('message.create');
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
            'title'=>'required|max:100',
            'description' =>'required',
            'link' =>'required',
            ]);

        $title = $request['title'];
        $body = $request['description'];

        $message = message::create($request->only('title', 'description','link'));

        return redirect()->route('messages.index')
            ->with('message', 'message '. $message->title.' Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // die('ddfdfd');
        $message = message::findOrFail($id);
        // print_r($message);
        // die;

        return view ('message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = message::findOrFail($id);

        return view('message.edit', compact('message'));
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


        $this->validate($request, [
            'title'=>'required|max:100',
            'description'=>'required',
            'link'=>'required|url',
        ]);

        $message = message::findOrFail($id);
        $message->title = $request->input('title');
        $message->description = $request->input('description');
        $message->link = $request->input('link');
        $message->save();

        
        return redirect()->back()->with('message', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        die('here');
        $message = message::findOrFail($id);
        $deleted_Caslaw_title = $message->title;
        $message->delete();

    return redirect()->route('messages.index')->with('message', 'message '. $deleted_Caslaw_title.' Successfully Deleted!');
    }
    public function delete($id)
    {
        $message = message::findOrFail($id);
        $deleted_Caslaw_title = $message->title;
        $message->delete();
        return redirect()->route('messages.index')->with('message', 'message '. $deleted_Caslaw_title.' Successfully Deleted!');

    }
}
