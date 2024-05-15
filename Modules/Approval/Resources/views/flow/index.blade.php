@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Flow</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end" href="{{ route('flow.create') }}">
                        Add New Flow
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card mt-5">
            <div class="card-body p-5">
                <h5>Approval Flow List</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">#</th>
                            <th>Type</th>
                            <th>Scope</th>
                            <th>Stpes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flows as $flow)
                            <tr>
                                <td class="px-2">1</td>
                                <td>{{ $flow->approval_type }}</td>
                                <td>{{ $flow->approval_scopeable_type }}</td>
                                <td>{{ $flow->approval_steps }}</td>
                                <td><span>{{ $flow->status ? 'Active' : 'Inactive' }}</span> </td>
                                <td>
                                    <a href="{{ route('flow.show', $flow->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{ $flows->links() }}</div>
        </div>
    </div>
@endsection
