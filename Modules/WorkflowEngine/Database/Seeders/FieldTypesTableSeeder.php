<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_types')->delete();

        $fieldTypes = [
            ['field_type' => 'button', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'checkbox', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'color', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'date', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'datetime-local', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'email', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'file', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'hidden', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'image', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'month', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'number', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'password', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'radio', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'range', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'reset', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'search', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'select', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'submit', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'tel', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'time', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'url', 'created_at' => now(), 'updated_at' => now()],
            ['field_type' => 'week', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('field_types')->insert($fieldTypes);
    }
}
