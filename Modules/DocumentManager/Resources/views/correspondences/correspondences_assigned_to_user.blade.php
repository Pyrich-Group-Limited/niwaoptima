@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Correspondences Assigned to {{ $user->email }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-5">
                <div class="table-responsive">
                    <table class="table" id="correspondences-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Document URL</th>
                                <th>Created At</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($correspondences_has_user as $correspondence_has_user)
                                @php
                                    $correspondence = $correspondence_has_user->correspondence;
                                    $latestDocumentUrl = $correspondence->document
                                        ->documentVersions()
                                        ->latest()
                                        ->first()
                                        ? $correspondence->document
                                            ->documentVersions()
                                            ->latest()
                                            ->first()->document_url
                                        : '#';
                                @endphp
                                <tr>
                                    <td>{{ $correspondence->subject }}</td>
                                    <td>{{ $correspondence->description }}</td>
                                    <td>{{ $correspondence->createdBy ? $correspondence->createdBy->email : '' }}</td>
                                    <td><a target="_blank" href="{{ asset($latestDocumentUrl) }}">View</a>
                                    </td>
                                    <td>{{ $correspondence->created_at }}</td>
                                    {{-- <td style="width: 120px">
                                        <a href="{{ route('correspondences.show', [$correspondence->id]) }}"
                                            class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', [
                            'records' => $correspondences_has_user,
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
