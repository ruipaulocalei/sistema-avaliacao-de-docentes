<?php

namespace App\Http\Livewire\Docentes;

use App\Models\Departamento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarDocentes extends Component
{
    public $user_id;
    public $nome;
    public $email;
    public $imagem;
    public $imagem_nova;
    public $departamento;
    use WithFileUploads;

    protected function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email',
                'max:255', 'unique:users,email,' . $this->user_id
            ],
            'departamento' => ['required'],
            'imagem_nova' => ['nullable|image'],
        ];
    }
    public function render()
    {
        $departamentos = Departamento::all();
        return view('livewire.docentes.editar-docentes', [
            'departamentos' => $departamentos
        ]);
    }

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->nome = $user->name;
        $this->email = $user->email;
        $this->imagem = $user->imagem;
        $this->departamento = $user->departamento_id;
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
