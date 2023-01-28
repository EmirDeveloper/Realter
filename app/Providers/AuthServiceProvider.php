<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('property_types', [UserPolicy::class, 'property_types']);
        Gate::define('properties', [UserPolicy::class, 'properties']);
        Gate::define('customers', [UserPolicy::class, 'customers']);
        Gate::define('attributes', [UserPolicy::class, 'attributes']);
        Gate::define('verifications', [UserPolicy::class, 'verifications']);
        Gate::define('locations', [UserPolicy::class, 'locations']);
        Gate::define('users', [UserPolicy::class, 'users']);
        Gate::define('options', [UserPolicy::class, 'options']);
    }
}
