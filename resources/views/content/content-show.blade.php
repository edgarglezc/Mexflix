@extends('layouts.temp')

@section('media')
    <h1>Mostrar Contenido</h1>

    <p>
        <a href="{{ route('content.index') }}">Regresar al listado de contenido</a>
    </p>

    <p>
        <a href="{{ route('content.edit', $content) }}">Editar</a>
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
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ $content->name }}</td> 
                <td> {{ $content->description }} </td>
                <td> {{ $content->duration }} </td>
                <td> {{ $content->year }} </td>
                <td> {{ $content->is_serie }} </td>
                <td> {{ $content->seasons }} </td>                
                <td> {{ $content->image_path }} </td>
                <td> {{ $content->link_path }} </td>
            </tr>            
        </tbody>
    </table>

    <form action="{{route('content.destroy', $content)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar Contenido">
    </form>

@endsection