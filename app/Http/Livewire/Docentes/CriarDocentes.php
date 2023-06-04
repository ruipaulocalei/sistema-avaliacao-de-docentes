<?php

namespace App\Http\Livewire\Docentes;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;

class CriarDocentes extends Component
{
    public $nome;
    public $email;
    public $password;

    /*  protected $rules = [
        'nome' => 'required|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required'
    ]; */

    protected function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required', Rules\Password::defaults(),
            ],
        ];
    }
    public function render()
    {
        return view('livewire.docentes.criar-docentes');
    }

    public function criarDocente()
    {
        $request = $this->validate();
        $user = User::create([
            'name' => $request['nome'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->attachRole("professor");
        session()->flash('message', 'Docente adicionado');
        return redirect()->route('docentes.index');
    }
}
