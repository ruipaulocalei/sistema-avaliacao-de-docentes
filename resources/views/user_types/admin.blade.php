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
                    <article>
                        <span class="text-xl font-bold">Docentes</span>
                        <hr class="font-bold border border-black">
                        <div class="grid gap-3
                        md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <div
                                class="bg-slate-300 shadow-md
                        rounded-md hover:cursor-pointer p-2 my-3 space-y-2">
                                <div class="">
                                    <h6 class="h-24 w-24 mx-auto rounded-full bg-white"></h6>
                                    <div>
                                        <h4 class="font-bold text-xl">Nome Docente</h4>
                                        <h5 class="font-semibold">Especialidade: Matemática</h5>
                                    </div>

                                </div>
                                <p
                                    class="bg-blue-600 text-center
                                text-white px-3 rounded-md w-full">
                                    <a href="#">Avaliar</a>
                                </p>
                            </div>
                        </div>

                        <fieldset id="question1">
                            <h4 class="font-semibold">Iniciou as aulas na data prevista?</h4>
                            <div>
                                <input type="radio" name="question1" value="1" />
                                <label for="">Sim</label>
                            </div>
                            <div>
                                <input type="radio" name="question1"  value="2" />
                                <label for="">Não</label>
                            </div>
                        </fieldset>
                        <fieldset id="question2">
                            <h4 class="font-semibold">Apresentou o programa analítico no início do ano(do semestre)?
                            </h4>
                            <div>
                                <input type="radio" name="question2" />
                                <label for="">Sim</label>
                            </div>
                            <div>
                                <input type="radio" name="question2" />
                                <label for="">Não</label>
                            </div>
                        </fieldset>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
