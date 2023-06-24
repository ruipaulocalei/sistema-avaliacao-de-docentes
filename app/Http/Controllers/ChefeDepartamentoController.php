<?php

namespace App\Http\Controllers;

use App\Models\ChefeDepartamento;
use Illuminate\Http\Request;

class ChefeDepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_types.chefe_departamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_types.chefe_departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChefeDepartamento  $chefeDepartamento
     * @return \Illuminate\Http\Response
     */
    public function show(ChefeDepartamento $chefeDepartamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChefeDepartamento  $chefeDepartamento
     * @return \Illuminate\Http\Response
     */
    public function edit(ChefeDepartamento $chefeDepartamento)
    {
        return view('user_types.chefe_departamentos.edit', [
            'chefeDepartamento' => $chefeDepartamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChefeDepartamento  $chefeDepartamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChefeDepartamento $chefeDepartamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChefeDepartamento  $chefeDepartamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChefeDepartamento $chefeDepartamento)
    {
        //
    }
}
