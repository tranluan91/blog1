<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagsPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagsPost', function (Blueprint $table) {
<<<<<<< HEAD
           $table->integer('post_id');
           $table->integer('tag_id');
=======
           $table->unsignedBigInteger('post_id');
           $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
           $table->unsignedBigInteger('tag_id');
           $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
>>>>>>> 3234edd565cf2eb550fa789b13aa15a036b8cedb
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    {
        Schema::dropIfExists('tagsPost');
    }
    }
}
