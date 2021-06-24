@extends('layouts.temp')

@section('media')
    <h1>Listado de contenido</h1>

    <p class="bg-green-300 rounded min-w-min max-w-min whitespace-nowrap">
        <a href="{{ route('content.create') }}">
            Agregar contenido
        </a>
    </p>

    <table class="border-collapse border border-green-800 class="py-3 px-6 text-left whitespace-nowra">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Nombre</th>
                <th class="py-3 px-6 text-left">Descripción</th>
                <th class="py-3 px-6 text-left">Duración</th>
                <th class="py-3 px-6 text-left">Año</th>
                <th class="py-3 px-6 text-left">Serie</th>
                <th class="py-3 px-6 text-left">Temporadas</th>
                <th class="py-3 px-6 text-left">Enlace Imagen</th>                
                <th class="py-3 px-6 text-left">Enlace Contenido</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($contents as $content)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $content->id }}</td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> 
                        <a href="{{route('content.show', $content->id)}}">{{ $content->name }}</a>                      
                    </td> 
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->description }} </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->duration }} </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->year }} </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->is_serie }} </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->seasons }} </td>                
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->image_path }} </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap"> {{ $content->link_path }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection