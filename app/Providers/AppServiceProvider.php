<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
             'App\Models\Contracts\Repositories\SummaryRepository', // Repository (Interface)
             'App\Models\Concrete\Eloquent\EloquentSummaryRepository' // Eloquent (Class)
        );
        
        $this->app->bind(
             'App\Models\Contracts\Repositories\ExpenseRepository', // Repository (Interface)
             'App\Models\Concrete\Eloquent\EloquentExpenseRepository' // Eloquent (Class)
        );
        
        $this->app->bind(
             'App\Models\Contracts\Repositories\IncomeRepository', // Repository (Interface)
             'App\Models\Concrete\Eloquent\EloquentIncomeRepository' // Eloquent (Class)
        );
        
        $this->app->bind(
             'App\Models\Contracts\Repositories\UserRepository', // Repository (Interface)
             'App\Models\Concrete\Eloquent\EloquentUserRepository' // Eloquent (Class)
        );
        
        //
    }
}
