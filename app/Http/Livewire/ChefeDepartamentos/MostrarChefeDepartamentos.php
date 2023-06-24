<?php

namespace App\Http\Livewire\ChefeDepartamentos;

use App\Models\ChefeDepartamento;
use Livewire\Component;

class MostrarChefeDepartamentos extends Component
{
    public function render()
    {
        $chefeDepartamentos = ChefeDepartamento::paginate(10);
        return view('livewire.chefe-departamentos.mostrar-chefe-departamentos', [
            'chefeDepartamentos' => $chefeDepartamentos
        ]);
    }
}
