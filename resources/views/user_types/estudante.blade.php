@php
    use App\Http\Controllers\DashboardController;
@endphp
<x-app-layout>
    <x-slot name="header">
        {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article>
                        <span class="text-xl font-bold">Docentes</span>
                        <hr class="font-bold border border-black">
                        @if (count($docentes) > 0)

                            <div class="grid gap-4
                        md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                                @foreach ($docentes as $docente)
                                    @php
                                        $avatar = '';
                                        $divide = explode(' ', $docente->name);
                                        $numberOfName = count($divide);
                                        if ($numberOfName > 1) {
                                            $avatar =$divide[0][0].''.$divide[$numberOfName - 1][0];
                                        } else {
                                            $avatar = $divide[0][0];
                                        }
                                        //if($divide)
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
                        {{-- @livewire('counter') --}}
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
