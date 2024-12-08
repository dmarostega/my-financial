<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBalanceColumnToFinancialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financial_accounts', function (Blueprint $table) {
            $table->decimal('balance', 20, 2)->after('account_dv')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financial_accounts', function (Blueprint $table) {
            $table->dropColumn('balance');
        });
    }
}
