<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        //
    ];

    
    public function boot(): void
    {
        Gate::define('product_create', function (User $user) {

            if($user->isEditor() || $user->isUser() || $user->isAdmin()){
                return true;
            }
        });

        Gate::define('product_edit', function (User $user) {

            if($user->isEditor()){
                return true;
            }
        });

        Gate::define('product_delete', function (User $user) {

            if($user->isEditor()){
                return true;
            }
        });

        
    }
}
