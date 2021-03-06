<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUpdateRamal;
use App\Models\Empresa;
use App\Models\Ramal;
use App\Models\Setor;
use Illuminate\Http\Request;

class RamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ramais = Ramal::select('ramais.*', 'empresas.nome AS empresas', 'setores.nome AS setores', 'usuarios.nome AS usuarios', 'usuarios.email AS email')
            ->join('usuarios', 'ramais.usuario_id', "usuarios.id")
            ->join('empresas', 'ramais.empresa_id', 'empresas.id')
            ->join('setores', 'ramais.setor_id', 'setores.id')
            ->get();
        return view('admin.ramal.ramais', compact("ramais"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $empresas = Empresa::all();
        $setores = Setor::where('empresa_id', old('empresa_id'))->get();
        return view("admin.ramal.createform", compact('empresas', 'setores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUpdateRamal $request)
    {
        $request->validated();

        Ramal::create($request->all());
        return redirect()->route('ramal.index')->with('message','Ramal salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ramal  $ramal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ramal  $ramal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = Empresa::all();
        $ramal = Ramal::find($id);
        $setores = Setor::where('empresa_id', $ramal->empresa->id)->get();
        return view("admin.ramal.editform", compact('empresas', 'ramal', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Ramal  $ramal
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaveUpdateRamal $request)
    {
        $request->validated();
        $ramal = Ramal::find($id);
        $ramal->update($request->all());
        return redirect()->route('ramal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ramal  $ramal
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Ramal::find($id)->delete();
        return redirect()->route('ramal.index');

        // Listar todos registros eliminados
        // $ramais = Ramal::onlyTrashed()->get();

        // Restaurar um registro eliminado
        // $ramais = Ramal::withTrashed()->find($id)->restore();

        // Para deletar permanentemente um registro do banco de dados
        // $ramais = Ramal::withTrashed()->find($id)->forceDelete();

    }

    public function ajaxSetor($id)
    {
        $setores = Setor::where('empresa_id', $id)->get();
        echo json_encode($setores);
    }
}
