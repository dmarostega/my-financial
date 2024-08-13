<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('entity_id');
            $table->dateTime('date');
            $table->string('model');
            $table->timestamps();
        });

        Schema::create('log_updates_fields', function(Blueprint $table){
            $table->id();
            $table->foreignId('log_updates_id')->constrained();
            $table->string('attribute');
            $table->text('value');
            $table->text('original')->comment('Old value before update');
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
        Schema::dropIfExists('log_updates');
        Schema::dropIfExists('log_updates_fields');
    }
}
