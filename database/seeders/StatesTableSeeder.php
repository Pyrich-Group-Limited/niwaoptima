<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('states')->truncate();
        $states = array(

            array('name' => "Abia", 'status' => 1),
            array('name' => "Adamawa", 'status' => 1),
            array('name' => "Akwa-Ibom", 'status' => 1),
            array('name' => "Anambra", 'status' => 1),
            array('name' => "Bauchi", 'status' => 1),
            array('name' => "Bayelsa", 'status' => 1),
            array('name' => "Benue", 'status' => 1),
            array('name' => "Borno", 'status' => 1),
            array('name' => "Cross River", 'status' => 1),
            array('name' => "Delta", 'status' => 1),
            array('name' => "Ebonyi", 'status' => 1),
            array('name' => "Edo", 'status' => 1),
            array('name' => "Ekiti", 'status' => 1),
            array('name' => "Enugu", 'status' => 1),
            array('name' => "FCT", 'status' => 1),
            array('name' => "Gombe", 'status' => 1),
            array('name' => "Imo", 'status' => 1),
            array('name' => "Jigawa", 'status' => 1),
            array('name' => "Kaduna", 'status' => 1),
            array('name' => "Kano", 'status' => 1),
            array('name' => "Katsina", 'status' => 1),
            array('name' => "Kebbi", 'status' => 1),
            array('name' => "Kogi", 'status' => 1),
            array('name' => "Kwara", 'status' => 1),
            array('name' => "Lagos", 'status' => 1),
            array('name' => "Nasarawa", 'status' => 1),
            array('name' => "Niger", 'status' => 1),
            array('name' => "Ogun", 'status' => 1),
            array('name' => "Ondo", 'status' => 1),
            array('name' => "Osun", 'status' => 1),
            array('name' => "Oyo", 'status' => 1),
            array('name' => "Plateau", 'status' => 1),
            array('name' => "Rivers", 'status' => 1),
            array('name' => "Sokoto", 'status' => 1),
            array('name' => "Taraba", 'status' => 1),
            array('name' => "Yobe", 'status' => 1),
            array('name' => "Zamfara", 'status' => 1),

        );
        DB::table('states')->insert($states);
    }
}
