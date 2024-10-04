<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Events\QueryExecuted;

use Vite;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Http\Kernel;
// use Illuminate\Foundation\Http\Kernel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      Model::shouldBeStrict(!app()->isProduction());

      if (app()->isProduction()){
        // якщо довгий конект, то надіслати в лог
        // DB::whenQueryingForLongerThan(500, function (Connection $connection, QueryExecuted $event) {
        // DB::whenQueryingForLongerThan(CarbonInterval::seconds(5), function (Connection $connection, QueryExecuted $event) {
        //   logger()
        //       ->channel('telegram')
        //       // ->debug('whenQueryingForLongerThan: ' . $connection->query()->toSql());
        //       ->debug('whenQueryingForLongerThan: ' . $connection->totalQueryDuration());
        // }); 

        DB::listen(function ($query){
          // dump($query->time);
          if($query->time > 100){
            logger()
            ->channel('telegram')
            // ->debug('whenQueryingForLongerThan: ' .$query()->sql, $query()->bindings);
            ->debug('query lohger than 1ms: ' .$query()->sql, $query()->bindings);
          }
        });

        app(Kernel::class)->whenRequestLifecycleIsLongerThan(
          CarbonInterval::seconds(4), 
          function(){
            logger()
            ->channel('telegram')
            ->debug('whenRequestLifecycleIsLongerThan: ' . request()->url());

          }
        );
      }


      
        // Carbon::setLocale('uk-UA');

        // Paginator::defaultView('vendor.pagination.bootstrap-5');

        // // виводити на усіх сторінках як зміну в footer.blade.php
        // View::share('const_share_AppServiceProvider', 'розробка Васильєвої С.Ю.');

        // // виводити на розділ, наприклад - user*
        // View::composer('user*', function($view){
        //     $view->with('balance', 123456);
        // });
    }
}
