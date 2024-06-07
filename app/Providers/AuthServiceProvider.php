<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Contato;
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
        Gate::define('ver-contato', function(User $user, Contato $contato){
           return $user->id === $contato->user_id; 
        });
    }
}
