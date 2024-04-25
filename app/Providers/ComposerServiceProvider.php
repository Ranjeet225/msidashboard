<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\Service;
use App\Models\Ideology;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['index', 'about', 'service', 'project', 'ideology', 'clients', 'team','service-details','project-details','ideology-details'], function ($view) {
            $view->with([
                'testimonialData' => Testimonial::get(),
                'submenuproject' => Project::select('title', 'id')->get(),
                'submenuservice' => Service::select('title', 'id')->get(),
                'submenuideology' => Ideology::select('title', 'id')->get(),
            ]);
        });
    }
}
