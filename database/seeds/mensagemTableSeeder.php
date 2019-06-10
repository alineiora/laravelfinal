<?php

use Illuminate\Database\Seeder;
use App\Mensagem;

class mensagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova',
            'autor' => 'Aline',
            'user_id' => 1,
            'atividade_id' => 1
        ]);

        Mensagem::create([
            'titulo' => 'Prova',
            'texto' => 'Prova',
            'autor' => 'Aline',
            'user_id' => 1,
            'atividade_id' => 1
        ]);
    }
}
