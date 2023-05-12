@extends('layouts.uno')
@section('titulo')
    Listado
@endsection
@section('cabecera')
    Listado de Artículos
@endsection
@section('contenido')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex flex-row-reverse mb-4">
                        <a href="{{ route('articulos.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"> Nuevo Articulo</i>
                        </a>
                    </div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">Info</th>
                                <th scope="col" class="px-6 py-4">Titulo</th>
                                <th scope="col" class="px-6 py-4">Estado</th>
                                <th scope="col" class="px-6 py-4">Autor</th>
                                <th scope="col" class="px-6 py-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $item)
                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <a href="{{ route('articulos.show', $item) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->titulo }}</td>
                                    <td @class([
                                        'whitespace-nowrap px-6 py-4',
                                        'text-green-500' => $item->estado == 'Publicado',
                                        'text-red-500' => $item->estado == 'Borrador',
                                    ])>{{ $item->estado }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->user->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form name="borrar" method="POST"
                                            action="{{ route('articulos.destroy', $item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('articulos.edit', $item) }}"
                                                class="mr-3 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $articulos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
