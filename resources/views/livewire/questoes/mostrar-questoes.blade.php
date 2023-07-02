<div class="container mx-auto flex flex-col items-center justify-center">
    {{-- Do your work, then step back. --}}
    @if (count($questoes) > 0)
        <table>
            <thead class="bg-blue-500 text-white">
                <tr class="border border-black px-4 space-x-4">
                    <th class="border-l border-black
                 px-5 uppercase">Nome</th>
                    <th class="border-l border-black
                 px-5 uppercase">Opções</th>
                </tr>
            <tbody>
                @foreach ($questoes as $questao)
                    <tr class="text-left border border-black">
                        <td class="border-l border-black px-4">{{ $questao->pergunta }}</td>
                        <td class="border-l border-black
                        px-4 py-2 space-x-2 flex">
                            <a class="bg-blue-800 py-2 px-3 uppercase
                    rounded-lg text-white text-xs font-bold"
                                href="{{ route('questoes.edit', $questao->id) }}">Editar</a>
                            <button
                                class="bg-red-800 py-2 px-3 uppercase
                    rounded-lg text-white text-xs font-bold"
                                wire:click="$emit('mostrarAlerta', {{ $questao->id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center max-w-xl mx-auto my-4">
            {{ $questoes->links() }}
        </div>

    @else
        <h1>Sem nenhuma questão por enquanto!</h1>
    @endif

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('mostrarAlerta', questaoId => {
                Swal.fire({
                    title: 'Tens a certeza que queres eliminar?',
                    text: "Uma vez excluído não se pode reverter!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, eliminá-lo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminarQuestao', questaoId)
                        Swal.fire(
                            'Excluído!',
                            'Questão excluída.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
