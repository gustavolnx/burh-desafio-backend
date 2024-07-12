<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;

class VagaController extends Controller
{
    public function index()
    {
        return Vaga::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo_vaga' => 'required|in:PJ,CLT,Estágio',
            'salario' => 'nullable|numeric|min:1212|required_if:tipo_vaga,CLT',
            'horario' => 'nullable|integer|max:6|required_if:tipo_vaga,CLT|required_if:tipo_vaga,Estágio',
        ]);

        $vaga = Vaga::create($validated);

        return response()->json($vaga, 201);
    }

    public function show($id)
    {
        return Vaga::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $vaga = Vaga::findOrFail($id);

        $validated = $request->validate([
            'empresa_id' => 'sometimes|required|exists:empresas,id',
            'titulo' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo_vaga' => 'sometimes|required|in:PJ,CLT,Estágio',
            'salario' => 'nullable|numeric|min:1212|required_if:tipo_vaga,CLT',
            'horario' => 'nullable|integer|max:6|required_if:tipo_vaga,CLT|required_if:tipo_vaga,Estágio',
        ]);

        $vaga->update($validated);

        return response()->json($vaga, 200);
    }

    public function destroy($id)
    {
        Vaga::destroy($id);

        return response()->json(null, 204);
    }

    public function candidatar(Request $request, $vagaId)
    {
        $vaga = Vaga::findOrFail($vagaId);
    
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
        ]);
    
        $vaga->usuarios()->attach($validated['usuario_id']);
    
        return response()->json(['message' => 'Candidatura realizada com sucesso.'], 200);
    }
}    