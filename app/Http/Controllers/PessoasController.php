<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index()
    {
        $pessoas = Pessoas::with('infos')->get();
        return $pessoas;
    }

    public function store(Request $request)
    {
        $pessoaData = $request->all();
        $infosData = $pessoaData['infos'];
        unset($pessoaData['infos']);

        $pessoa = Pessoas::create($pessoaData);
        $pessoa->infos()->create($infosData);

        return $pessoa->load('infos');
    }

    public function show(string $id)
    {
        $pessoa = Pessoas::with('infos')->findOrFail($id);
        return $pessoa;
    }

    public function update(Request $request, string $id)
    {
        $pessoa = Pessoas::findOrFail($id);
        $pessoaData = $request->all();
        $infosData = $pessoaData['infos'];
        unset($pessoaData['infos']);

        $pessoa->update($pessoaData);
        $pessoa->infos()->update($infosData);

        return $pessoa->load('infos');
    }

    public function destroy(string $id)
    {
        $pessoa = Pessoas::findOrFail($id);
        $pessoa->infos()->delete();
        $pessoa->delete();

        return response()->json(['message' => 'Pessoa deleted successfully']);
    }
}
