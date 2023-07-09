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
            font-family: 'Times New Roman', Times, serif;
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

        .justify-end {
            justify-content: flex-end;
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

        .uppercase {
            text-transform: uppercase;
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
        .my-8 {
            margin-top: 2rem/* 32px */;
            margin-bottom: 2rem/* 32px */;
        }
        .border {
            border: 1px solid #000;
        }
        .font-light {
            font-weight: 100;
        }
    </style>
</head>

<body class="max-w-screen mx-auto">
    <main>
        <header class="flex justify-center
        flex-col items-center gap-2 mt-4">
            <h4><img src="/images/IPHLogo.png" class="w-4 h-8" alt="Logo IPH"></h4>
            <div class="text-center space-y-2">
                <h5>Universidade Mandume Ya Ndemufayo</h5>
                <h5>Instituto Politécnico da Huíla</h5>
            </div>
        </header>
        <section class="flex justify-end my-8">
            <div class="text-center">
                <h5 class="font-semibold">Visto do Decano</h5>
                <p>____________________________</p>
                <h5 class="font-light">Rodrigues</h5>
            </div>
        </section>
        <section>
            <h4 class="text-center uppercase">Ficha de avaliação do docente</h4>
            <div class="flex mt-4">
                <h5 class="uppercase">1. No domínio do ensino</h5>
                <span> (Informações do docente)</span>
            </div>
            <div class="mt-4">
                <h5 class="uppercase">2. Pontuação/Classificação</h5>
                <h5 class="font-light">16 Pontos - Muito Bom</h5>
            </div>
        </section>
        <section class="border border-black text-center mt-4 space-y-2">
            <h5>O Notado</h5>
            <h6>Tomei conhecimento após homologação</h6>
            <h6>Em ...../...../20....</h6>
        </section>
        <p class="text-center mt-4">__________________, aos _____ de ______________________ de 20____</p>
    </main>
    <br>
    <footer class="flex justify-between">
        <div class="text-center">
            <h5>O Docente</h5>
            <p>____________________________</p>
            <h5>{{ $resultado->docente->name }}</h5>
        </div>
        <div class="text-center">
            <h5>O Chefe de Departamento</h5>
            <p>____________________________</p>
            <h5>{{ $chefeDepartamento }}</h5>
        </div>
    </footer>

</body>

</html>
