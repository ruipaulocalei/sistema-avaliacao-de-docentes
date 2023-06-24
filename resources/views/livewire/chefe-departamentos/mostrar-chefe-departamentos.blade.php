<div class="">
    <div class="">
        <div class="overflow-hidden bg-white">
            <div class=" bg-white border-b border-gray-200">
                {{-- <x-flash-success-message /> --}}
                @if (count($chefeDepartamentos) > 0)
                    <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle sm:rounded-md pb-48">
                        <table
                            class="min-w-full border animated fadeInLeft mt-5
                         divide-y divide-gray-200">
                            <thead class="bg-purple-900 text-white mb-4">
                                <tr class=" px-4">
                                    {{-- <th class="hidden md:block px-6 py-3 text-left uppercase text-sm leading-4 font-medium">ID</th> --}}
                                    <th
                                        class="px-6 py-3 text-left uppercase
                                     text-sm leading-4 font-medium">
                                        Nome do Chefe de Departamento
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left uppercase
                                     text-sm leading-4 font-medium">
                                        Nome do Departamento
                                    </th>
                                    <th class="px-6 py-3 text-left uppercase text-sm leading-4 font-medium">Operações
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($chefeDepartamentos as $chefeDepartamento)
                                    <tr class="bg-white">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                                    leading-5 font-medium">
                                            {{ $chefeDepartamento->docente->name }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                                    leading-5 font-medium">
                                            {{ $chefeDepartamento->departamento->nome }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm
                    leading-5 font-medium">
                                            <a class="bg-green-600 px-4 py-1 text-white rounded-md"
                                                href="{{ route('chefe_departamentos.edit', $chefeDepartamento->id) }}">Editar</a>
                                            <button wire:click="$emit('mostrarAlerta', {{ $chefeDepartamento->id }})"
                                                class="px-4 py-1 text-xs text-red-500 uppercase bg-red-200 rounded-md border
                                            border-transparent hover:text-red-700 hover:bg-red-300">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @else
                    <h2 class="text-center
                     text-red-600 font-bold text-xl">Sem chefes de
                        departamentos criados</h2>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', chefeDepartamentoId => {
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
                    Livewire.emit('eliminarChefeDepartamentoId', chefeDepartamentoId)
                    Swal.fire(
                        'Excluído!',
                        'O Chefe de departamento foi excluído.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
