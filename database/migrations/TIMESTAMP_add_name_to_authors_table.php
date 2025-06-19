<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migratioins\Migration;

class AddNameToAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->string('name');
        });
    }

    public function down(){
        Schema::dropIfExists('authors');
    }
}
