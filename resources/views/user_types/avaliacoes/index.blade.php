<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <article>
                        <span class="text-xl font-bold">Docente</span>
                        <hr class="font-bold border border-black">
                        <div class="grid gap-3
                        md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <div
                                class="bg-slate-300 shadow-md
                        rounded-md hover:cursor-pointer p-2 my-3 space-y-2">
                                {{-- <div class="">
                                    @php
                                        $avatar = '';
                                        $divide = explode(' ', $user->name);
                                        $numberOfName = count($divide);
                                        if ($numberOfName > 1) {
                                            $avatar = $divide[0][0] . '' . $divide[$numberOfName - 1][0];
                                        } else {
                                            $avatar = $divide[0][0];
                                        }
                                    @endphp
                                    <h6
                                        class="h-24 w-24 mx-auto flex flex-col items-center
                                rounded-full bg-white justify-center
                                font-bold text-blue-600 text-5xl tracking-wider">
                                        {{ $avatar }}</h6>
                                    <div>
                                        <h4 class="font-bold text-xl">{{ $user->name }}</h4>
                                        <h5 class="font-semibold">{{ $user->email }}</h5>
                                    </div>

                                </div> --}}
                                <h6
                                    class="h-28 w-28 mx-auto flex flex-col items-center
                                                rounded-full bg-white justify-center
                                                font-bold text-blue-600 text-5xl tracking-wider">
                                    <img class="w-28 h-28 rounded-full"
                                        src="{{ asset('storage/docentes/' . $user->imagem) }}" alt="">
                                    {{-- {{ $avatar }} --}}
                                </h6>
                                <div>
                                    <h4 class="font-bold text-xl">{{ $user->name }}</h4>
                                    <h5 class="font-semibold">{{ $user->email }}</h5>
                                    <h5 class="font-semibold">Departamento: <span
                                            class="font-bold">{{ $user->departamento->nome }}</span></h5>
                                </div>

                            </div>
                            {{-- <p
                                    class="bg-blue-600 text-center
                                text-white px-3 rounded-md w-full">
                                    <a href="#">Avaliar</a>
                                </p> --}}
                        </div>
                </div>

                <form action="{{ "/admin/avaliar/$user->id" }}"
                    class="space-y-4 px-6 pb-3" method="POST">
                    @csrf
                    <input type="hidden" name="docente_id" value="{{ $user->id }}">
                    @foreach ($questoes as $questao)
                        <fieldset id="{{ $questao->id }}">
                            <h4 class="font-semibold">{{ $questao->pergunta }}</h4>
                            <div>
                                <input type="radio" name="{{ $questao->id }}" value="Sim" />
                                <label for="">{{ $questao->resposta1 }}</label>
                            </div>
                            <div>
                                <input type="radio" name="{{ $questao->id }}" value="Não" />
                                <label for="">{{ $questao->resposta2 }}</label>
                            </div>
                        </fieldset>
                    @endforeach
                    <button class="px-8 py-2 bg-cyan-600 rounded-md shadow-md
                             text-white"
                        type="submit">Avaliar</button>
                </form>
                </article>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
