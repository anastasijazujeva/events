<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->unsignedBigInteger('organizator_id');
            $table->string('title', 100);
            $table->datetime('date_and_time');
            $table->string('place', 100);
            $table->string('category', 100);
            $table->string('price', 100);
            $table->text('description')->nullable();
            $table->text('image');
            $table->timestamps();

            $table->index('organizator_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
