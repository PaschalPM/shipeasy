<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Item;
use App\Models\User;
use App\Models\WarehouseTransaction;
use App\Policies\ItemPolicy;
use App\Policies\UserPolicy;
use App\Policies\WarehouseTransactionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Item::class => ItemPolicy::class,
        WarehouseTransaction::class => WarehouseTransactionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
