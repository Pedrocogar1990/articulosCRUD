@extends('layouts.uno')
@section('titulo')
    Nuevo
@endsection
@section('cabecera')
    Nuevo Artículo
@endsection
@section('contenido')
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form name="as" method="POST" action="{{route('articulos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                    Título del Artículo:
                </label>
                <input value="{{@old('titulo')}}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="titulo" name="titulo" type="text" rows="4" placeholder="Titulo...">
                @error('titulo')
                    <p class="text-red-700 italic text-xs mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                    Contenido del Artículo:
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="contenido" name="contenido" placeholder="Contenido...">{{@old('contenido')}}</textarea>
                @error('contenido')
                    <p class="text-red-700 italic text-xs mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">
                    Estado del Artículo:
                </label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input id="publicado" type="radio" value="Publicado" name="estado"
                        @checked (@old('estado') == "Publicado")
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="publicado"
                            class="ml-2 text-sm font-medium text-black-600 dark:text-black-300">Publicado</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="borrador" type="radio" value="Borrador" name="estado"
                        @checked (@old('estado') == "Borrador")
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="borrador"
                            class="ml-2 text-sm font-medium text-black-600 dark:text-black-300">Borrador</label>
                    </div>
                </div>
                @error('estado')
                    <p class="text-red-700 italic text-xs mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                    Autor del Artículo:
                </label>
                <select id="user_id" name="user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Elige un autor</option>
                    @foreach ($autores as $item)
                        <option value="{{ $item->id }}" @selected($item->id == @old('user_id'))>{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('user_id')
                    <p class="text-red-700 italic text-xs mt-2">***{{ $message }}</p>
                @enderror
                <label class="block text-gray-700 text-sm font-bold my-4" for="imagen">
                    Imagen del Artículo:
                </label>
                <div class="flex items-center content-center my-4">
                    <div class="flex-1 mr-4">
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="img" name="imagen" type="file" accept="image/*">
                    </div>
                    <div>
                        <img src="{{Storage::url('noimage.jpg')}}" 
                        class="object-center object-cover w-64" id="imagen">
                    </div>
                </div>
                @error('imagen')
                    <p class="text-red-700 italic text-xs mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row-reverse">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    <i class="fas fa-save"> Crear</i>
                </button>
                <a href="{{route('articulos.index')}}" class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark">Volver</i>
                </a>
            </div>
        </form>
    @endsection
    @section('js')
    <script>
        function init() {
            var inputFile = document.getElementById('img');
            inputFile.addEventListener('change', mostrarImagen, false);
        }

        function mostrarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = document.getElementById('imagen');
                img.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }

        window.addEventListener('load', init, false);
    </script>
@endsection
