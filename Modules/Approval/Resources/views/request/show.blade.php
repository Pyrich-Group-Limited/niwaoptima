@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Request</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ isset($request->staff->user) ? $request->staff->user->first_name . ' ' . $request->staff->user->last_name : '' }}
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
                                        $request->type->flows()->where('status', 1)->max('approval_order')
                                    ) {
                                        if ($request->status == 5) {
                                            echo 'Declined';
                                        } elseif ($request->action_id == 1) {
                                            echo 'Approved';
                                        } else {
                                            echo 'Pending';
                                        }
                                    } else {
                                        echo 'Pending';
                                    }
                                @endphp
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
                <h6>Current Step:: {{ $request->order }} of {{ $request->type->flows->count() }}</h6>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">Step</th>
                            <th>Staff</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request->timelines as $timeline)
                            <tr>
                                <td class="px-2">Step {{ $timeline->flow->approval_order }}</td>
                                <td>
                                    {{ isset($timeline->staff->user) ? $timeline->staff->user->first_name . ' ' . $timeline->staff->user->last_name : '' }}
                                    <br />
                                    <small>
                                        {{ isset($timeline->staff->user) ? $timeline->staff->user->roles->pluck('name') : '' }}
                                    </small>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $timeline->action->name == 'Approve' ? 'success' : ($timeline->action->name == 'Decline' ? 'danger' : ($timeline->action->name == 'Return' ? 'warning' : ($timeline->action->name == 'Modify' ? 'info' : 'primary'))) }}  text-white fs-6">{{ $timeline->action->status }}</span>
                                </td>
                                <td>{{ date('F jS, Y h:ia', strtotime($timeline->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
