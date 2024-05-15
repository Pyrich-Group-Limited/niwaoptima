<?php

namespace Modules\DocumentManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DocumentManagerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(FoldersPermissionsSeeder::class);
        $this->call(DocumentsPermissionsSeeder::class);
        $this->call(AdminFoldersAndDocumentsPermissionsSeeder::class);
        $this->call(MemosPermissionsSeeder::class);
        $this->call(CorrespondencesPermissionsSeeder::class);
    }
}
