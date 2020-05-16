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
            $table->id();
            $table->string('title')->default('event1');
            $table->string('type')->default('other');
            $table->binary('image');
            $table->string('location')->default('eljadida');
            $table->text('description');
            $table->date('date')->default('2020/08/01');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name')->default('me');
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
        Schema::dropIfExists('events');
    }
}
