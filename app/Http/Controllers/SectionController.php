<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baract;
use App\Section;
use App\Chapter;
use Auth;



class SectionController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$sections = Section::paginate(10);
		$total = count($sections);
		return view('baract.chapter.section.index', compact('sections', 'total'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chapters = chapter::all()->pluck('title', 'id', 'baract_id');
        
        return view('baract.chapter.section.create', compact('chapters'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['baract_chapter_id' => 'required|int',
                                   'title'             => 'required|max:100',
                                   'description'       => 'required']
                        );

        $section = Section::create( $request->only('title', 'baract_chapter_id', 'description') );       
    
        return redirect()->back()->with('message', 'Section '. $section->title.' Successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $section = Section::findOrFail($id);
        
        return view ('baract.chapter.section.show', compact('section'));
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
        $baract = Baract::findOrFail($id);

        return view('baract.edit', compact('baract'));
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
        $this->validate($request, [
            'title'=>'required|max:100',
            
        ]);

        $baract = Baract::findOrFail($id);
        $baract->title = $request->input('title');
        
        $baract->save();

        return redirect()->back()->with('message','Bar Act updated');
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
        $baract = Baract::findOrFail($id);
        $baract->delete();

        return redirect()->route('baract.index')->with('baract', 'baract successfully deleted.');
    }
}
