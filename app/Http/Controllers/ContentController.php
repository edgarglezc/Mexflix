<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Season;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('isadmin', ['except' => ['show', 'showSeason']]);
    }

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

    public function showSeason($content_id, $season_id)
    {        
        $content = Content::where('id', $content_id)->first();        
        $season = Season::where('id', $season_id)->first();     
        $chapters = $season->chapters()->with('season')->get();
        return view('season.season-show', compact('content', 'season', 'chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // Validación de datos
        if($request->has('is_serie')) $request->merge(['is_serie' => 1,]);        
        else $request->merge(['is_serie' => 0,]);      

        if($request->duration == null) $request->merge(['duration' => 0,]);
        if($request->year == null) $request->merge(['year' => '2000',]);        

        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|max:255',
            'is_serie' => 'required',
            'duration' => Rule::requiredIf(!$request->has('is_serie')),
            'year' => ['size:4', Rule::requiredIf(!$request->has('is_serie'))],
            'image_path' => 'required|string|max:2048',
            'link_path' => ['max:2048', Rule::requiredIf(!$request->has('is_serie'))]
        ]);        

        // Inserción en la tabla
        Content::create($request->all());

        return redirect()->route('content.index')->with('message', 'Contenido creado exitosamente');
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
        $contentCategories = $content->categories()->with('contents')->get();
        $contentSeasons = $content->seasons()->with('content')->get();
        return view('content.content-show', compact('content', 'categories', 'contentCategories', 'contentSeasons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {      
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
        if($request->has('is_serie')) $request->merge(['is_serie' => 1,]);        
        else $request->merge(['is_serie' => 0,]);      

        if($request->duration == null) $request->merge(['duration' => 0,]);
        if($request->year == null) $request->merge(['year' => '2000',]);    

        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|max:255',
            'is_serie' => 'required',
            'duration' => Rule::requiredIf(!$request->has('is_serie')),
            'year' => Rule::requiredIf(!$request->has('is_serie')),
            'image_path' => 'required|string|max:2048',
            'link_path' => Rule::requiredIf(!$request->has('is_serie')),
        ]);    
        
        Content::where('id', $content->id)->update($request->except('_token', '_method'));
        return redirect()->route('content.show', $content)->with('message', 'Contenido actualizado exitosamente');
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
        return redirect()->route('content.index')->with('message', 'Contenido eliminado exitosamente');
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
        // if(!$request->category_id)
        $content->categories()->attach($request->category_id);      
        return redirect()->route('content.show', $content)->with('message', 'Categoria agregada');
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
        return redirect()->route('content.show', $content)->with('message', 'Categoria eliminada');
    }
}

?>
