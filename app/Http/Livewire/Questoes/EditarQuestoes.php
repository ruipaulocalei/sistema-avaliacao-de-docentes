<?php

namespace App\Http\Livewire\Questoes;

use App\Models\Avaliacao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditarQuestoes extends Component
{
    public $questao_id;
    public $nome;

    protected $rules = [
        'nome' => 'required'
    ];
    public function render()
    {
        return view('livewire.questoes.editar-questoes');
    }

    public function mount(Avaliacao $avaliacao)
    {
        $this->questao_id = $avaliacao->id;
        $this->nome = $avaliacao->pergunta;
    }

    public function editarQuestao()
    {
        $request = $this->validate();
        try {
            DB::beginTransaction();
            $avaliacao = Avaliacao::lockForUpdate()->find($this->questao_id);
            $avaliacao->pergunta = $request['nome'];
            $avaliacao->save();
            DB::commit();
            session()->flash('message', 'Questão actualizada');
            return redirect()->route('questoes.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
