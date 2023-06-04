<?php

namespace App\Http\Livewire\Docentes;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditarDocentes extends Component
{
    public $user_id;
    public $nome;
    public $email;

    protected function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email',
                'max:255', 'unique:users,email,' . $this->user_id
            ],
        ];
    }
    public function render()
    {
        return view('livewire.docentes.editar-docentes');
    }

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->nome = $user->name;
        $this->email = $user->email;
    }

    public function editarDocente()
    {
        $request = $this->validate();
        try {
            DB::beginTransaction();
            $user = User::lockForUpdate()->find($this->user_id);
            $user->name = $request['nome'];
            $user->email = $request['email'];
            $user->save();
            DB::commit();
            session()->flash('message', 'Docente actualizado');
            return redirect()->route('docentes.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
