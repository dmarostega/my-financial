<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('user_name');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('repeat')->default('0');
            $table->double('prediction')->nullable();
            $table->double('value');
            $table->dateTime('date', $precision = 0);
            $table->enum('status', ['active','inactive'])->default('active');
            $table->foreignId('type')->constrained('payment_types');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_name')->references('name')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
