@extends('layouts.temp')

@section('media')
    <h1>Géneros</h1>    

@if(isset($category))
    {{-- Edición de contenido --}}
    <form action="{{route('category.update', $category)}}" method="POST">
        @method('PATCH') {{--Para cumplir con el estandar--}}
        @csrf
        <label for="name">Editar género:</label>
        <input type="text" name="name" id="name" value="{{$category->name ?? ''}}">
        <input type="submit" value="Guardar cambio">
    </form>
@else
    {{-- Creación de contenido --}}
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <label for="name">Agregar género:</label>
        <input type="text" name="name" id="name" value="{{$category->name ?? ''}}">
        <input type="submit" value="Agregar">
    </form>
    <table class="border-2 border-black">
        <thead>
            <tr>
                <th>ID</th>
                <th>Género</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>                     
                <td> {{ $category->name }} </td>                  
                <td><a href="{{route('category.edit', $category)}}">Editar</a></td>
                <td>
                    <form action="{{route('category.destroy', $category)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection

        