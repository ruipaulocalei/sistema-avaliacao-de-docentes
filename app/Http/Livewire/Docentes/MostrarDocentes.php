<?php

namespace App\Http\Livewire\Docentes;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarDocentes extends Component
{
    use WithPagination;
    protected $listeners = ['eliminarDocente'];
    public function render()
    {
        $docentes = User::whereHas('roles', function ($q) {
            $q->where('name', 'professor');
        })->paginate(10);
        //dd($docentes);
        return view('livewire.docentes.mostrar-docentes', [
            'docentes' => $docentes
        ]);
    }

    public function eliminarDocente(User $user)
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
