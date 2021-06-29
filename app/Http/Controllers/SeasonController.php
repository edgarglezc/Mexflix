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
        $this->middleware('isadmin');
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
        $season = new Season();
        $season->content_id = $request->content_id;
        $season->season = $request->season;
        $season->description = $request->description;
        $season->year = $request->year;
        $season->image_path = $request->image_path;
        $season->save();       
        
        return redirect()->route('content.show', $request->content_id);
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
        return view('season.season-form', compact('season', 'content'));
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
        Season::where('id', $season->id)->update($request->except('_token', '_method'));
        return redirect()->route('content.show-season',[$season->content_id, $season->id]);
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
        return redirect()->route('content.show', $content);
    }
}
