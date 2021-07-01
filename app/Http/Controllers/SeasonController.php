<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Content;
use App\Models\Chapter;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin', ['except' => ['showChapter']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.          
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        
    }

    public function createChapter($season_id)
    { 
        $season = Season::where('id', $season_id)->first();
        return view('chapter.chapter-form', compact('season'));
    }

    public function showChapter($season_id, $chapter_id)
    {
        $season = Season::where('id', $season_id)->first();        
        $chapter = Chapter::where('id', $chapter_id)->first();
        
        return view('chapter.chapter-show', compact('season', 'chapter'));
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
            'content_id' => 'required',
            'season' => 'required',
            'description' => 'required|string|max:2048',        
            'year' => 'required|size:4',
            'image_path' => 'required|string|max:2048',            
        ]);   
                
        Season::create($request->all());
        
        return redirect()->route('content.show', $request->content_id)->with('message', 'Temporada creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    { 
        $content = Content::where('id', $season->content_id)->first();
        return view('season.season-form', compact('season', 'content'))->with('message', 'Temporada actualizada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Season $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        $request->validate([
            'content_id' => 'required',
            'season' => 'required',
            'description' => 'required|string|max:2048',        
            'year' => 'required|size:4',
            'image_path' => 'required|string|max:2048'
        ]);   

        Season::where('id', $season->id)->update($request->except('_token', '_method'));
        
        return redirect()->route('content.show-season',[$season->content_id, $season->id])->with('message', 'Temporada actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $content = Content::where('id', $season->content_id)->first();
        $season->delete();
        return redirect()->route('content.show', $content)->with('message', 'Temporada eliminada exitosamente');
    }
}
