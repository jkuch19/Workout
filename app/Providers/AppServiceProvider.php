<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Day;
use App\Models\MuscleGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$days = Day::all();
		$muscleGroups = MuscleGroup::all();

		View::share('days', $days);
		View::share('muscleGroups', $muscleGroups);
    }
}
