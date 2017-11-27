<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;



class MessageController extends Controller
{
    

    public function __construct()
    {
        // die('entry of message controller');
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // die('here');
        $messages = Message::paginate(10);

        $total = count($messages);

        // die;


        return view('message.index', compact('messages', 'total'));

        // return "working";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
        //
        // $this->validate($request)
        $this->validate($request, ['heading'   => 'required|max:100', 
                                   'message'   => 'required', 
                                   'file_link' => 'required']
                        );
        $heading   = $request['heading'];
        $message   = $request['message'];
        $file_link = $request['file_link'];

        $caselaw = Message::create($request->only('heading', 'message','file_link'));

        return redirect()->back()->with('message', 'Message '. $caselaw->title.' Successfully added!');

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
        $message = Message::findOrFail($id);
        

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
        //
        $message = Message::findOrFail($id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('message.index')
                         ->with('message', 'message successfully deleted.');
    }
}
