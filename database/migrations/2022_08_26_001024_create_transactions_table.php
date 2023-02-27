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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('payment_type_id')->constrained('payment_types');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('repeat')->default('0');
            $table->double('prediction')->nullable();
            $table->double('value');
            $table->dateTime('date', $precision = 0);
            $table->enum('status', ['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
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
