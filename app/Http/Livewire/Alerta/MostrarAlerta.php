<?php

namespace App\Http\Livewire\Alerta;

use Livewire\Component;

class MostrarAlerta extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.alerta.mostrar-alerta');
    }
}
