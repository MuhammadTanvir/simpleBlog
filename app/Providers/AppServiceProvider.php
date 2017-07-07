<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected $policies =[
        'App\Model'=> 'App\Policies\ModelPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        $gate->define('admin-access', function($user){
            foreach ($user->roles as $role) {
               if($role->code == 'admin'){
                return true;
                }
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
