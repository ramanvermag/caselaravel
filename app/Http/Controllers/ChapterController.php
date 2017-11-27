<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use App\Baract;
use Auth;
use Illuminate\Support\Facades\DB;




class ChapterController extends Controller
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
         $chapters = DB::table('baract_chapters')
                              ->select('id', 'chapter_number', 'baract_id', 'title')
                              ->orderBy('chapter_number')
                              ->paginate(20);

        $total = count($chapters);

        

        $chapter_data = [];
        foreach ($chapters as $key => $chapter) 
        {
         
            $chapter_data[$key]['id'] = $chapter->id;         
            $chapter_data[$key]['chapter_number'] = $chapter->chapter_number;
            $chapter_data[$key]['baract_id'] = $chapter->baract_id;
            $chapter_data[$key]['title'] = $chapter->title;
            
        }
        

        return view('baract.chapter.index', compact('chapters', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $baracts = Baract::All()->pluck('title', 'id');
        return view('baract.chapter.create',compact('baracts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title'          => 'required|max:100', 
                                   'baract_id'      => 'required',
                                   'chapter_number' => 'required|unique:baract_chapters']);

        $title           = $request['title'];
        $baract_id       = $request['baract_id'];
        $chapter_number  = $request['chapter_number'];

        $chapter = Chapter::create( $request->only('title', 'baract_id', 'chapter_number') );
        


     

        return redirect()->back()->with('message', 'Bar Act chapter '. $chapter->title.' Successfully added!');

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
        $chapter = Chapter::find($id);

        $baract_id = $chapter['baract_id'];

        $baract_name = Baract::find($baract_id)->title;


        

        return view ('baract.chapter.show', compact('chapter', 'baract_name'));
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
        $baracts = Baract::All()->pluck('title', 'id');

        $chapter = chapter::findOrFail($id);
        // die('here');

        return view('baract.chapter.edit', compact('chapter', 'baracts'));
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

        $chapter = chapter::findOrFail($id);
        $chapter->title = $request->input('title');
        
        $chapter->save();

        return redirect()->back()->with('message','Chapter updated');
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
        $chapter = chapter::findOrFail($id);
        $chapter->delete();

        return redirect()->route('chapter.index')->with('chapter', 'chapter successfully deleted.');
    }
    public function testfunction(Request $request)
    {
        
        if ($request->isMethod('POST'))
        {
            //echo $request['baractId'];
            //die;
            $chapters = DB::table('baract_chapters')
             ->select('id', 'chapter_number', 'baract_id', 'baract_name', 'title')
             ->where('baract_id', $request['baractId'])->get();


              $chapter_data = [];

        foreach ($chapters as $key => $chapter) 
        {
         
            $chapter_data[$key]['id'] = $chapter->id;         
            $chapter_data[$key]['chapter_number'] = $chapter->chapter_number;
            $chapter_data[$key]['baract_id'] = $chapter->baract_id;
            $chapter_data[$key]['title'] = $chapter->title;
    


        }
        // print_r(response()->json($chapter_data));

        // die;
           return response()->json(['res' => $chapter_data]); 
        }
        die('here');
        return response()->json(['response' => 'This is get method']);
    }
}
