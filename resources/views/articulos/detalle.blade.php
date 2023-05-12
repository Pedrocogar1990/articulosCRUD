@extends('layouts.uno')
@section('titulo')
    Detalle
@endsection
@section('cabecera')
    Detalle del Artículo
@endsection
@section('contenido')
    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto bg-blue-400">
        <img class="rounded-t-lg" src="{{ Storage::url($articulo->imagen) }}" />
        <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                Titulo: {{ $articulo->titulo }}
            </h5>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                Contenido: {{ $articulo->contenido }}
            </p>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                Estado: <span @class([
                    'text-red-700' => $articulo->estado == 'Borrador',
                    'text-green-700' => $articulo->estado == 'Publicado',
                ])>{{ $articulo->estado }}</span> 
            </p>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                Nombre Autor: {{ $articulo->user->name }}
            </p>
            <a href="{{ route('articulos.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"> Volver</i>
            </a>
        </div>
    </div>
@endsection