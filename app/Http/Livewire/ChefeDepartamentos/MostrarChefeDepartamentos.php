<?php

namespace App\Http\Livewire\ChefeDepartamentos;

use App\Models\ChefeDepartamento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MostrarChefeDepartamentos extends Component
{
    public $listeners = [''];
    public function render()
    {
        $chefeDepartamentos = ChefeDepartamento::paginate(10);
        return view('livewire.chefe-departamentos.mostrar-chefe-departamentos', [
            'chefeDepartamentos' => $chefeDepartamentos
        ]);
    }

    public function eliminarDepartamento(ChefeDepartamento $chefeDepartamento)
    {
        try {
            DB::beginTransaction();
            $chefeDepartamento = ChefeDepartamento::lockForUpdate()->find($chefeDepartamento->id);
            $chefeDepartamento->delete();
            DB::commit();
        } catch (\Exception $e) {
            //$e;
            DB::rollBack();
        }
    }
}
