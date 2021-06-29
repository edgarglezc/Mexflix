@extends('layouts.temp')
@section('media')

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-8">
    <div>
        <a class="button-nav"
            href="{{ route('content.index') }}">

            Regresar al listado de contenido
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
            </svg>

        </a>
    </div>

    <div>
        <a class="button-nav"
            href="{{ route('content.edit', $content) }}">
            Editar contenido
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
        </a>
    </div>
    <!-- M10.239 42.86L45.812 7.328l10.848 10.86L21.086 53.72z -->
    <div>
        <form action="{{route('content.destroy', $content)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button-nav-delete">
                <span class="px-2 -mr-4">Eliminar</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor"> 
                <!-- #e91e1e -->
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>
</div>

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">  
    <div class="grid gap-6 mb-8 md:grid-rows-5 xl:grid-rows-3 md:grid-cols-2 xl:grid-cols-4">
        <!-- Imagen del contenido -->
        <div>
            <img src="{{ $content->image_path }}" alt="">
        </div>

        <!-- Tarejta del Nombre -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Nombre
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $content->name }}
                </p>
            </div>
        </div>
        <!-- Tarjeta de la descripción -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Descripción
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-200 overflow-ellipsis overflow-hidden">
                    {{$content->description}}
                </p>
            </div>
        </div>        
        
        @if($content->is_serie)
        <!-- Tarjeta de las temporadas -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Temporadas
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$content->seasons}}
                </p>
            </div>
        </div>
        @else
        <!-- Tarjeta de la Duración -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Duración
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$content->duration}}
                </p>
            </div>
        </div>
        <!-- Tarjeta del Año -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Año
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$content->year}}
                </p>
            </div>
        </div>
        <!-- Tarjeta del enlace al contenido -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Enlace del contenido
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$content->link_path}}
                </p>
            </div>
        </div>
        @endif
        <!-- Enlace a la imagen -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div class="overflow-ellipsis overflow-hidden">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Enlace de la imagen
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$content->image_path}}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Géneros</h2>
    <form action="{{ route('content.add-category', $content->id) }}" method="POST">
        @csrf
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Seleccione un género
            </span>
            <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray mb-4"
                name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label>

        <button type="submit"
            class="button-nav">
            <span>Agregar Género</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>

    <div class="flex flex-col-4 flex-wrap">
        @foreach ($content->categories as $category)
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800 mr-4 mb-4">
            <div class="p-3 mr-4 text-purple-600 bg-transparent rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $category->name }}
                </p>
            </div>
            <div>
                <form action="{{route('content.delete-category', $content->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" id="category_id" value="{{$category->id}}">
                    <button type="submit"                        
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if($content->is_serie)
<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Temporadas</h2>    
    <div>           
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('content.create-season', $content->id) }}">
            Agregar Temporada
        </a>
    </div>
    <div class="flex flex-col-4 flex-wrap">
    @foreach($content->seasons()->get() as $season)
    <div class="grid grid-cols-1 grid-rows-2 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mr-4 mb-4 mt-6">
        <div>
            <a href="{{ route('content.show-season', [$content->id, $season->id]) }}">
                <img src="{{ $season->image_path }}" width="300px">
            </a>
        </div>
        <div>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                Temporada {{ $season->season }}
            </p>
        </div>
    </div>
    @endforeach
    </div>
</div>
@else
<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Ver película</h2>
    <!-- Prueba de un enlace para poner la movie -->
    <iframe src="{{ $content->link_path }}" 
        width="100%" 
        height="800px"
        allow="autoplay">
    </iframe>
</div>
@endif

@endsection
