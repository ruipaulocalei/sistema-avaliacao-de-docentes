<?php

namespace App\Http\Livewire\Docentes;

use App\Models\Departamento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;

class CriarDocentes extends Component
{
    public $nome;
    public $email;
    public $password;
    public $password_confirmation;
    public $departamento;
    public $imagem;
    use WithFileUploads;

    protected function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'departamento' => ['required'],
            'imagem' => ['required'],
        ];
    }
    public function render()
    {
        $departamentos = Departamento::all();
        return view('livewire.docentes.criar-docentes', [
            'departamentos' => $departamentos
        ]);
    }

    public function criarDocente()
    {
        $request = $this->validate();
        $imagem = $this->imagem->store('public/docentes');
        $nome_imagem = str_replace('public/docentes/', '', $imagem);
        $user = User::create([
            'name' => $request['nome'],
            'email' => $request['email'],
            'departamento_id' => $request['departamento'],
            'imagem' => $nome_imagem,
            'password' => Hash::make($request['password']),
        ]);
        $user->attachRole("professor");
        session()->flash('message', 'Docente adicionado');
        return redirect()->route('docentes.index');
    }
}
