<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Resultado;
use App\Models\User;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::where('id', $id)->first();
        $questoes = Avaliacao::all();
        //dd($user);
        return view('user_types.avaliacoes.index', compact('user', 'questoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }

    public function avaliar(Request $request)
    {
        /* $validatedData = $request->validate([
            '1' => 'required',
            '2' => 'required',
            // add more rules for other radio inputs here
        ], [
            '1.required' => 'Resposta para a pergunta 1 é obrigatória.',
            '2.required' => 'Resposta para a pergunta 2 é obrigatória.',
            // add more custom error messages for other radio inputs here
        ]); */
        //dd($validatedData);
        $respostas = $request->all();
        $docenteId = $respostas['docente_id'];
        $valor = 0;
        foreach ($respostas as $respostaId => $respostaUtilizador) {
            if (is_numeric($respostaId)) {
                //dd($respostaId);
                $questoes = Avaliacao::where('id', $respostaId)->get();
                $respostaCorrecta = $questoes[0]->resposta_certa;
                if ($respostaCorrecta == $respostaUtilizador) {
                    $valor++;
                }
            }
        }
        Resultado::updateOrCreate([
            'estudante_id' => auth()->user()->id,
            'docente_id' => $docenteId,
        ], [
            'pontuacao' => $valor,
        ]);
        //dd($valor);
        return redirect()->route('dashboard');
    }
}
