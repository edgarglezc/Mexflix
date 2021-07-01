@extends('layouts.temp')
@section('media')

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-8">
    <div>
        <a class="button-nav"
            href="{{ route('content.show', $content->id) }}">
            Regresar

            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
            </svg>
        </a>
    </div>

    @if(Auth::user()->is_admin)
    <!-- Botón para editar la temporada -->
    <div>
        <a class="button-nav"
            href="{{ route('season.edit', $season) }}">
            Editar
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
        </a>
    </div>
    <!-- Botón para eliminar la temporada -->
    <div>
        <form action="{{route('season.destroy', $season)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="button-nav-delete">
                <span>Eliminar</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4" viewBox="0 0 20 20" fill="currentColor"> 
                <!-- #e91e1e -->
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Mensaje con informacion del estatus del contenido -->
    <div>
        @include('partials.message-status')
    </div>
    
    @endif
</div>


<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">  
    <div class="grid gap-6 mb-8 md:grid-rows-5 xl:grid-rows-3 md:grid-cols-2 xl:grid-cols-4">
        <!-- Imagen del contenido -->
        <div>
            <img src="{{ $season->image_path }}" alt="">
        </div>

        <!-- Tarejta del Nombre -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Nombre de la serie
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $content->name }}
                </p>
            </div>
        </div>
        <!-- Tarejta de la Temporada -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Temporada
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $season->season }}
                </p>
            </div>
        </div>
        <!-- Tarjeta de la descripción -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Descripción
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-200">
                    {{$season->description}}
                </p>
            </div>
        </div>        
        
        <!-- Tarjeta de las temporadas -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Capítulos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$season->chapters}}
                </p>
            </div>
        </div>

        <!-- Tarjeta del Año -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Año
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$season->year}}
                </p>
            </div>
        </div>       

        @if(Auth::user()->is_admin)
        <!-- Enlace a la imagen -->
        <div class="overflow-ellipsis overflow-hidden flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Enlace de la imagen
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$season->image_path}}
                </p>
            </div>
        </div>

        <!-- Tarjeta de Editado -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Editado el
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$season->updated_at}}
                </p>
            </div>
        </div>

        <!-- Tarjeta de Creado -->
        <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Creado el
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$season->created_at}}
                </p>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Capítulos</h2>    
    @if(Auth::user()->is_admin)
    <div>           
        <a class="button-nav"
            href="{{ route('season.create-chapter', $season->id) }}">
            Agregar Capítulo
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
    @endif
    <div class="flex flex-col-4 flex-wrap">
    @foreach($chapters as $chapter)
    <div class="grid grid-cols-1 grid-rows-2 p-4 bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800 mr-4 mb-4 mt-6">
        <div>
            <a href="{{ route('season.show-chapter', [$season->id, $chapter->id]) }}">Capítulo {{$chapter->chapter}}</a>
        </div>        
    </div>
    @endforeach
    </div>
</div>

@endsection
