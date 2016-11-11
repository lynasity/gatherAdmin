<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpiderArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spider_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gzh_id')->unsigned();
            $table->string('title')->unique();
            $table->string('gzh_name');
             $table->unsignedTinyInteger('has_done')->default(0);
            $table->string('time');
            $table->text('contentUrl');
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
        Schema::dropIfExists('spider_article');
    }
}
