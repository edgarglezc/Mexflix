@extends('layouts.temp')

@section('media')
    <h1>Creación de Contenido</h1>

    <p>
        <a href="{{ route('content.index') }}">
            Regresar al listado de contenido
        </a>
    </p>

    @if(isset($content))
        {{-- Edición de contenido --}}
        <form action="{{route('content.update', $content)}}" method="POST">
            @method('PATCH') {{-- Esto para cumplir con el estandar --}}
    @else
        {{-- Creación de contenido --}}
        <form action="{{route('content.store')}}" method="POST">
    @endif

        @csrf {{-- Token requerido para el envío del formulario --}}

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{$content->name ?? ''}}"><br>
        
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" value="{{$content->description ?? ''}}"><br>

        <label for="duration">Duración:</label>
        <input type="number" name="duration" id="duration" value="{{$content->duration ?? ''}}"><br>

        <label for="year">Año:</label>
        <input type="number" name="year" id="year" maxlength="4" value="{{$content->year ?? ''}}"><br>

        <label for="is_serie">Serie:</label>
        <input type="checkbox" name="is_serie" id="is_serie" value="{{$content->is_serie ?? ''}}"><br>

        <label for="seasons">Temporadas:</label>
        <input type="number" name="seasons" id="seasons" value="{{$content->seasons ?? ''}}"><br>

        <label for="image_path">Enlace de la imagen:</label>
        <input type="url" name="image_path" id="image_path" value="{{$content->image_path ?? ''}}"><br>
        
        <label for="link_path">Enlace de contenido:</label>
        <input type="url" name="link_path" id="link_path" value="{{$content->link_path ?? ''}}"><br>

        <input type="submit" value="Agregar">

    </form>
@endsection