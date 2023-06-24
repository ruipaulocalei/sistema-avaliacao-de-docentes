<?php

namespace App\Http\Livewire\Departamentos;

use App\Models\Departamento;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditarDepartamentos extends Component
{
    public $departamento_id;
    public $nome;

    protected $rules = [
        'nome' => 'required'
    ];
    public function render()
    {
        return view('livewire.departamentos.editar-departamentos');
    }

    public function mount(Departamento $departamento)
    {
        $this->departamento_id = $departamento->id;
        $this->nome = $departamento->nome;
    }

    public function editarDepartamento()
    {
        $request = $this->validate();
        try {
            DB::beginTransaction();
            $departamento = Departamento::lockForUpdate()->findOrFail($this->departamento_id);
            $departamento->nome = $request['nome'];
            $departamento->save();
            DB::commit();
            session()->flash('message', 'Categoria actualizada');
            return redirect()->route('departamentos.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
