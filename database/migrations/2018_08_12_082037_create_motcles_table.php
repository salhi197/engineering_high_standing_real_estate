<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motcles', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            
            $table->timestamps();
        });
        
        Schema::create('motcle_projet', function (Blueprint $table) {
            $table->integer('motcle_id');
               $table->integer('projet_id');
              $table->primary(['motcle_id','projet_id']);
            
        });
        
         Schema::create('article_motcle', function (Blueprint $table) {
            $table->integer('motcle_id');
               $table->integer('article_id');
              $table->primary(['motcle_id','article_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motcles');
        Schema::dropIfExists('motcle_projet');
          Schema::dropIfExists('article_motcle');
    }
}
