<?php

namespace Modules\Approval\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Modules\Approval\Models\Action;
use Modules\Approval\Models\Flow;
use Modules\Approval\Models\Type;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $flows = Flow::select('approval_type_id', 'approval_scopeable_type', 'approval_scopeable_id', DB::raw('COUNT(*) AS approval_steps'))
            ->groupBy(['approval_type_id', 'approval_scopeable_type', 'approval_scopeable_id'])
            ->paginate(5);

        foreach ($flows as $fg) {
            $flow = Flow::where([
                'approval_type_id' => $fg->approval_type_id,
                'approval_scopeable_type' => $fg->approval_scopeable_type,
                'approval_scopeable_id' => $fg->approval_scopeable_id,
                ])->first();
            $fg->approval_steps = $fg->approval_steps;
            $fg->approval_type = $flow->type->name;
            $fg->status = $flow->status;
            $fg->id = $flow->id;
        }
        //dd($flows);
        //dd($flows->count());
        return view('approval::flow.index', compact('flows'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Type $type)
    {
        //$types = Type::get();
        $regions = [];
        $branches = Branch::get();
        $departments = Department::get();
        $roles = Role::get(); //json_encode($roles);
        $actions = Action::get();

        return view('approval::flow.create', compact(['type', 'regions', 'branches', 'departments', 'roles', 'actions']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, Type $type)
    {
        //validate all required incoming fields
        $validated = $request->validate([
            //'approval_type_id' => 'required|exists:types,id',
            /* 'duration_metric' => 'required|string',
            'duration_period' => 'required|numeric', */

            //TODO: REMOVE SCOPE/DURATION AND TAKE TO APPROVAL TYPES:
            //TODO: Approval types should have a scope and duration
            /* 'scope' => 'required|string',
            'region' => 'required_if:scope,Region', //|exists:regions,id',
            'branch' => 'required_if:scope,Branch|exists:branches,id',
            'department' => 'required_if:scope,Department|exists:departments,id', */

            /* 'scopeable_type' => 'required|array', //region|branch|department model
            'scopeable_id' => 'required|array', */ //region|branch|department id

            'approval_order' => 'required|array',
            'approval_scopeable_type' => 'required|array',
            'approval_scopeable_id' => 'required|array',
            'approval_roles.*' => 'required|array',
            'approval_actions.*' => 'required|array',
        ]);
        //dd($request->all());
        //loop through all steps
        foreach ($request->approval_order as $k => $v) {
            $roles = [];
            $actions = [];
            //populate flow
            $flowData = [
                //'approval_type_id' => $request->approval_type_id,
                'approval_order' => $request->approval_order[$k],
                'approval_scopeable_type' => $request->approval_scopeable_type[$k] == 'Parent' ? null : 'Modules\\Shared\\Models\\' . $request->approval_scopeable_type[$k],//$request->scope,
                'approval_scopeable_id' => $request->approval_scopeable_type[$k] == 'Parent' ? null : $request->approval_scopeable_id[$k],//$request->scope == 'Region' ? $request->region : ($request->scope == 'Branch' ? $request->branch : $request->department),
                // 'duration_metric' => $request->duration_metric,
                // 'duration_period' => $request->duration_period,
            ];
            //$flow = Flow::create($flowData);
            $flow = $type->flows()->create($flowData);

            //populate roles
            $flow->roles()->sync(array_values($request->approval_roles[$k]));
            /* dump($request->approval_roles[$k]);
            foreach ($request->approval_roles[$k] as $r => $role) {
                $roles = [
                    $role => [
                        'scopeable_type' => $request->approval_scopeable_type[$k] == 'Parent' ? null : 'Modules\\Approval\\Models\\' . $request->approval_scopeable_type[$k],
                        'scopeable_id' => $request->approval_scopeable_type[$k] == 'Parent' ? null : $request->approval_scopeable_id[$k],
                    ]
                ];
            }
            dd($roles);
            $flow->roles()->sync($roles); */

            //populate actions
            $flow->actions()->sync(array_values($request->approval_actions[$k]));
        }

        Flash::success('Approval flow created successfully!');

        return redirect(route('type.show', $type->id));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('approval::flow.show', compact('flow'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('approval::flow.edit');
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
