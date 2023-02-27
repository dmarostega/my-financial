<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBiginteger('contract_id')->nullable();
            $table->string('title',255);
            $table->double('value');
            $table->enum('type',['to_pay','to_receive']);
            $table->enum('frequency',['daily', 'monthly', 'yearly'])->default('monthly');
            $table->enum('status', [ 'active','inactive'])->default('active');            
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('contract_id')->references('id')->on('contracts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
