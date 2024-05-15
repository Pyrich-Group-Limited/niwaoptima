<?php

namespace Modules\Approval\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laracasts\Flash\Flash;
use Modules\Approval\Models\Type;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $types = Type::paginate(5);
        return view('approval::type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $regions = [];
        $branches = Branch::get();
        $departments = Department::get();
        return view('approval::type.create', compact(['regions', 'branches', 'departments']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:types,name',
            'cycle' => 'required|string',

            'metric' => 'required|string',
            'duration' => 'required|numeric',

            'scope' => 'required|string',
            'region' => 'required_if:scope,Region|nullable', //|exists:regions,id',
            'branch' => 'required_if:scope,Branch|nullable', //|exists:branches,id',
            'department' => 'required_if:scope,Department|nullable', //|exists:departments,id',
        ]);

        $validated['scopeable_type'] = $request->scope == 'All' ? null : 'Modules\\Shared\\Models\\' . $request->scope;
        $validated['scopeable_id'] = $request->scope == 'All' ? null : ($request->scope == 'Region' ? $request->region : ($request->scope == 'Branch' ? $request->branch : $request->department));
        unset($validated['scope']);
        unset($validated['region']);
        unset($validated['branch']);
        unset($validated['department']);

        Type::create($validated);

        Flash::success('Approval type created successfully!');

        return redirect(route('type.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Type $type)
    {
        return view('approval::type.show', compact('type'));
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
