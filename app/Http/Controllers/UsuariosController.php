<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email',
            'data_nascimento' => 'nullable|date_format:d/m/Y',
            'senha' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $usuario = new Usuario();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->data_nascimento = $request->data_nascimento;
        $usuario->senha = $request->senha;
        $usuario->save();

        return response()->json(['success' => true]);
    }
}
