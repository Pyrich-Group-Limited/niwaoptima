@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Type > {{ $type->name }} </h1>
                </div>
                <div class="col-sm-6">
                    @if ($type->flows->count() < 1)
                        <a class="btn btn-primary float-end" href="{{ route('flow.create', $type->id) }}">
                            Create Approval Steps
                        </a>
                    @else
                        <a class="btn btn-primary float-end" href="{{ route('flow.edit', $type->id) }}">
                            Edit Approval Steps
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card mt-5">
            <div class="card-body p-5">

                <h5>Approval Details</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">Cycle</th>
                            <th>Scope</th>
                            <th>Steps</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-2">{{ $type->cycle }}</td>
                            <td>[{{ $type->scopeable_type != null ? explode('\\', $type->scopeable_type)[3] : 'All' }}]
                            </td>
                            <td>{{ $type->flows->count() }}</td>
                            <td>{{ $type->duration }} {{ $type->metric }}</td>
                            <td>{{ $type->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('type.show', $type->id) }}" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                                {{-- <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body p-5">
                <h5>Approval Steps</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            {{-- <th class="px-2">#</th> --}}
                            <th class="px-2">Order</th>
                            <th>Step Roles</th>
                            <th>Scope</th>
                            {{-- <th>Reach</th> --}}
                            <th>Step Actions</th>
                            <th>Status</th>
                            <th class="px-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($type->flows as $flow)
                            <tr>
                                {{-- <td class="px-2">{{$loop->index}}</td> --}}
                                <td class="px-2">{{ $flow->approval_order }}</td>
                                <td>
                                    @foreach ($flow->roles as $role)
                                        <span class="badge bg-secondary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <span>
                                        [{{ $flow->approval_scopeable_type != null ? explode('\\', $flow->approval_scopeable_type)[3] : 'All' }}]
                                        @php
                                            if ($flow->approval_scopeable_type != null) {
                                                $modelObject = ('Modules\\Shared\\Models\\' . explode('\\', $flow->approval_scopeable_type)[3])::where('id', $flow->approval_scopeable_id)->first();
                                            }
                                        @endphp
                                        <br /><small>{{ $flow->approval_scopeable_id != null ? (explode('\\', $flow->approval_scopeable_type)[3] == 'Department' ? $modelObject->name : $modelObject->name) : '' }}</small>
                                    </span>
                                    {{-- @foreach ($flow->roles as $scope)
                                        <span>
                                            [{{ $scope->pivot->scopeable_type != null ? explode('\\', $scope->pivot->scopeable_type)[3] : 'All' }}]
                                            @php
                                                if ($scope->pivot->scopeable_type != null) {
                                                    $modelObject = ('Modules\\Shared\\Models\\' . explode('\\', $scope->pivot->scopeable_type)[3])::where('id', $scope->pivot->scopeable_id)->first();
                                                }
                                            @endphp
                                            <br /><small>{{ $scope->pivot->scopeable_id != null ? (explode('\\', $scope->pivot->scopeable_type)[3] == 'Department' ? $modelObject->name : $modelObject->name) : '' }}</small>
                                        </span>
                                    @endforeach --}}
                                </td>
                                {{-- <td>{{ $flow->approval_scopeable_id }}</td> --}}
                                <td>
                                    @foreach ($flow->actions as $action)
                                        <span class="badge bg-{{$action->name == 'Approve' ? 'success' : ($action->name=='Decline' ? 'danger' : ($action->name=='Return' ? 'warning' : ($action->name=='Modify' ? 'info' : 'primary')))}}  text-white">{{ $action->name }}</span>
                                    @endforeach
                                </td>
                                <td><span
                                        class="badge bg-{{ $flow->status ? 'success' : 'danger' }} text-white">{{ $flow->status ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('flow.show', $flow->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-default"><i class="fa fa-edit"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{-- {{ $type->flows->links() }} --}}</div>
        </div>
    </div>
@endsection
