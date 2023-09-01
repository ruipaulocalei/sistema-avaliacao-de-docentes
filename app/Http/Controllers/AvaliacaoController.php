<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avaliacao;
use App\Models\Resultado;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResultadoItem;

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
    } // Make sure to import the appropriate model.

    public function avaliar(Request $request)
    {
        // Get all form data from the request.
        $formData = $request->all();
        $docenteId = $formData['docente_id'];
        // Remove the CSRF token and the docente_id from the form data.
        unset($formData['_token']);
        $valor = 0;
        // Loop through the remaining form data and store it in the database.
        foreach ($formData as $questaoId => $answer) {
            $questao = Avaliacao::firstWhere('id', $questaoId);

            // Make sure we have a valid $questao object.
            if ($answer == 'Sim') {
                $valor++;
            }
            if ($questao) {
                // Access the 'pergunta' property directly from the $questao object.
                $pergunta = $questao->pergunta;

                // Store the data in the database using the ResultadoItem model.
                ResultadoItem::create([
                    'questao' => $pergunta,
                    'resposta' => $answer,
                    'docente_id' => $docenteId,
                ]);
            }
        }
        Resultado::updateOrCreate([
            'estudante_id' => auth()->user()->id,
            'docente_id' => $docenteId,
        ], [
            'pontuacao' => $valor,
        ]);
        // Redirect or respond as needed after successful submission.
        return redirect()->route('dashboard');
    }


    // public function avaliar(Request $request)
    // {
    //     $respostas = $request->all();
    //     $docenteId = $respostas['docente_id'];
    //     $valor = 0;
    //     foreach ($respostas as $respostaId => $respostaUtilizador) {
    //         if (is_numeric($respostaId)) {
    //             //dd($respostaId);
    //             $questoes = Avaliacao::where('id', $respostaId)->get();
    //             $respostaCorrecta = $questoes[0]->resposta_certa;
    //             if ($respostaCorrecta == $respostaUtilizador) {
    //                 $valor++;
    //             }
    //         }
    //     }
    //     Resultado::updateOrCreate([
    //         'estudante_id' => auth()->user()->id,
    //         'docente_id' => $docenteId,
    //     ], [
    //         'pontuacao' => $valor,
    //     ]);
    //     //dd($valor);
    //     return redirect()->route('dashboard');
    // }
}
