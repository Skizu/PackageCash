<?php namespace App\Providers;

use App\Envelope;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('envelopes.template', function ($view) {
            $view->with('colours', Envelope::$colours);
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }
}