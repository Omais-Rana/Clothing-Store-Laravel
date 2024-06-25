<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FormFields\TagsFormField;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CartComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        Voyager::addFormField(TagsFormField::class);
        View::composer('*', CartComposer::class);
    }
}
