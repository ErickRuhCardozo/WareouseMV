<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use \App\Models\Unity;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use \App\Policies\UnityPolicy;
use App\Policies\UserPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductCategoryPolicy;
use App\Policies\OrderPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Unity::class => UnityPolicy::class,
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        ProductCategory::class => ProductCategoryPolicy::class,
        Order::class => OrderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
