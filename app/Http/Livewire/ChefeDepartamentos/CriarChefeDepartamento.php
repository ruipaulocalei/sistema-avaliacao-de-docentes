<?php

namespace App\Http\Livewire\ChefeDepartamentos;

use App\Models\ChefeDepartamento;
use App\Models\Departamento;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CriarChefeDepartamento extends Component
{
    public $docente;
    public $departamento;

    public function rules()
    {
        return [
            'docente' => ['required', 'unique:'.ChefeDepartamento::class,],
            'departamento' => ['required', 'unique:'.ChefeDepartamento::class,],
        ];
    }

    public function render()
    {
        $docentes = User::whereHas('roles', function ($q) {
            $q->where('name', 'professor');
        })->get();
        $departamentos = Departamento::all();
        return view('livewire.chefe-departamentos.criar-chefe-departamento', [
            'docentes' => $docentes,
            'departamentos' => $departamentos,
        ]);
    }

    public function criarChefeDepartamento()
    {
        $request = $this->validate();
        try {
            DB::beginTransaction();
            $chefeDepartamentoExiste = ChefeDepartamento::where(['docente_id' =>
            $request['docente']])->OrWhere('departamento_id', $request['departamento'])->exists();
            if($chefeDepartamentoExiste){
                return session()->flash('error', 'O usuário ou departamento já existe.
                A aplicação permite simplesmente ter um departamento ou chefe de departamento');
            }
            ChefeDepartamento::create([
                'docente_id' => $request['docente'],
                'departamento_id' => $request['departamento'],
            ]);
            DB::commit();
            return redirect()->route('chefe_departamentos.index')
                ->with('message', 'Chefe de Departamento criado.');
        } catch (ValidationException $e) {
            dd($e->validator->errors());
            DB::rollBack();
        }
    }
}
