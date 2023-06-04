<?php

namespace App\Http\Livewire\Estudantes;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarEstudantes extends Component
{
    use WithPagination;
    protected $listeners = ['eliminarEstudante'];
    public function render()
    {

        $estudantes = User::whereHas('roles', function ($q) {
            $q->where('name', 'estudante');
        })->paginate(10);
        return view('livewire.estudantes.mostrar-estudantes', [
            'estudantes' => $estudantes
        ]);
    }

    public function eliminarEstudante(User $user)
    {
        try {
            DB::beginTransaction();
            $user = User::lockForUpdate()->find($user->id);
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            //$e;
            DB::rollBack();
        }
    }
}
