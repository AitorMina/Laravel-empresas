<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Models\Empresa;
use Database\Seeders\EmpresaSeeder;

use Illuminate\Http\Request;




class EmpresaController extends Controller
{

    public function get_paginate(){
        $empresas=Empresa::paginate(10);
        return response($empresas);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
    // $empresas=Empresa::all();
    $empresas=Empresa::paginate(10);
    if (!empty($empresas)) {
        $campos = array_keys($empresas[0]->getAttributes());
        unset($campos[array_search('created_at', $campos)]);
        unset($campos[array_search('updated_at', $campos)]);
    }
    $campos;

    return view("empresa.listado",['filas'=>$empresas, 'campos'=>$campos, 'tabla'=>'Empresas']);
    }
    public function consulta_filtro(Request $request)
    {
        $query = $request->input('query');
        $empresas = Empresa::where(function($q) use ($query) {
            $q->where('nombre', 'like', '%'.$query.'%')
                ->orWhere('direccion', 'like', '%'.$query.'%')
                ->orWhere('id', 'like', '%'.$query.'%');
        })->paginate(10);

        if (!empty($empresas)) {
            $campos = array_keys($empresas[0]->getAttributes());
            unset($campos[array_search('created_at', $campos)]);
            unset($campos[array_search('updated_at', $campos)]);
        }
        $campos;

        return view("empresa.listado",['filas'=>$empresas, 'campos'=>$campos, 'tabla'=>'Empresas', 'query' => $query]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.editar',['empresa'=>$empresa]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $datos=$request->input();
        $empresa->update($datos);
        return redirect(route("empresas.index"));

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)

    {
        $empresa->delete();
        $empresas = Empresa::paginate(10);
        return response ($empresas);

        //
    }
}
