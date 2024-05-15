@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Appraise Request</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-end" href="{{ route('type.create') }}">
                        Add New Type
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3 mt-5">

        @include('flash::message')

        @if ($errors->any())
            <div class="example-alert">
                <div class="alert alert-danger alert-icon alert-dismissible">
                    <em class="icon ni ni-alert-circle"></em>
                    <strong>Error:</strong>
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <button class="close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <div class="clearfix"></div>

        <div class="card mb-5">
            <div class="card-body p-5">
                <h5>Request:: {{ $request->type->name }}</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">Staff</th>
                            <th>Request</th>
                            <th>Current Step</th>
                            <th>Status</th>
                            <th>Next Step</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-2">{{-- {{ $request->staff->user->first_name }}
                                {{ $request->staff->user->last_name }} --}}
                                {{
                                    !empty($request->staff->user) ?
                                    $request->staff->user->first_name.' '.$request->staff->user->last_name :
                                    optional(Modules\EmployerManager\Models\Employer::find($request->staff_id))->contact_firstname.' '.
                                    optional(Modules\EmployerManager\Models\Employer::find($request->staff_id))->contact_surname ??
                                    'Unknown Contact'
                                    
                                }}
                            </td>
                            <td>{{ $request->type->name }}</td>
                            <td>{{ $request->order }} of {{ $request->type->flows->count() }}</td>
                            <td>{{ Modules\Approval\Models\Action::find($request->action_id)->status }}</td>
                            <td>
                                {{-- {{$request->type->flows()->where('status', 1)->max('approval_order')}} --}}
                                @if ($request->next_step)
                                    Step:: {{ $request->next_step }} -
                                @endif

                                @php
                                    if (
                                        $request->order ==
                                        $request->type
                                            ->flows()
                                            ->where('status', 1)
                                            ->max('approval_order')
                                    ) {
                                        if ($request->status == 5) {
                                            echo 'Declined';
                                        } elseif ($request->status == 1) {
                                            echo 'Approved';
                                        } else {
                                            echo 'Pending';
                                        }
                                    } else {
                                        echo 'Pending';
                                    }
                                @endphp
                            </td>
                            <td>
                                @if($request->requestable::class == 'Modules\DTARequests\Models\DTARequests')
                                    <a href="/dtarequests/dtarequests/{{$request->requestable->id}}" target="_blank" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @elseif($request->requestable::class == 'Modules\HumanResource\Models\LeaveRequest')
                                    <a href="/leave_request/leave_request/{{$request->requestable->id}}" target="_blank" class="btn">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{-- {{ $types->links() }} --}}</div>
        </div>



        <div class="card mb-5">
            <div class="card-body p-5">
                <h2>Request Timeline</h2>
                <h6>Completed Steps:: {{ $request->order }} of {{ $request->type->flows->count() }}</h6>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">Step</th>
                            <th>Staff</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request->timelines as $timeline)
                            <tr>
                                <td class="px-2">Step {{ $timeline->flow->approval_order }}</td>
                                <td>
                                    {{ $timeline->staff->user->first_name }} {{ $timeline->staff->user->last_name }}
                                    <br />
                                    <small>
                                        {{ $timeline->staff->user->roles->pluck('name') }}
                                    </small> </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $timeline->action->name == 'Approve' ? 'success' : ($timeline->action->name == 'Decline' ? 'danger' : ($timeline->action->name == 'Return' ? 'warning' : ($timeline->action->name == 'Modify' ? 'info' : 'primary'))) }}  text-white fs-6">{{ $timeline->action->status }}</span>
                                </td>
                                <td>{{ date('F jS, Y', strtotime($timeline->created_at)) }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal{{ $timeline->id }}">
                                        <i class="fa fa-comment"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $timeline->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Comments</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="fs-5">
                                                        {{ $timeline->comments }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        @php
            $user_can_appraise = false;

            $user_roles = auth()->user()->roles->pluck('id');

            $select = "select GROUP_CONCAT(flow_role.role_id) as `receivers`
                from `flow_role` where `flow_role`.`flow_id` = ".$request->type->flows()->where('approval_order', $request->next_step)->first()->id."
                group by `flow_id`";

            $query = Illuminate\Support\Facades\DB::select($select);

            foreach($user_roles as $role){
                if( in_array($role, explode(',', $query[0]->receivers)) ){
                    $user_can_appraise = true;
                    break;
                }
            }
        @endphp

        {{-- @if($request->status != 1 && $user_can_appraise) --}}
        @if($user_can_appraise)
        {{$request->type->flow}}
        <div class="card mb-5">
            <form action="{{ route('appraisal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $request->id }}">

                @php
                    $next_step = $request->type
                        ->flows()
                        ->where('approval_order', '>', $request->order)
                        ->where('status', 1)
                        ->orderBy('approval_order', 'ASC')
                        ->first();
                @endphp
                <input type="hidden" name="order" id="order" value="{{ isset($next_step) ? $next_step->approval_order : '1' }}">

                <div class="card-body p-5">
                    <h4>Current Step::{{ $request->next_step }} - Your appraisal on this request</h4>
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea name="comments" id="comments" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="docs">Updload Additional Documents</label>
                                <input type="file" name="docs" id="docs" class="form-control" accept=".pdf">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            @php
                                $actions = $request->type
                                    ->flows()
                                    ->where('approval_order', $request->next_step)
                                    ->first()->actions;
                            @endphp
                            <input type="hidden" name="actions" id="actions"
                                value="{{ implode(',', $actions->pluck('id')->toArray()) }}">
                            @foreach ($actions as $key => $action)
                                <button name="action_id" value="{{ $action->id }}"
                                    class="btn btn-{{ $action->name == 'Approve' ? 'success' : ($action->name == 'Decline' ? 'danger' : ($action->name == 'Return' ? 'warning' : ($action->name == 'Modify' ? 'info' : 'primary'))) }}">
                                    <i
                                        class="fa fa-{{ $action->name == 'Approve' ? 'check' : ($action->name == 'Decline' ? 'close' : ($action->name == 'Return' ? 'refresh' : ($action->name == 'Modify' ? 'edit' : 'send'))) }}"></i>
                                    <span>{{ $action->name }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endif

    </div>
@endsection
