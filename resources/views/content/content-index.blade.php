@extends('layouts.temp')

@section('media')
    <h1>Listado de contenido</h1>

    <p>
        <a href="{{ route('content.create') }}">
            Agregar contenido
        </a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Duración</th>
                <th>Año</th>
                <th>Serie</th>
                <th>Temporadas</th>
                <th>Enlace Imagen</th>                
                <th>Enlace Contenido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td> 
                        <a href="{{route('content.show', $content->id)}}">{{ $content->name }}</a>                      
                    </td> 
                    <td> {{ $content->description }} </td>
                    <td> {{ $content->duration }} </td>
                    <td> {{ $content->year }} </td>
                    <td> {{ $content->is_serie }} </td>
                    <td> {{ $content->seasons }} </td>                
                    <td> {{ $content->image_path }} </td>
                    <td> {{ $content->link_path }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection