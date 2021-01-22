<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUpdateRamal;
use App\Models\Empresa;
use App\Models\Ramal;
use App\Models\Setor;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
        $id = $request->old('empresa_id');
        $setores = Setor::where('empresa_id', $id)->get();
        return view("admin.ramal.form", ['empresas' => $empresas, 'setores' => $setores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUpdateRamal $request)
    {
        Validator::make($request->all());
        
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
        $setores = Setor::where('empresa_id', $ramal['setor_id'])->get();
        return view("admin.ramal.form", ["ramal" => $ramal, "empresas" => $empresas, 'setores' => $setores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Ramal  $ramal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
