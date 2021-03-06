<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Season;
use App\Models\Content;
use Illuminate\Http\Request;

class ChapterController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'chapter' => 'required',
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:2048',
            'duration' => 'required',
            'link_path' => 'required|string|max:2048'
        ]);

        Chapter::create($request->all());

        $season = Season::where('id', $request->season_id)->first();                        

        return redirect()->route('content.show-season',[$season->content_id, $season->id])->with('message', 'Capitulo creado exitosamente');
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
     * @param  \App\Models\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {        
        $season = Season::where('id', $chapter->season_id)->first();
        return view('chapter.chapter-form', compact('season', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {        
        $request->validate([
            'chapter' => 'required',
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:2048',
            'duration' => 'required',
            'link_path' => 'required|string|max:2048'
        ]);

        Chapter::where('id', $chapter->id)->update($request->except('_token', '_method'));
        return redirect()->route('season.show-chapter',[$chapter->season_id, $chapter->id])->with('message', 'Capitulo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {        
        $season = Season::where('id', $chapter->season_id)->first();
        $chapter->delete();
        return redirect()->route('content.show-season', [$season->content_id, $season->id])->with('message', 'Contenido eliminado exitosamente');
    }
}
