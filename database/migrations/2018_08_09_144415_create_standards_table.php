<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->increments('id');
             $table->text('securite');
            $table->text('confort');
            $table->text('esthetique');
            $table->text('fonctoinnalite');
            $table->timestamps();
        });
    }

    /** $table->text('description');
            $table->text('appartements');
            $table->text('adresse');
            $table->text('localisation');
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standards');
    }
}
