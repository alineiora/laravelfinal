<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMensagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem', function (Blueprint $table) {
            $table->increments('id');           //código identificador
            $table->string('titulo');            //título da atividade
            $table->string('texto');      //descrição da atividade
            $table->string('autor');  
            $table->integer('user_id')->unsigned();
            $table->integer('atividade_id')->unsigned();
            //$table->dateTime('created_at');    //agendado para
            //$table->dateTime('updated_at');
            $table->timestamps();
        });
        
        Schema::table('mensagem', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('atividade_id')->references('id')->on('atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagem', function (Blueprint $table) {
            //
        });
    }
}
