<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 管理者ユーザー
        Gate::define('admin', function (User $user) {
            return ($user->role=== 1);
        });

        // 一般ユーザー
        Gate::define('general', function (User $user) {
            return ($user->role=== 0);
        });
    }
}
