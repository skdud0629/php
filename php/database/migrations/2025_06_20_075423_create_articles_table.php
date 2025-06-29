<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run(){
        $users= App\User::all();
        foreach ($users as $user) {
            $user->articles()->create([
                'title' => 'Sample Article Title',
                'content' => 'This is a sample article content.',
            ]);
        }
    }


    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increaments('id');
            $table->integer('user_id') ->unsigned()->index();
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
