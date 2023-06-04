<?php

namespace App\Http\Livewire\Questoes;

use App\Models\Avaliacao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarQuestoes extends Component
{
    use WithPagination;
    protected $listeners = ['eliminarQuestao'];

    public function render()
    {
        $questoes = Avaliacao::paginate(5);
        return view('livewire.questoes.mostrar-questoes', [
            'questoes' => $questoes
        ]);
    }

    public function eliminarQuestao(Avaliacao $avaliacao)
    {
        try {
            DB::beginTransaction();
            $avaliacao = Avaliacao::lockForUpdate()->find($avaliacao->id);
            $avaliacao->delete();
            DB::commit();
        } catch (\Exception $e) {
            //$e;
            DB::rollBack();
        }
    }
}
