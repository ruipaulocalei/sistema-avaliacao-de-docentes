<?php

namespace App\Http\Livewire\Departamentos;

use App\Models\Departamento;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarDepartamentos extends Component
{
    use WithPagination;
    public $listeners = ['eliminarChefeDepartamento'];
    public function render()
    {
        $departamentos = Departamento::paginate(10);
        return view('livewire.departamentos.mostrar-departamentos', [
            'departamentos' => $departamentos
        ]);
    }

    public function eliminarChefeDepartamento(Departamento $departamento)
    {
        try {
            DB::beginTransaction();
            $departamento = Departamento::lockForUpdate()->find($departamento->id);
            $departamento->delete();
            DB::commit();
        } catch (\Exception $e) {
            //$e;
            DB::rollBack();
        }
    }
}
