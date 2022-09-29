<?php

namespace App\Providers;

use App\Models\Contract;
use App\Observers\ContractObserver;
use App\Models\FinancialAccount;
use App\Observers\FinancialAccountObserver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Contract::observe(ContractObserver::class);
        FinancialAccount::observe(FinancialAccountObserver::class);
    }
}
