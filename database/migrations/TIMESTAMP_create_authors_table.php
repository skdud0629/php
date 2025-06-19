<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migratioins\Migration;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->timestamps();
        }
        );
    }

    public function down(){
        Schema::dropIfExists('authors');
    }
}
