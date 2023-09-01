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
            font-family: 'Times New Roman', Times, serif;
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
        .container {
            position: relative;
            width: 100%;
            height: 40px;
        }

        .content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 75%;
            transform: translateX(-50%);
            text-align: center;
        }
    </style>
</head>

<body class="mx-auto">
    <main style="padding-left: 20px">
        <header class="flex justify-center
        flex-col items-center gap-2 mt-4">
            <div style="text-align: center;">
                <h4><img src="{{public_path('images/IPHLogo.png')}}"
                    class="w-4 h-8" alt="Logo IPH"></h4>
            </div>
            <div class="text-center space-y-2">
                <h5>Universidade Mandume Ya Ndemufayo</h5>
                <h5>Instituto Politécnico da Huíla</h5>
                <h6 style="margin-top: 16px;">Ficha de Avaliação do docente</h6>
            </div>
            <div class="container">
                <div class="content">
                    <h5 style="margin-left: 50px;">Visto do Decano</h5>
                    <h5>__________________________________________</h5>
                 </div>
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
        <table border='0' style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 100%; text-align: center;">
                        <h5>O Docente</h5>
                    </th>
                    <th style="width: 100%; text-align: center;">
                        <h5>O Chefe de Departamento</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 100%; text-align: center;">
                        <p>_______________________</p>
                        <h5>{{ $resultado->docente->name }}</h5>
                    </td>
                    <td style="width: 100%; text-align: center;">
                        <p>_______________________</p>
                        <h5>{{ $chefeDepartamento }}</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>

</body>

</html>
