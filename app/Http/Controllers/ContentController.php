<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        //$contents = Content::where('year', 'like','199%')->get();
        //Se pueden hacer consultas condicionales
        return view('content.content-index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.content-form');
    }

    public function createSeason($content_id)
    {       
        $content = Content::where('id', $content_id)->first();        
        return view('season.season-form', compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content();
        $content->name = $request->name;
        $content->description = $request->description;
        $content->duration = $request->duration;
        $content->year = $request->year;        
        if($request->has('is_serie')){
            $content->is_serie = true;
        }
        else{
            $content->is_serie = false;
        }        
        $content->image_path = $request->image_path;
        $content->link_path = $request->link_path;
        $content->save();

        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        $categories = Category::get();
        return view('content.content-show', compact('content', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        dd($content->id);
        return view('content.content-form', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        Content::where('id', $content->id)->update($request->except('_token', '_method'));
        return redirect()->route('content.show', $content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('content.index');
    }

    /**
     * Agrega el género seleccionado al contenido en cuestión 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request, Content $content)
    {
        $content->categories()->attach($request->category_id);         
        return redirect()->route('content.show', $content);
    }

    /**
     * Elimina el género seleccionado del contenido en cuestión 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Request $request, Content $content)
    {        
        $content->categories()->detach($request->category_id);
        return redirect()->route('content.show', $content);
    }
}
