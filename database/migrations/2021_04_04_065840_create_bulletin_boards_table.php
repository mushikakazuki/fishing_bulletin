<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');  // FK userのid
            $table->unsignedBigInteger('tag_id'); // FK tagテーブルのid
            $table->string('title',50);
            $table->boolean('isClosed');
            $table->boolean('isDeleted');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletin_boards');
    }
}
