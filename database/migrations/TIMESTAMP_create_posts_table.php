<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migratioins\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('author_id')->nullable();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
        });
    }

    public function down(){
        Schema::dropIfExists('posts');
    }
}
