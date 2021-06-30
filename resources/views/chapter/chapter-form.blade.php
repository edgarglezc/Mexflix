@extends('layouts.temp')

@section('media')

@if(isset($chapter))
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Editar Capítulo</h2>
@else
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Agregar Capítulo</h2>
@endif

<div>
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{route('content.show-season', [$season->content_id, $season->id])}}">
        Regresar
    </a>
</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-6">

    <!-- Mensaje con informacion de los fallos -->
    <div>
        @include('partials.form-errors')
    </div>

    @if(isset($chapter))
    {{-- Edición de contenido --}}
    <form action="{{route('chapter.update', $chapter)}}" method="POST">
        @method('PATCH') {{-- Esto para cumplir con el estandar --}}
    @else
    {{-- Creación de contenido --}}
    <form action="{{route('chapter.store', $season->id)}}" method="POST">
    @endif
        @csrf {{-- Token requerido para el envío del formulario --}}            

        <input type="hidden" name="season_id" value=" {{ $season->id }} ">

        <label for="chapter" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Capítulo</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="chapter" id="chapter" value="{{$chapter->chapter ?? ''}}" />
        </label>

        <label for="name" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Escribe el nombre del capítulo..." name="name" id="name"
                value="{{$chapter->name ?? ''}}" />
        </label>
      
        <label for="description" class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
            <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Escribe la descripción del capítulo..." name="description"
                id="description">{{$chapter->description ?? ''}}</textarea>
        </label>  

        <label for="duration" class="block text-sm" id="duration_label">
            <span class="text-gray-700 dark:text-gray-400">Duration</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="duration" id="duration" value="{{$chapter->duration ?? ''}}" />
        </label>

        <label for="link_path" class="block text-sm" id="link_path_label">
            <span class="text-gray-700 dark:text-gray-400">Enlace del contenido</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Escribe el nombre del contenido..." name="link_path" id="link_path"
                value="{{$chapter->link_path ?? ''}}" />
        </label>

        <div>
            <button type="submit"
                class="flex items-center justify-between px-4 py-2 mt-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">                    
                @if(isset($chapter))
                    <span>Guardar Cambios</span>
                @else
                    <span>Agregar Capítulo</span>
                @endif
                <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

@endsection
