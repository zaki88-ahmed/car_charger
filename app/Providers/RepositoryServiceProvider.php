<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\AboutInterface',
            'App\Http\Repositories\AboutRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\MessageInterface',
            'App\Http\Repositories\MessageRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\ContactInterface',
            'App\Http\Repositories\ContactRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\LastNewsInterface',
            'App\Http\Repositories\LastNewsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\OurProjectsInterface',
            'App\Http\Repositories\OurProjectsRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\UserIpInterface',
            'App\Http\Repositories\UserIpRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\RateInterface',
            'App\Http\Repositories\RateRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\AdminInterface',
            'App\Http\Repositories\AdminRepository'
        );







        /*********************************************************/


        $this->app->bind(

            'App\Http\Interfaces\dashboard\AboutInterface',
            'App\Http\Repositories\dashboard\AboutRepository'
        );


        $this->app->bind(

            'App\Http\Interfaces\dashboard\ContactInterface',
            'App\Http\Repositories\dashboard\ContactRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\dashboard\LastNewsInterface',
            'App\Http\Repositories\dashboard\LastNewsRepository'
        );



        $this->app->bind(
            'App\Http\Interfaces\dashboard\OurProjectInterface',
            'App\Http\Repositories\dashboard\OurProjectRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\dashboard\RateInterface',
            'App\Http\Repositories\dashboard\RateRepository'
        );


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
