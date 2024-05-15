<?php
//namespace App\Traits;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModel;
use DB;
use App;
use Auth;

trait TraitSettings {

	/**
	 * get application settings
	 *
	 * @return object
	 */
	public function getapplications() {
		$data = DB::table('settings')->where('id', '1')->first();
		return $data;
	}

}