<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceApplication;
use Database\Seeders\ServicesSeeder;
use Database\Seeders\OtherUsersTable;
use Database\Seeders\NewStaffTableSeeder;
use Database\Seeders\NewUsersTableSeeder;
use Modules\Shared\Database\Seeders\SharedDatabaseSeeder;
use Modules\Approval\Database\Seeders\ApprovalDatabaseSeeder;
use Modules\HumanResource\Database\Seeders\HumanResourceDatabaseSeeder;
use Modules\WorkflowEngine\Database\Seeders\WorkflowEngineDatabaseSeeder;
use Modules\DocumentManager\Database\Seeders\DocumentManagerDatabaseSeeder;
use Modules\EmployerManager\Database\Seeders\EmployerManagerDatabaseSeeder;
use Modules\ClaimsCompensation\Database\Seeders\ClaimsCompensationDatabaseSeeder;
use Database\Seeders\LevelsTableSeeder;
use Database\Seeders\MassUploadSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesAndPermissionsTablesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LocalGovernmentsTableSeeder::class);
        $this->call(RealRolesTablesSeeder::class);
        $this->call(SharedDatabaseSeeder::class);
        $this->call(DepartmentsAndBranchesTablesSeeder::class);
        $this->call(DTAPermissionsTableSeeder::class);
        // $this->call(RealUsersAndStaffTablesSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(NewUsersTableSeeder::class);
        $this->call(NewStaffTableSeeder::class);
        //$this->call(EmployersTableSeeder::class);

        $this->call(NewRolesAndPermissionsTablesSeeder::class);

        // Modules
        $this->call(WorkflowEngineDatabaseSeeder::class);
        $this->call(DocumentManagerDatabaseSeeder::class);
        $this->call(EmployerManagerDatabaseSeeder::class);
        $this->call(HumanResourceDatabaseSeeder::class);
        $this->call(ApprovalDatabaseSeeder::class);
        $this->call(ClaimsCompensationDatabaseSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(TaskStageTableSeeder::class);

        $this->call(AddNewPermissionsSeeder::class);
        $this->call(ProcurementPermissionsSeeder::class);
        $this->call(ReportPermissionsSeeder::class);
        $this->call(ApprovalEnginePermissionsSeeder::class);
        $this->call(ServiceApplicationPermissionsSeeder::class);
        $this->call(SupportSystemPermissionsSeeder::class);
        $this->call(AssetManagerPermissionsSeeder::class);
        $this->call(OtherUsersTable::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(MassUploadSeeder::class);

    }
}
