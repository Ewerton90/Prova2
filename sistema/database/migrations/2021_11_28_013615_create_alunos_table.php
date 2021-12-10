<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
			$table->string("nome",100);
			$table->string("email",100);
			$table->string("matricula",100);
			$table->integer("aluno")->unsigned();
			$table->foreign("aluno")->references("id")->on("aluno");
			$table->integer("turma")->unsigned();
			$table->foreign("turma")->references("id")->on("turma");
			$table->integer("nota")->unsigned();
			$table->foreign("nota")->references("id")->on("aluno");
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
        Schema::dropIfExists('aluno');
    }
}
