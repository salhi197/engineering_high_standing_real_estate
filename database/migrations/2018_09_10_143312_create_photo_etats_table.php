<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoEtatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_etats', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nom');
            $table->string('type');
             $table->integer('projet_id');
            $table->integer('standard_id')->nullable();
            $table->integer('etat_projet_id')->nullable();
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
        Schema::dropIfExists('photo_etats');
    }
}
