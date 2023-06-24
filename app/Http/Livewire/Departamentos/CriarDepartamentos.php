<?php

namespace App\Http\Livewire\Departamentos;

use App\Models\Departamento;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CriarDepartamentos extends Component
{
    public $nome;

    protected $rules = [
        'nome' => 'required'
    ];

    public function render()
    {
        return view('livewire.departamentos.criar-departamentos');
    }

    public function criarDepartamento()
    {
        $this->validate();
        try {
            DB::beginTransaction();
            Departamento::create([
                'nome' => $this->nome
            ]);
            DB::commit();
            session()->flash('message', 'Departamento criado');
            return redirect()->route('departamentos.index');
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }
}
