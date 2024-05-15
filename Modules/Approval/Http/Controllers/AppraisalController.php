<?php

namespace Modules\Approval\Http\Controllers;

use Flash;
use Illuminate\Contracts\Support\Renderable;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Approval\Models\Request as ModelsRequest;

class AppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Check if the user has staff information
if (auth()->user()->staff == null) {
    $requests = [];
} else {
    // Get the user's roles
    $userRoleId = auth()->user()->roles->pluck('id')->first();
    $staffId = auth()->user()->staff->id;

    // Check if the user has roles
    //if (count($userRoles) > 0) {
        // Build the query using the Laravel Query Builder
        $sqlQuery = "
    SELECT requests.id
    FROM requests
    JOIN flows ON requests.type_id = flows.type_id AND requests.next_step = flows.approval_order
    WHERE flows.id IN (
        SELECT flow_id
        FROM flow_role
        WHERE role_id = $userRoleId
        GROUP BY flow_id
    )
    AND requests.deleted_at IS NULL
    AND requests.status = 0
    AND (
        requests.order = requests.next_step
        OR (
            requests.staff_id = $staffId
            AND requests.order <> requests.next_step
        )
    );
";

// Execute the raw SQL query
$requests = DB::select($sqlQuery);
    //} else {
        // User has no roles
    //    $requests = [];
   // }
}

// Pass the data to the view
return view('approval::appraisal.index', compact('requests'));

        
    }

    public function index_old()
    {
        if (auth()->user()->staff == null) {
            $requests = [];
        } else {
            //dd(ModelsRequest::with(['nextStep'])->latest()->get());
            //get all request pending user role appraisal
            //get pending request with next steps
            //where logged in user's role in the next step roles
            /* $requests = ModelsRequest::with([
            'timelines' => function ($query) {
                //$query->max('id');
                $query->latest();
            },
            'type.flows' => function (Builder $query) {
                //dd($query);
                $query
                    //->where('approval_order', '>', 'order')
                    ->where('status', 1)
                    ->orderBy('approval_order', 'asc')
                    //->first()
                    ;
            }
            ])->orderBy('id', 'desc')->get(); */

                /* $requests = ModelsRequest::whereHas('type.flows', function (Builder $query) {
                //request with next steps
                $query->where('flows.approval_order', '>', 1)
                    ->where('flows.status', 1)
                    //->orderBy('approval_order', 'asc')
                    //->first()
                    ;
            })->with([
                //'type.flows'
            ])
            ->orderBy('id', 'desc')->get(); */

            //get logged in user roles
            $user_roles = auth()->user()->roles->pluck('id');

            $ur = " ";
            foreach ($user_roles as $r => $role) {
                if ($r != 0) {
                    $ur .= " OR ";
                }
                $ur .= $role . " IN
                (select GROUP_CONCAT(flow_role.role_id) as `receivers`
                from `flow_role` where `flow_role`.`flow_id` = flows.id
                group by `flow_id`)";
            }

            if (count($user_roles) > 0) {
                $query = "select `requests`.`id` from `requests`
            inner join `flows` on `requests`.`type_id` = `flows`.`type_id`
            and `requests`.`next_step` = `flows`.`approval_order`
            WHERE (" . $ur . ")
            and `requests`.`deleted_at` is null
            AND requests.status=0
            AND (CASE WHEN requests.order=requests.next_step THEN requests.staff_id=" . auth()->user()->staff->id . " ELSE requests.order<>requests.next_step END)
            ;";
                //AND requests.order<>requests.next_step//working
                //AND (CASE WHEN requests.staff_id=".auth()->user()->staff->id." THEN requests.order > 0 ELSE requests.order > 1 END)

                $requests = DB::select($query);
            } else {
                $requests = [];
            }
        }

        //dd($requests);
        return view('approval::appraisal.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('approval::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:requests,id',
            'actions' => 'required',
            'order' => 'required',
            'action_id' => 'required|in:' . $request->actions,
            'comments' => '',
            'docs' => 'file|mimes:pdf',
        ]);

        //comments to be used in timeline
        session(['comments' => $request->comments]);

        $mr = ModelsRequest::find($request->id);

        if ($request->action_id < 4) { //created|modified|approved
            $mr->order = $request->order;
            $mr->next_step = $request->order;
        } elseif ($request->action_id == 4) { //returned
            //take to previous order
            $prev_step = $mr->type->flows()
                ->where('approval_order', '<', $mr->order)
                ->where('status', 1)
                ->orderBy('approval_order', 'DESC')
                ->first();

            $new_order = $prev_step ? $prev_step->approval_order : $mr->order;

            $next_step = $mr->type->flows()
                ->where('approval_order', '>', $new_order)
                ->where('status', 1)
                ->orderBy('approval_order', 'ASC')
                ->first();

            $mr->order = $new_order;
            //$mr->next_step = $prev_step ? $next_step->approval_order : $mr->order;
            $mr->next_step = $mr->order;
        } else { //declined
            
        }
        $mr->action_id = $request->action_id;
            $mr->next_step = $request->order;
            //$mr->status = ($request->order === 1) ? 1 : 0;
        
        $mr->save();
        ModelsRequest::where('id', $request->id)->update([
            'next_step' => $request->order,
            // Add other columns and their values as needed
        ]);
        $final = $mr->type->flows->count();
        $final2 = $mr->timelines()->count();
        if($final2 > $final){
            ModelsRequest::where('id', $request->id)->update([
                'status' => 1,
                // Add other columns and their values as needed
            ]);
        }

        Flash::success('Request appraised successfully.');

        return redirect(route('appraisal.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(ModelsRequest $appraisal)
    {
        $request = $appraisal;
        return view('approval::appraisal.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('approval::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
