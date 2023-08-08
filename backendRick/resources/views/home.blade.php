@extends('layout.plantilla')

@section('title', 'Home')
    
@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-semibold mb-8">
            <span class="animate-text">R</span>
            <span class="animate-text">E</span>
            <span class="animate-text">G</span>
            <span class="animate-text">I</span>
            <span class="animate-text">S</span>
            <span class="animate-text">T</span>
            <span class="animate-text">R</span>
            <span class="animate-text">O</span>
            <span class="animate-text"> </span>
            <span class="animate-text"> </span>
            <span class="animate-text">D</span>
            <span class="animate-text">E</span>
            <span class="animate-text"> </span>
            <span class="animate-text"> </span>
            <span class="animate-text">N</span>
            <span class="animate-text">U</span>
            <span class="animate-text">E</span>
            <span class="animate-text">V</span>
            <span class="animate-text">O</span>
            <span class="animate-text"> </span>
            <span class="animate-text"> </span>
            <span class="animate-text">P</span>
            <span class="animate-text">E</span>
            <span class="animate-text">R</span>
            <span class="animate-text">S</span>
            <span class="animate-text">O</span>
            <span class="animate-text">N</span>
            <span class="animate-text">A</span>
            <span class="animate-text">L</span>
        </h1>
        
        <div class="space-y-4">
            <a href="{{ route('usuarios.create') }}" class="animate-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                <span class="animate-text">R</span>
                <span class="animate-text">e</span>
                <span class="animate-text">g</span>
                <span class="animate-text">i</span>
                <span class="animate-text">s</span>
                <span class="animate-text">t</span>
                <span class="animate-text">r</span>
                <span class="animate-text">a</span>
                <span class="animate-text">r</span>
                <span class="animate-text"> </span>
                <span class="animate-text"> </span>
                <span class="animate-text">N</span>
                <span class="animate-text">u</span>
                <span class="animate-text">e</span>
                <span class="animate-text">v</span>
                <span class="animate-text">o</span>
            </a>
            <a href="{{ route('usuarios.index') }}" class="animate-button bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                <span class="animate-text">L</span>
                <span class="animate-text">i</span>
                <span class="animate-text">s</span>
                <span class="animate-text">t</span>
                <span class="animate-text">a</span>
                <span class="animate-text">r</span>
                <span class="animate-text"> </span>
                <span class="animate-text"> </span>
                <span class="animate-text">P</span>
                <span class="animate-text">e</span>
                <span class="animate-text">r</span>
                <span class="animate-text">s</span>
                <span class="animate-text">o</span>
                <span class="animate-text">n</span>
                <span class="animate-text">a</span>
                <span class="animate-text">l</span>
            </a>
        </div>
    </div>

    <style>
        .animate-text {
            display: inline-block;
            opacity: 0;
            transform: translateY(1em);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    </style>
@endsection
