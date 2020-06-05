<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Creates Comment table in the event-db database
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->foreignId('user_id')->constrained();
            $table->string('title', 100);
            $table->text('text')->nullable();
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
        Schema::dropIfExists('comment');
    }
}
