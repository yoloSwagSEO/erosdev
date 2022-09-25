<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');//
            $table->string('lastname'); //
            $table->string('nickname'); //
            $table->date('birthdate'); //
            $table->string('phone');//
            $table->string('email');//
            $table->string('otherContact');//
            $table->string('code_postal'); //
            $table->string('ville'); //
            $table->string('poids');//
            $table->string('taille');//
            $table->integer('tp');//
            $table->string('bonnet');//
            $table->string('epilation');//
            $table->string('tatouage');//
            $table->string('piercing');//
            $table->string('origine');//
            $table->text('presentation');
            $table->string('visage');//
            $table->integer('state')->default(0);
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
        Schema::dropIfExists('leads');
    }
}
