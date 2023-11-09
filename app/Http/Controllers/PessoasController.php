<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index()
    {
        return Pessoas::all();
    }

    public function store(Request $request)
    {
        return Pessoas::create($request->all());
    }

    public function show(string $id)
    {
        return Pessoas::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        return Pessoas::find($id)->update($request->all());
    }

    public function destroy(string $id)
    {
        return Pessoas::find($id)->delete();
    }
}
