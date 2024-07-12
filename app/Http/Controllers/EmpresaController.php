<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'cnpj' => 'required|string|unique:empresas,cnpj',
            'plano' => 'required|in:Free,Premium',
        ]);

        $empresa = Empresa::create($validated);

        return response()->json($empresa, 201);
    }

    public function show($id)
    {
        return Empresa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'cnpj' => 'sometimes|required|string|unique:empresas,cnpj,'.$empresa->id,
            'plano' => 'sometimes|required|in:Free,Premium',
        ]);

        $empresa->update($validated);

        return response()->json($empresa, 200);
    }

    public function destroy($id)
    {
        Empresa::destroy($id);

        return response()->json(null, 204);
    }
}
