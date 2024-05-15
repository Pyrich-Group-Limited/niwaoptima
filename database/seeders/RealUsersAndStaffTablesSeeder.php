<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use Illuminate\Database\Eloquent\Model as Eloquent;

class RealUsersAndStaffTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles and assign created permissions
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $path = 'database/db/staff.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Staff table seeded!');

        //Eloquent::reguard();


        DB::table('branches')->truncate();
        DB::table('departments')->truncate();
        DB::table('staff')->truncate();
        //DB::table('users')->truncate();

        $all_branches = DB::select('select * from all_branch');

        foreach ($all_branches as $all_branch) {
            $branches = [
                'branch_name' => $all_branch->branch_name,
                'branch_region' => $all_branch->branch_region,
                'branch_code' => $all_branch->branch_code,
                'last_ecsnumber' => $all_branch->last_ecsnumber,
                'highest_rank' => 1,
                'staff_strength' => $all_branch->staff_strength,
                'managing_id' => 1,
                'branch_email' => $all_branch->branch_email,
                'branch_phone' => $all_branch->branch_phone,
                'branch_address' => $all_branch->branch_address,
                'created_at' => now(),
                'updated_at' => now()
            ];

            DB::table('branches')->insert($branches);
        }

        $all_departments = DB::select('select * from all_departments');

        foreach ($all_departments as $all_department) {
            $departments = [
                'department_unit' => $all_department->dep_unit,
                'status' => $all_department->status,
                //'description'=>$all_department->branch_code,
                //'branch_id'=>$all_department->last_ecsnumber,
                'created_at' => $all_department->createdAt,
                'updated_at' => $all_department->updatedAt
            ];

            DB::table('departments')->insert($departments);
        }

        $staffs = DB::select('select * from staff_tb');

        foreach ($staffs as $staff) {
            $users = [
                'email' => $staff->staff_email,
                'first_name' => $staff->firstname,
                'middle_name' => $staff->middlename,
                'last_name' => $staff->lastname,
                'password' => $staff->security_key,
                'created_at' => $staff->createdAt,
                'updated_at' => $staff->createdAt,
            ];

            $user = User::create($users);

            DB::table('staff')->insert([
                [
                    'user_id' => $user->id, 'department_id' => $staff->departmentId, 'branch_id' => $staff->branchId, 'dash_type' => $staff->dash_type,
                    'gender' => $staff->gender, 'staff_id' => $staff->staff_id, 'region' => $staff->region, 'phone' => $staff->phone,
                    'profile_picture' => $staff->PROFILE_PICTURE, 'status' => $staff->STATUS, 'alternative_email' => $staff->alternative_email, 'created_by' => $staff->CREATED_BY,
                    'date_approved' => $staff->DATE_APPROVED, 'approved_by' => $staff->APPROVED_BY, 'security_key' => $staff->security_key, 'date_modified' => $staff->DATE_MODIFIED,
                    'modified_by' => $staff->MODIFIED_BY, 'office_position' => $staff->OFFICE_POSITION, 'position' => $staff->POSITION, 'about_me' => $staff->ABOUT_ME,
                    'total_received_email' => $staff->TOTAL_RECIEVED_EMAILS, 'total_sent_email' => $staff->TOTAL_SENT_EMAIL, 'total_draft_email' => $staff->TOTAL_DRAFT_EMAIL, 'total_event' => $staff->TOTAL_EVENT,
                    'my_groups' => $staff->MYGROUPS, 'created_at' => $staff->createdAt, 'updated_at' => $staff->createdAt
                ]
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Eloquent::reguard();
    }
}
