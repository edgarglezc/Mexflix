@extends('layouts.temp')

@section('media')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Agregar Temporada</h2>

<div>
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{route('content.show', $content->id)}}">
        Regresar
    </a>
</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-6">
    @if(isset($season))
    {{-- Edición de contenido --}}
    <form action="{{route('season.update', $season)}}" method="POST">
        @method('PATCH') {{-- Esto para cumplir con el estandar --}}
    @else
    {{-- Creación de contenido --}}
    <form action="{{route('season.store', $content->id)}}" method="POST">
    @endif
        @csrf {{-- Token requerido para el envío del formulario --}}            

        <input type="hidden" name="content_id" value=" {{ $content->id }} ">

        <label for="season" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Temporada</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="season" id="season" value="{{$season->season ?? ''}}" />
        </label>

        <label for="description" class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
            <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Escribe la descripción del contenido..." name="description"
                id="description">{{$season->description ?? ''}}</textarea>
        </label>

        <label for="year" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Año</span>
            <input type="number"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="year" id="year" value="{{$season->year ?? ''}}" />
        </label>

        <label for="image_path" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Enlace de la imagen</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Escribe el nombre del contenido..." name="image_path" id="image_path"
                value="{{$season->image_path ?? ''}}" />
        </label>

        <div>
            <button type="submit"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">                    
                @if(isset($season))
                    <span>Guardar Cambios</span>
                @else
                    <span>Agregar Temporada</span>
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
