<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proprietario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade');
            $table->char('sexo', 1);
            $table->timestamps();
        });

        Schema::create('veiculo', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->integer('ano');
            $table->unsignedBigInteger('proprietario_id');
            $table->foreign('proprietario_id')->references('id')->on('proprietario');
            $table->timestamps();
        });

        Schema::create('revisao', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('veiculo_id');
            $table->foreign('veiculo_id')->references('id')->on('veiculo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revisao');
        Schema::dropIfExists('veiculo');
        Schema::dropIfExists('proprietario');
    }
};