<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Caselaw;
use Auth;
use Session;

class CaselawController extends Controller
{
    
    public function __construct()
    {
   
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
        $caselaws = Caselaw::orderby('id', 'desc')->paginate(10);
        $total = count($caselaws);
        return view('caselaw.index', compact('caselaws', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caselaw.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title'       => 'required|max:100',
                                   'description' => 'required',
                                   'link'        => 'required',]);

        $title = $request['title'];
        $body = $request['description'];

        $caselaw = Caselaw::create($request->only('title', 'description','link'));

        return redirect()->route('caselaws.index')
            ->with('message', 'Caselaw '. $caselaw->title.' Successfully added!');
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
        $caselaw = Caselaw::findOrFail($id);
        // print_r($caselaw);
        // die;

        return view ('caselaw.show', compact('caselaw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caselaw = Caselaw::findOrFail($id);

        return view('caselaw.edit', compact('caselaw'));
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

        $caselaw = Caselaw::findOrFail($id);
        $caselaw->title = $request->input('title');
        $caselaw->description = $request->input('description');
        $caselaw->link = $request->input('link');
        $caselaw->save();

        
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
        $Caselaw = Caselaw::findOrFail($id);
        $deleted_Caslaw_title = $caselaw->title;
        $Caselaw->delete();

    return redirect()->route('caselaws.index')->with('message', 'Caselaw '. $deleted_Caslaw_title.' Successfully Deleted!');
    }
    public function delete($id)
    {
        $Caselaw = Caselaw::findOrFail($id);
        $deleted_Caslaw_title = $Caselaw->title;
        $Caselaw->delete();
        return redirect()->route('caselaws.index')->with('message', 'Caselaw '. $deleted_Caslaw_title.' Successfully Deleted!');

    }
}
