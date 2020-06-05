<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Creates Event table in the event-db database
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('title', 100);
            $table->datetime('date and time');
            $table->text('description' );
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
        Schema::dropIfExists('event');
    }
}
