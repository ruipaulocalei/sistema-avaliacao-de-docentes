<?php

namespace App\Http\Livewire\ChefeDepartamentos;

use App\Models\ChefeDepartamento;
use App\Models\Departamento;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditarChefeDepartamento extends Component
{
    public $chefeDepartamentoId;
    public $docente;
    public $departamento;

    public function rules()
    {
        return [
            'docente' => ['required', 'unique:chefe_departamentos,docente_id,' . $this->chefeDepartamentoId],
            'departamento' => ['required', 'unique:chefe_departamentos,departamento_id,' . $this->chefeDepartamentoId],
        ];
    }
    public function render()
    {
        $docentes = User::whereHas('roles', function ($q) {
            $q->where('name', 'professor');
        })->get();
        $departamentos = Departamento::all();
        return view('livewire.chefe-departamentos.editar-chefe-departamento', [
            'docentes' => $docentes,
            'departamentos' => $departamentos,
        ]);
    }

    public function mount(ChefeDepartamento $chefeDepartamento)
    {
        $this->chefeDepartamentoId = $chefeDepartamento->id;
        $this->docente = $chefeDepartamento->docente_id;
        $this->departamento = $chefeDepartamento->departamento_id;
    }

    public function editarChefeDepartamento()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $chefeDepartamento = ChefeDepartamento::find($this->chefeDepartamentoId);
            $chefeDepartamento->departamento_id = $this->departamento;
            $chefeDepartamento->docente_id = $this->docente;
            $chefeDepartamento->save();
            DB::commit();
            return redirect()->route('chefe_departamentos.index')
                ->with('message', 'Chefe de Departamento actualizado.');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
