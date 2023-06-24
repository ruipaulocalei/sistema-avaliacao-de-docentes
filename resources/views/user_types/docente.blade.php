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
                    <h1 class="text-center uppercase font-bold">Minha pontuação</h1>
                    @if ($pontuacao)
                        <h6>Olá, professor <span class="font-bold">{{ auth()->user()->name }}.</span>
                            Aqui tens a tua média das avaliações feitas pelos estudantes:</h6>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
