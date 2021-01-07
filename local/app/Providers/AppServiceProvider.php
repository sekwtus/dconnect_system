<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use DB;
use Debugbar;
use Auth;

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

      Debugbar::disable();

      // Schema::defaultStringLength(191); 
      view()->composer('*', function ($view) {
        if (Auth::check()) {
          //query ข้อมูลทั่วไปของผู้ใช้ระบบ (navbar, sidebar)
          $view_data_user = DB::table('users')->where(['users.id'=>Auth::user()->id])
            ->leftjoin('SIM_department', 'SIM_department.department_id', '=', 'users.department_id')
            ->select(
              'users.username', 
              'users.name', 
              'users.email',
              'users.phone',
              'users.address',
              'users.pic_profile',
              'users.department_id',
              'users.id_type_user',
              'users.id_type_branch',
              'users.real_pass',
                
              'SIM_department.department_name'
            )
          ->first();

          // dd ( $count_fail );

          $view->with([
            'view_data_user'=>$view_data_user, 
          ]);
          //'office_type_view'=>$office_type_view,'indicator_year_view'=>$indicator_year_view,'admins_'=>$admins_,'users_'=>$users_,
        }
      });
    }
}
