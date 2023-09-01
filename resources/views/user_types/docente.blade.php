@php
    use App\Http\Controllers\DashboardController;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle do Docente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-lg">
                    @if ($chefeDepartamento->docente)
                        <div
                            class="flex justify-between mb-3
                        border border-gray-400 rounded-md p-2">
                            <h4 class="font-bold">{{ $chefeDepartamento->docente->name }}</h4>
                            <h5>Chefe de Departamento de
                                <span class="font-bold">{{ $chefeDepartamento->departamento->nome }}</span>
                            </h5>
                        </div>
                        <div>
                            <h6 class="text-center text-xl font-bold">Professores
                                do Departamento de {{ $chefeDepartamento->departamento->nome }}</h6>
                                <hr class="border border-gray-300" />
                                @if (count($usersDepartamento) > 0)

                                <div class="grid gap-4
                            md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                                    @foreach ($usersDepartamento as $docente)
                                        @php
                                            $isAvaliado = DashboardController::isAvaliado(auth()->user()->id, $docente->id);
                                        @endphp
                                        <div
                                            class="bg-slate-300 shadow-md
                            rounded-md p-2 my-3 space-y-2">
                                            <div class="">
                                                <h6
                                                    class="h-28 w-28 mx-auto flex flex-col items-center
                                                rounded-full bg-white justify-center
                                                font-bold text-blue-600 text-5xl tracking-wider">
                                                <img class="w-28 h-28 rounded-full"
                                                src="{{ asset('storage/docentes/' . $docente->imagem) }}"
                                        alt="">
                                                    {{-- {{ $avatar }} --}}
                                                </h6>
                                                <div>
                                                    <h4 class="font-bold text-xl">{{ $docente->name }}</h4>
                                                    <h5 class="font-semibold">{{ $docente->email }}</h5>
                                                    <h5 class="font-semibold">Departamento: <span class="font-bold">{{ $docente->departamento->nome }}</span></h5>
                                                </div>

                                            </div>
                                            @if ($isAvaliado < 1)
                                                <a class="w-full"
                                                    href="{{ route('avaliar.index', ['id' => $docente->id]) }}">
                                                    <p
                                                        class="bg-blue-600 text-center
                                            text-white px-3 rounded-md w-full uppercase my-2">
                                                        Avaliar</p>
                                                </a>
                                            @else
                                                <h6
                                                    class="text-center
                                                 text-red-500 text-lg">
                                                    Avaliado</h6>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h4 class="text-red-600 text-lg
                                text-center font-bold">Sem
                                    docentes</h4>
                            @endif
                        </div>
                    @else
                        <h1 class="text-center uppercase font-bold">Minha pontuação</h1>
                        @if ($pontuacao)
                            <h6>Olá, professor <span class="font-bold">{{ auth()->user()->name }}.</span>
                                Aqui tens a tua média das avaliações feitas:</h6>
                            <div class="flex gap-2 items-baseline">
                                <span class="text-gray-800 font-semibold">Média:</span>
                                <h4 class="font-extrabold text-lg">{{ round($pontuacao) }}</h4>
                            </div>
                            <div class="flex gap-2 items-baseline">
                                <span class="text-gray-800 font-semibold">Pontuação:</span>
                                @php
                                    $media = round($pontuacao);
                                    $mensagem = '';
                                    if ($media >= 0 && $media <= 7) {
                                        $mensagem = 'Mau';
                                    } elseif ($media >= 8 && $media <= 9) {
                                        $mensagem = 'Medíocre';
                                    } elseif ($media >= 10 && $media <= 12) {
                                        $mensagem = 'Suficiente';
                                    } elseif ($media >= 13 && $media <= 15) {
                                        $mensagem = 'Bom';
                                    } elseif ($media >= 16 && $media <= 17) {
                                        $mensagem = 'Muito Bom';
                                    } elseif ($media >= 18 && $media <= 20) {
                                        $mensagem = 'Excelente';
                                    }
                                @endphp
                                <h4 class="font-extrabold text-lg"> {{ $mensagem }}</h4>
                            </div>
                        @else
                            <h1 class="text-red-600 text-center">
                                Sem Pontuação por enquanto.</h1>
                        @endif
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
