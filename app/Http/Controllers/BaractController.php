<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baract;
use App\Chapter;
use Auth;
use Illuminate\Support\Facades\DB;



class BaractController extends Controller
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
        $baracts = Baract::paginate(10);
        $total   = count($baracts);

        return view('baract.index', compact('baracts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|max:100']);
        $baract = Baract::create( $request->only('title') );

        return redirect()->back()->with('message', 'Bar Act '. $baract->title.' Successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $baract = Baract::findOrFail($id);
        $chapters = DB::table('baract_chapters')->select('id','title','chapter_number')->orderBy('chapter_number')->get();

        $chapter_data =[];
        foreach ($chapters as $key => $value) 
        {
            $chapter_data[$key][] = $value->id;
            $chapter_data[$key][] = $value->title;
            $chapter_data[$key][] = $value->chapter_number;
         

        }
        
        if (empty($chapter_data)) 
            $chapter_data[]="No chapters";
     

        return view ('baract.show', compact('baract','chapter_data'));
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

        $chapters = DB::table('baract_chapters')
                     ->select('id','title','chapter_number')
                     ->where('baract_id',$baract->id)
                     ->orderBy('chapter_number')
                     ->get();

        $chapter_data =[];

        foreach ($chapters as $key => $value) 
        {
            $chapter_data[$key][] = $value->id;
            $chapter_data[$key][] = $value->title;
            $chapter_data[$key][] = $value->chapter_number;
        }

        // dd($chapter_data);
        return view('baract.edit', compact('baract', 'chapter_data'));
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

        $delete_chapters = $request->input('chapter');

        if (!empty($delete_chapters)) 
        {
            DB::table('baract_chapters')->whereIn('id', $delete_chapters)->delete(); 
            
        }

        



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

        return redirect()->route('baract.index')
                         ->with('message', 'baract successfully deleted.');
    }
}
