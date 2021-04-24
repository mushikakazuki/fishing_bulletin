<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinBoardContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_board_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');  // FK userのid
            $table->unsignedBigInteger('parentid'); //FK bulletin_boardsのID
            $table->unsignedBigInteger('responseid'); // FK bulletin_board_ontentsのID
            $table->string('content',200);
            $table->boolean('isDeleted');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('responseid')->references('id')->on('bulletin_board_contents');
            $table->foreign('parentid')->references('id')->on('bulletin_boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletin_board_contents');
    }
}
