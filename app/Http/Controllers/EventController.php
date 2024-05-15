<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $result = \DB::select(\DB::raw('SELECT COUNT(name) AS num, name FROM documents_categories GROUP BY name'));
        $data = "";
        foreach ($result as $values) {
            $data .= "['" . $values->name . "',  " . $values->num . "],";
            # code...
        }
        $alldata = $data;

        if ($request->ajax()) {
//do later for the user to see only his calendar
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('dms.full-calender',compact('alldata'));
    }










    public function action(Request $request)
    {
        if ($request->ajax()) {

            if ($request->type == 'add') {
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
            }
            if ($request->type=='update'){
                $event= Event::find($request->id)->update([
                    'title'=>$request->title,
                    'start'=>$request->start,
                    'end'=>$request->end,
                ]);
                return response()->json($event);
            }
            if ($request->type=='delete'){
                $event= Event::find($request->id);

                $event->delete();
                return response()->json($event);
            }
        }
    }


}
