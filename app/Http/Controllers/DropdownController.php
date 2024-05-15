<?php

namespace App\Http\Controllers;

use App\Models\LocalGovt;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function fetchLocal(Request $request)
    {
        $data['local_govts'] = LocalGovt::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
