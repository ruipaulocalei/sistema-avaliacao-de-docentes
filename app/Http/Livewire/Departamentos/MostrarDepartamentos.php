<?php

namespace App\Http\Livewire\Departamentos;

use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarDepartamentos extends Component
{
    use WithPagination;
    public function render()
    {
        $departamentos = Departamento::paginate(10);
        return view('livewire.departamentos.mostrar-departamentos', [
            'departamentos' => $departamentos
        ]);
    }
}
