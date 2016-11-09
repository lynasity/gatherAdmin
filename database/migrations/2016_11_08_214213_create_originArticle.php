<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('originArticle', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('gzh_id')->unsigned();
             $table->unsignedTinyInteger('has_done');
             $table->text('title');
             $table->text('digest');
             $table->longText('content');
             $table->string('url');
             $table->string('date');
             $table->index('gzh_id');
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
        Schema::dropIfExists('originArticle');
    }
}
