<?php

namespace App\Providers;

use App\Import;
use App\Product;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('import', function (User $user, Import $import) {
            return $user->id == $import->user_id;
        });

        $gate->define('product', function (User $user, Product $product) {
            return $user->id == $product->user_id;
        });

        $gate->define('user', function (User $user, User $u2) {
            return $user->id == $u2->id;
        });
    }
}
