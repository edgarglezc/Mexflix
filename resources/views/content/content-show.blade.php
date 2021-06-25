@extends('layouts.temp')
@section('media')

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-8">
    <div>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('content.index') }}">
            Regresar al listado de contenido
        </a>
    </div>

    <div>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('content.edit', $content) }}">
            Editar
        </a>
    </div>

@if($content->is_serie)
    <div>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('content.index') }}">
            Agregar Temporada
        </a>
    </div>
@endif

    <div>
        <form action="{{route('content.destroy', $content)}}" method="POST">
            @csrf
            @method('DELETE')
            <button 
                type="submit"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
                <span>Eliminar</span>
                <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" fill-rule="evenodd">
                    </path>
                </svg>  
            </button>
        </form>
    </div>
</div>

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Tarejta del Nombre -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div>
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
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Descripción
            </p>
            <p class="text-lg text-gray-700 dark:text-gray-200">
                {{$content->description}}
            </p>
        </div>
    </div>
    <!-- Tarjeta de la Duración -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div>
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
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Año
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$content->year}}
            </p>
        </div>
    </div>
@if($content->is_serie)
    <!-- Tarjeta de las temporadas -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Temporadas
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$content->seasons}}
            </p>
        </div>
    </div>    
@else
    <!-- Tarjeta del enlace al contenido -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
        </div>
        <div>
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
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Enlace de la imagen
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$content->image_path}}
            </p>
        </div>
    </div>
</div>
@endsection