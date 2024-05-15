<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\Session;



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
        // 
        /* Fetch department IDs
        $departmentIds = Department::pluck('id')->toArray();

        // Get session department ID
        $s_deptId = intval(session('department_id'));
        $sessionDepartmentId = $s_deptId;

        $departmentIdsToCheck = [5, 6, 9, 16];

        $departmentIdsToCheck1 = [1, 5, 6, 9, 16];
        $hrIdToCheck = [22];
        
        // Share the data with all views
        View::share([
            'departmentIds' => $departmentIds,
            'sessionDepartmentId' => $sessionDepartmentId,
            'departmentIdsToCheck' => $departmentIdsToCheck,
            'departmentIdsToCheck1' => $departmentIdsToCheck1,
            'hrIdToCheck' => $hrIdToCheck,
        ]); */
    }
}
