<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Docente {{ $resultado->docente->name }}</title>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html,
        body {
            font-size: 20px;
        }

        .max-w-screen {
            max-width: 768px;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center
        }

        .justify-between {
            justify-content: space-between
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        .gap-2 {
            gap: 4px;
        }

        .space-y-2> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
        }

        .w-4 {
            width: 3rem;
        }

        .h-8 {
            height: 3rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-16 {
            margin-top: 4rem;
        }

        .mb-8 {
            margin-top: 0.5rem;
        }

        .text-green-600 {
            --tw-text-opacity: 1;
            color: rgb(5 122 85 / var(--tw-text-opacity));
        }

        .text-red-600 {
            --tw-text-opacity: 1;
            color: rgb(224 36 36 / var(--tw-text-opacity));
        }
    </style>
</head>

<body class="mx-auto">
    <main>
        <header class="flex justify-center
        flex-col items-center gap-2 mt-4">
            <h4><img src="/images/IPHLogo.png" class="w-4 h-8" alt="Logo IPH"></h4>
            <div class="text-center space-y-2">
                <h5>Universidade Mandume Ya Ndemufayo</h5>
                <h5>Instituto Politécnico da Huíla</h5>
                <h6 style="margin-top: 16px;">Ficha de Avaliação do docente</h6>
            </div>
            <div
             style="width: 100; background-color: aqua;
              text-align: right; margin-top: 16px;">
              <table>
                <thead>
                    <tr colspan='2'>
                        <th style="width: 100%;"><h5>Visto do Decano</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h5>__________________________________________</h5></td>
                    </tr>
                </tbody>
              </table>
            </div>
        </header>
        <section class="mt-4">
            <p>Resultados da avaliação</p>
        </section>
        @foreach ($resultadoItems as $resultadoItem)
            <p class="mb-8">{{ $resultadoItem->questao }}</p>
            <div class="gap-2" style="display: flex; flex-direction: column; align-items: flex-start;">
                <h6 style="color: {{ $resultadoItem->resposta === 'Sim' ? 'green' : 'black' }}">
                    Sim
                </h6>
                <input type="radio" name="resposta[{{ $resultadoItem->id }}]" value="Sim"
                    @if ($resultadoItem->resposta === 'Sim') checked @endif
                    style="border-color: {{ $resultadoItem->resposta === 'Sim' ? 'green' : 'transparent' }};
            background-color: {{ $resultadoItem->resposta === 'Sim' ? 'green' : 'transparent' }};
            color: white;" />
                <h6 style="color: {{ $resultadoItem->resposta === 'Não' ? 'red' : 'black' }}">
                    Não
                </h6>
                <input type="radio" name="resposta[{{ $resultadoItem->id }}]" value="Não"
                    @if ($resultadoItem->resposta === 'Não') checked @endif
                    style="border-color: {{ $resultadoItem->resposta === 'Não' ? 'red' : 'transparent' }};
            background-color: {{ $resultadoItem->resposta === 'Não' ? 'red' : 'transparent' }};" />
            </div>
        @endforeach


    </main>
    <br>
    <footer style="display: grid; grid-column: 2; grid-gap: 10px;">
        <table border='0' style="text-align: center;">
            <thead>
                <tr>
                    <th>
                        <h5>O Docente</h5>
                    </th>
                    <th>
                        <h5>O Chefe de Departamento</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>_________________________________</p>
                        <h5>{{ $resultado->docente->name }}</h5>
                    </td>
                    <td>
                        <p>__________________________________</p>
                        <h5>{{ $chefeDepartamento }}</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>

</body>

</html>
