@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Work Flow Engine</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end" href="{{ route('type.create') }}">
                        Add New Type
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3 mt-5">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card mb-5">
            <div class="card-body p-5">
                <h5>Approval Type List</h5>
                <hr>

                <table class="table table-bordered align-middle gs-0 gy-4">
                    <thead class="fw-bold text-muted bg-light">
                        <tr>
                            <th class="px-2">#</th>
                            <th>Name</th>
                            <th>Cycle</th>
                            <th>Scope</th>
                            <th>Steps</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td class="px-2">{{ $loop->index + 1 }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->cycle }}</td>
                                <td>[{{ $type->scopeable_type != null ? explode('\\', $type->scopeable_type)[3] : 'All' }}]
                                </td>
                                <td>{{ $type->flows->count() }}</td>
                                <td>{{ $type->duration }} {{ $type->metric }}</td>
                                <td><span class="badge bg-{{$type->status ? 'success' : 'error'}} text-white">{{ $type->status ? 'Active' : 'Inactive' }}</span></td>
                                <td>
                                    <a href="{{ route('type.show', $type->id) }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                    {{-- <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-foot pb-5">{{ $types->links() }}</div>
        </div>
    </div>
@endsection
