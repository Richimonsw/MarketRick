<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Utils\ValidationHelper;

class UsuariosController extends Controller
{
    public function index(){

        $usuario = Usuarios::paginate(5);



        return view("usuarios.index", compact('usuario'));
    }

    public function create(){
        return view("usuarios.create");
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30', ValidationHelper::customNameValidation()],
            'apellido' => ['required', 'string', 'min:3', 'max:30', ValidationHelper::customNameValidation()],
            'cedula' => ['required', 'string', 'size:10', ValidationHelper::customCedulaValidation()],
            'telefono' => ['required', ValidationHelper::customPhoneNumberValidation()],
            'fecha_nacimiento' => ['required', ValidationHelper::customDateOfBirthValidation()],
            'email' => ['required', ValidationHelper::customEmailValidation()],
            'sitioweb' => ['required', ValidationHelper::customWebsiteValidation()],
        ]);

        $request->validate([
            'salario' => 'required|numeric|between:450,5000',
        ]);
    
        $usuario = new Usuarios();
    
        $usuario->name = $validatedData['name'];
        $usuario->apellido = $validatedData['apellido'];
        $usuario->cedula = $validatedData['cedula'];
        $usuario->telefono = $validatedData['telefono'];
        $usuario->fecha_nacimiento = $validatedData['fecha_nacimiento'];
        $usuario->salario = $request->salario;
        $usuario->email = $validatedData['email'];
        $usuario->sitioweb = $validatedData['sitioweb'];
        $usuario->contrasena = bcrypt($request->password);
    
        $usuario->save(); 
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado exitosamente');
    }
    

    public function delete($usuarioId){
        $usuario = Usuarios::findOrFail($usuarioId);

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function edit(Usuarios $usuario){
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuarios $usuario){
        $request->validate([
            'name' => 'required|min:3|max:30',
            'apellido' => 'required|min:3|max:30',
            'cedula' => 'required|numeric|digits:10|unique:usuarios,cedula,'.$usuario->id,
            'telefono' => 'required|numeric|digits:10',
            'salario' => 'required|numeric|between:450,5000',
            'email' => 'required|email|unique:usuarios,email,'.$usuario->id,
            'sitioweb' => 'required|url',
        ]);
    
        $usuario->name = $request->name;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->salario = $request->salario;
        $usuario->email = $request->email;
        $usuario->sitioweb = $request->sitioweb;
        $usuario->contrasena = bcrypt($request->password);
    
        $usuario->save(); 
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
    
    

    
}
