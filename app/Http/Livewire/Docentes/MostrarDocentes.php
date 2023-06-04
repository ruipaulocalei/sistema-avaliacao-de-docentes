<?php

namespace App\Http\Livewire\Docentes;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarDocentes extends Component
{
    use WithPagination;
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
}
