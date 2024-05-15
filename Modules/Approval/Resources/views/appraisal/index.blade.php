@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Appraisal</h1>
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

        <div class="clearfix"></div>

        <div class="card mb-5">
            <div class="card-body p-5">
                <h5>Pending Approval Appraisal List</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">#</th>
                            <th>Staff</th>
                            <th>Request</th>
                            <th>Steps</th>
                            <th>Status</th>
                            <th>Pending Appraisers</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            @php
                                $request = Modules\Approval\Models\Request::find($request->id);
                            @endphp
                            <tr>
                                <td class="px-2">{{ $loop->index + 1 }}</td>
                                <td>{{
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
                                    @foreach ($request->type->flows()->where('approval_order', $request->next_step)->first()->roles as $key => $role)
                                        <span class="badge bg-secondary">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('appraisal.show', $request->id) }}"><i
                                            class="fa fa-check"></i></a>
                                            {{-- @if($request->requestable::class == 'App\Models\DeathClaim')
                                            <a class="btn btn-info" href="{{ route('death.claims.show', $request->requestable_id) }}"><i
                                                class="fa fa-eye"></i></a>
                                                @endif
                                                @if($request->requestable::class == 'App\Models\AccidentClaim')
                                            <a class="btn btn-info" href="{{ route('accident.claims.show', $request->requestable_id) }}"><i
                                                class="fa fa-eye"></i></a>
                                                @endif
                                                @if($request->requestable::class == 'App\Models\DiseaseClaim')
                                            <a class="btn btn-info" href="{{ route('disease.claims.show', $request->requestable_id) }}"><i
                                                class="fa fa-eye"></i></a>
                                                @endif --}}
                                                @if($request->requestable::class == 'Modules\DTARequests\Models\DTARequests')
                                                <a href="/dtarequests/dtarequests/{{$request->requestable->id}}" target="_blank" class="btn">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @elseif($request->requestable::class == 'Modules\HumanResource\Models\LeaveRequest')
                                                <a href="/leave_request/leave_request/{{$request->requestable->id}}" target="_blank" class="btn">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                            {{-- @if($request->requestable::class == 'Modules\FormBuilder\Models\FormResponse')
                                                </a>
                                            <a class="btn btn-info" href="#" data-url="{{ route('response.detail',$request->requestable_id) }}" data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title="{{__('View')}}" data-title="{{__('Response Detail')}}"><i
                                                class="fa fa-eye"></i></a>
                                                @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{-- {{ $requests->links() }} --}}</div>
        </div>
    </div>
@endsection
