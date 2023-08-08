@extends('layout.plantilla')

@section('title', 'Usuario')
    
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4 text-center">
            <span class="animate-text">Listado</span>
            <span class="animate-text"> </span>
            <span class="animate-text">de</span>
            <span class="animate-text"> </span>
            <span class="animate-text">usuarios</span>
        </h1>
        
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-center">Nombre</th>
                    <th class="border p-2 text-center">Apellido</th>
                    <th class="border p-2 text-center">Cedula</th>
                    <th class="border p-2 text-center">Telefono</th>
                    <th class="border p-2 text-center">Fecha de nacimiento</th>
                    <th class="border p-2 text-center">Salario</th>
                    <th class="border p-2 text-center">Correo</th>
                    <th class="border p-2 text-center">Sitio web</th>
                    <th class="border p-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario as $user)
                    <tr class="border">
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->apellido }}</td>
                        <td class="border p-2">{{ $user->cedula }}</td>
                        <td class="border p-2">{{ $user->telefono }}</td>
                        <td>{{ date('dd/mm/YYYY', strtotime($usuario->fecha_nacimiento)) }}</td>
                        <td class="border p-2">${{ number_format($user->salario, 2) }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">
                            <a href="{{ $user->sitioweb }}" target="_blank" class="text-blue-500 hover:underline">{{ $user->sitioweb }}</a>
                        </td>
                        <td class="border p-2">
                            <div class="flex justify-center space-x-1">
                                <a href="{{ route('usuarios.edit', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded animate-button">
                                    Actualizar
                                </a>
                                <form action="{{ route('usuarios.delete', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button id="deleteBtn" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded animate-button">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-4 flex justify-center">
            {{ $usuario->links() }}
        </div>
        
    </div>

    <style>
        .animate-text {
            display: inline-block;
            opacity: 0;
            transform: translateY(1em);
            animation: fadeInUp 1s forwards;
        }

        .animate-button {
            display: inline-block;
            overflow: hidden;
            position: relative;
        }

        .animate-button:before {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            transform: skewY(-15deg);
            transition: top 0.3s ease-in-out;
        }

        .animate-button:hover:before {
            top: 100%;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .text-center {
            text-align: center;
        }

        .bg-blue-500 {
            background-color: #3490dc;
        }

        .bg-blue-700 {
            background-color: #2779bd;
        }

        .bg-red-500 {
            background-color: #e3342f;
        }

        .bg-red-700 {
            background-color: #cc1f1a;
        }

        .text-white {
            color: #ffffff;
        }

        .hover:underline:hover {
            text-decoration: underline;
        }
    </style>
@endsection
