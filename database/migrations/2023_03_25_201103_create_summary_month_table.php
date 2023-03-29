<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryMonthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_month', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->dateTime('date');
            $table->enum('in_process',['receiving','checking','check-updated']);       
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('summary_month_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('summary_month_id');
            $table->unsignedBigInteger('entity_id');
            $table->string('model');
            $table->double('value')->comment('Standard value');
            $table->double('ammount')->comment('Standard value, when modify');
            $table->enum('in_process',['receiving','checking','check-updated']);       

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('summary_month_id')->references('id')->on('summary_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_month');
        Schema::dropIfExists('summary_month_itens');
    }
}
