<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $userRepository = \App::make(\Louis\Repositories\UserRepository::class);
        $total = $userRepository->all()->count();

        view()->composer('partials.userCount', function ($view) use ($total) {
            $view->with(['totalUsers' => $total]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
