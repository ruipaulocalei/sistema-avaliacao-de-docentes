<div class="">
    {{-- Do your work, then step back. --}}
    @if (count($docentes) > 0)
        <table>
            <thead class="bg-blue-500 text-white">
                <tr class="border border-black px-4 space-x-4">
                    <th class="border-l border-black
                 px-5 uppercase">Nome</th>
                    <th class="border-l border-black
                 px-5 uppercase">E-mail</th>
                    <th class="border-l border-black
                 px-5 uppercase">Opções</th>
                </tr>
            <tbody>
                @foreach ($docentes as $docente)
                    <tr class="text-left border border-black">
                        <td class="border-l border-black px-4">{{ $docente->name }}</td>
                        <td class="border-l border-black px-4">{{ $docente->email }}</td>
                        <td class="border-l border-black
                        px-4 py-2 space-x-2">
                            <a class="bg-blue-800 py-2 px-3 uppercase
                    rounded-lg text-white text-xs font-bold"
                                href="{{ route('docentes.edit', $docente->id) }}">Editar</a>
                            <button
                                class="bg-red-800 py-2 px-3 uppercase
                    rounded-lg text-white text-xs font-bold"
                                wire:click="$emit('mostrarAlerta', {{ $docente->id }})">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1>Sem nenhum Docente por enquanto!</h1>
    @endif

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', docenteId => {
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
                    Livewire.emit('eliminarDocente', docenteId)
                    Swal.fire(
                        'Excluído!',
                        'Teu produto foi excluído.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
</div>

<div class="text-center max-w-xl">
    {{$docentes->links()}}
</div>

