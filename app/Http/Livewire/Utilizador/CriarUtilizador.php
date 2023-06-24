<?php

namespace App\Http\Livewire\Utilizador;

use Livewire\Component;

class CriarUtilizador extends Component
{
    protected $rules = [
        'name' => 'required|max:50',
        'email' => 'required|unique:users|min:3|max:60',
        'numero_sigu' => 'required|unique:users|min:10|max:10',
        'password' => 'required|confirmed',
    ];
    public function render()
    {
        return view('livewire.utilizador.criar-utilizador');
    }

    public function criarUtilizador()
    {
        dd('Hello');
    }
}
