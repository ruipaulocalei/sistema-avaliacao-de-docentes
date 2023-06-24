<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="text-xl font-bold">Média dos docentes avaliados</span>
                    <hr class="font-bold border border-black mb-3">
                    @if (count($docentes) > 0)
                        @foreach ($docentes as $docente)
                            <div class="flex space-x-4">
                                <h4>{{ $docente->name }} - </h4>
                                <h5>Média:
                                    <span class="font-bold">{{ round($docente->media) }} Pontos -
                                       +
                                    </span>
                                </h5>
                            </div>
                        @endforeach
                        <div class="w-full lg:w-1/2 py-3 h-96">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                    @else
                        <h4>Sem docentes avaliados</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            var docente = {!! $docentes !!};
            var label = [];
            var value = [];
            for (var data in docente) {
                label.push(docente[data]['name']);
                value.push((docente[data]['media']).toFixed());
            }

            var myChart = new Chart(document.getElementById('myChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: `Média da avaliação dos professores`,
                        data: value,
                        fillColor: "rgba(220,220,220,0.5)",
                        backgroundColor: ["purple", "blue",
                            "green", "yellow", "purple", "red", "pink", "cyan"
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Melhor docente'
                    }
                }
            });
        </script>
    @endsection
</x-app-layout>
