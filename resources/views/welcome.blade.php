@extends('layouts.uno')
@section('titulo')
Inicio
@endsection
@section('cabecera')
Inicio Articulos
@endsection
@section('contenido')
<a href="{{route('articulos.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
<i class="fas fa-forward"> Gestionar Artículos</i></a>
@endsection