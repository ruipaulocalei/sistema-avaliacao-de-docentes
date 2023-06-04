<?php

namespace App\Http\Livewire\Questoes;

use App\Models\Avaliacao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CriarQuestoes extends Component
{
    public $nome;
    public $resposta1;
    public $resposta2;
    public $resposta_certa;

    protected $rules = [
        'nome' => 'required',
        'resposta1' => 'required',
        'resposta2' => 'required',
        'resposta_certa' => 'required',
    ];

    public function mount()
    {
        $this->resposta1 = 'Sim';
        $this->resposta2 = 'Não';
        $this->resposta_certa = 'Sim';
    }

    public function render()
    {
        return view('livewire.questoes.criar-questoes');
    }

    public function criarQuestao()
    {
        $request = $this->validate();
        //dd($request['resposta_certa']);
        try {
            DB::beginTransaction();
            Avaliacao::create([
                'pergunta' => $request['nome'],
                'resposta1' => $request['resposta1'],
                'resposta2' => $request['resposta2'],
                'resposta_certa' => $request['resposta_certa'],
            ]);
            DB::commit();
            session()->flash('message', 'Questão criada');
            return redirect()->route('questoes.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
