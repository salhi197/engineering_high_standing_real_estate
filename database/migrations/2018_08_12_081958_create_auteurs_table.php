<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteurs', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nom');
            $table->timestamps();
        });
         Schema::create('article_auteur', function (Blueprint $table) {
            $table->integer('auteur_id');
               $table->integer('article_id');
              $table->primary(['auteur_id','article_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auteurs');
        Schema::dropIfExists('article_auteur');
    }
}
