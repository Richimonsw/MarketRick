@extends('layout.plantilla')

@section('title', 'Usuario create')
    
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">Crear nuevo usuario</h1>
        
        <form action="{{ route('usuarios.store') }}" method="post" class="bg-white p-6 rounded shadow-md">
            @csrf 
            
            <div class="flex flex-wrap -mx-2">
                <div class="w-1/3 px-2 mb-4">
                    <label for="name" class="block text-sm font-medium {{ $errors->has('name') ? 'text-red-600' : 'text-gray-700' }}">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" required minlength="3" maxlength="30">
                    @if ($errors->has('name'))
                        <p class="text-red-600">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="apellido" class="block text-sm font-medium {{ $errors->has('apellido') ? 'text-red-600' : 'text-gray-700' }}">Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido') }}" id="apellido" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('apellido') ? 'border-red-500' : 'border-gray-300' }}" required minlength="3" maxlength="30">
                    @if ($errors->has('apellido'))
                        <p class="text-red-600">{{ $errors->first('apellido') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="cedula" class="block text-sm font-medium {{ $errors->has('cedula') ? 'text-red-600' : 'text-gray-700' }}">Cedula</label>
                    <input type="text" name="cedula" value="{{ old('cedula') }}" id="cedula" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('cedula') ? 'border-red-500' : 'border-gray-300' }}" required minlength="10" maxlength="10" pattern="\d*" title="La cedula debe tener 10 números">
                    @if ($errors->has('cedula'))
                        <p class="text-red-600">{{ $errors->first('cedula') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="telefono" class="block text-sm font-medium {{ $errors->has('telefono') ? 'text-red-600' : 'text-gray-700' }}">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}" id="telefono" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('telefono') ? 'border-red-500' : 'border-gray-300' }}" required minlength="10" maxlength="10">
                    @if ($errors->has('telefono'))
                        <p class="text-red-600">{{ $errors->first('telefono') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="fecha_nacimiento" class="block text-sm font-medium {{ $errors->has('fecha_nacimiento') ? 'text-red-600' : 'text-gray-700' }}">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" id="fecha_nacimiento" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('fecha_nacimiento') ? 'border-red-500' : 'border-gray-300' }}" required>
                    @if ($errors->has('fecha_nacimiento'))
                        <p class="text-red-600">{{ $errors->first('fecha_nacimiento') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="salario" class="block text-sm font-medium {{ $errors->has('salario') ? 'text-red-600' : 'text-gray-700' }}">Salario</label>
                    <input type="number" step="0.01" name="salario" value="{{ old('salario') }}" id="salario" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('salario') ? 'border-red-500' : 'border-gray-300' }}" required min="450" max="5000">
                    @if ($errors->has('salario'))
                        <p class="text-red-600">{{ $errors->first('salario') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="email" class="block text-sm font-medium {{ $errors->has('email') ? 'text-red-600' : 'text-gray-700' }}">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" required>
                    @if ($errors->has('email'))
                        <p class="text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4">
                    <label for="sitioweb" class="block text-sm font-medium {{ $errors->has('sitioweb') ? 'text-red-600' : 'text-gray-700' }}">Sitio web</label>
                    <input type="url" name="sitioweb" value="{{ old('sitioweb') }}" id="sitioweb" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('sitioweb') ? 'border-red-500' : 'border-gray-300' }}" required>
                    @if ($errors->has('email'))
                        <p class="text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="w-1/3 px-2 mb-4 relative">
                    <label for="password" class="block text-sm font-medium {{ $errors->has('password') ? 'text-red-600' : 'text-gray-700' }}">Contraseña</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}" required minlength="8" maxlength="12" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$" title="La contraseña debe tener entre 8 y 12 caracteres, al menos una mayúscula, una minúscula, un número y un carácter especial (@ $ ! % * ? &)">
                    <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none" onclick="togglePasswordVisibility()">
                        <i id="password-toggle-icon" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Registrar
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const passwordToggleIcon = document.getElementById('password-toggle-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggleIcon.classList.remove('fa-eye');
            passwordToggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggleIcon.classList.remove('fa-eye-slash');
            passwordToggleIcon.classList.add('fa-eye');
        }
    }
</script>
@endpush