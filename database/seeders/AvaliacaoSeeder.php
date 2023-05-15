<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avaliacaos')->insert([
            'pergunta' => "Iniciou as aulas na data prevista?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Apresentou o programa analítico no início do ano(do semestre)?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Apresentou bibliografia de base?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Apresentou apontamento didáctico?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Cumpriu com a execução do plano temático, de acordo
            com o calendário e a carga horária do ano académico vigente?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Apresenta os sumários correspondentes as exigências
            do plano temático?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "Respeita o calendário de provas e exames?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('avaliacaos')->insert([
            'pergunta' => "É pontual?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "É assíduo?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Tira dúvidas nas aulas teóricas?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Tira dúvidas nas aulas práticas?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Afixa o horário de tirar dúvidas e cumpre-o?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Tira dúvidas durante o exame escrito?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Faz correcção das provas com os estudantes ou pelo
            menos afixa os tópicos da correcção modelo?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Apresentou o resultado das provas
            dentro dos prazos previstos?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Aceita e discute reclamações, quando são procedentes?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "Terminou as aulas na data prevista?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "No decurso da aula o docente demonstra:
             Domínio da cadeira que ministra?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('avaliacaos')->insert([
            'pergunta' => "No decurso da aula o docente demonstra:
             Perícia pedagógica em termos de princípios, objectivos,
             conteúdos, métodos, e meios que utiliza?",
            'resposta1' => "Sim",
            'resposta2' => "Não",
            'resposta_certa' => "Sim",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
