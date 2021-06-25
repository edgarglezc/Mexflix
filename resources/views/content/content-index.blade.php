@extends('layouts.temp')

@section('media')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Listado de Contenido</h2>

<div>
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('content.create') }}">
        Agregar contenido
    </a>
</div>

<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs mt-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Duración</th>
                    <th class="px-4 py-3">Año</th>
                    <th class="px-4 py-3">Serie</th>
                    <th class="px-4 py-3">Temporadas</th>
                    <th class="px-4 py-3">Enlace Imagen</th>
                    <th class="px-4 py-3">Enlace Contenido</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($contents as $content)
                <tr class="text-gray-700 dark:text-gray-400">

                    <!-- ID -->
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            {{-- <div
class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
>
<img
class="object-cover w-full h-full rounded-full"
src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
alt=""
loading="lazy"
/>
<div
class="absolute inset-0 rounded-full shadow-inner"
aria-hidden="true"
></div>
</div> --}}
                            <div>
                                <p>{{ $content->id }}</p>
                            </div>
                        </div>
                    </td>

                    <!-- NOMBRE -->
                    <td class="px-4 py-3 text-sm">
                        <a class="font-semibold" href="{{route('content.show', $content->id)}}">{{ $content->name }}</a>
                    </td>

                    <!-- DESCRIPCION -->
                    <td class="truncate px-4 py-3 text-xs">
                        {{ $content->description }}
                    </td>

                    <!-- DURACIÓN -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->duration }}
                    </td>

                    <!-- AÑO -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->year }}
                    </td>

                    <!-- SERIE -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->is_serie }}
                    </td>

                    <!-- TEMPORADAS -->
                    <td class="px-4 py-3 text-sm">
                        {{ $content->seasons }}
                    </td>

                    <!-- ENLACE IMAGEN -->
                    <td class="truncate px-4 py-3 text-sm">
                        {{ $content->image_path }}
                    </td>

                    <!-- ENLACE CONTENIDO -->
                    <td class="truncate px-4 py-3 text-sm">
                        {{ $content->link_path }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- 
<table>
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
</table> --}}

@endsection