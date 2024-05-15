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

class SettingsDataSeeder extends Seeder
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

        $path = 'database/db/setup.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Settings data table seeded!');

        //Eloquent::reguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Eloquent::reguard();
    }
}
