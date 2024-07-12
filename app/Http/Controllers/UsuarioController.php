<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'cpf' => 'required|string|unique:usuarios,cpf',
            'idade' => 'required|integer',
        ]);

        $usuario = Usuario::create($validated);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:usuarios,email,'.$usuario->id,
            'cpf' => 'sometimes|required|string|unique:usuarios,cpf,'.$usuario->id,
            'idade' => 'sometimes|required|integer',
        ]);

        $usuario->update($validated);

        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        Usuario::destroy($id);

        return response()->json(null, 204);
    }

    public function vagas($id)
    {
        $usuario = Usuario::findOrFail($id);
        $vagas = $usuario->vagas;

        return response()->json($vagas);
    }
}
