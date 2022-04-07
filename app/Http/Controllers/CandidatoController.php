<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\NivelAcademico;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();
        return view("candidatos.index", compact("candidatos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveis = NivelAcademico::all();
        return view("candidatos.create")->with("niveis", $niveis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "nome" => "required",
            "nivel" => "required",
            "experiencia" => "required"
        ]);
        Candidato::create([
            "nome" => $data["nome"],
            "nivel_academico_id" => $data["nivel"],
            "experiencia" => $data["experiencia"],
        ]);
        return redirect()->action([CandidatoController::class, "index"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        $niveis = NivelAcademico::all();
        return view("candidatos.edit", compact("candidato", "niveis"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        $data = $request->validate([
            "nome" => "required",
            "nivel" => "required",
            "experiencia" => "required"
        ]);
        $candidato->nome = $data["nome"];
        $candidato->experiencia = $data["experiencia"];
        $candidato->nivel_academico_id = $data["nivel"];
        $candidato->save();
        return redirect()->action([CandidatoController::class, "index"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
