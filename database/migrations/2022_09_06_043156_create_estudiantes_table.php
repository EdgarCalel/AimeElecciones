<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_student')->default(0);
            $table->string('nombre', 25);
            $table->string('apellido', 25);
            $table->string('email')->unique();
            $table->string('escolaridad', 25);
            $table->string('foto_perfil', 300);
            $table->string('codigo_votacion', 15);
            $table->string('password');
            $table->boolean('codigo_status')->default(0);
            $table->integer('votos')->nullable()->default(0);
            $table->boolean('Directiva')->default(0);
            $table->unsignedBigInteger('id_grado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
