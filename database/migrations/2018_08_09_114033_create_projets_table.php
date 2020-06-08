<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->unique();
            $table->text('description');
            $table->text('appartements');
            $table->text('partieC')->nullable();
            $table->text('disponibilite')->nullable();
             $table->integer('positionne')->nullable();
            $table->text('localisation');
             $table->string('video')->nullable();
            $table->string('type');
            $table->text('parking');
            $table->integer('pourcentage')->nullable();
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
        Schema::dropIfExists('projets');
    }
}
