<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use DB;

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
        \View::composer('*', function($view)
        {
            $user_id = \Auth::id();
            $NoteDate = DB::SELECT("SELECT * FROM `leads` where f_date > (NOW() - interval 3 day) OR f_date > (NOW() + interval 3 day) OR f_date = (NOW()) AND alloted_to = @$user_id");
            $view->with('NoteDate', $NoteDate);
        });
    }
}
