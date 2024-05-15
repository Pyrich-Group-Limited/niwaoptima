@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Folder Details
                    </h1>
                    <p>
                        Name: {{ $folder->name }}
                    </p>
                    <p>
                        Path:
                        <span>
                            @foreach (array_reverse($folder->getAllAncestors()) as $ancestor)
                                <a href="{{ route('folders.show', $ancestor->id) }}">
                                    {{ $ancestor->name }}/
                                </a>
                            @endforeach
                            <a href="#">
                                {{ $folder->name }}
                            </a>
                        </span>
                    </p>
                </div>
                <div class="col-sm-6">
                    @if ($folder->parentFolder)
                        <a class="btn btn-primary float-end" href="{{ route('folders.show', $folder->parentFolder->id) }}">
                            Back
                        </a>
                    @else
                        <a class="btn btn-primary float-end" href="{{ route('folders.index') }}">
                            Back
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    @include('documentmanager::folders.sub_folders.index')
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('documentmanager::folders.documents.index')
                </div>
            </div>
        </div>
    </div>
@endsection
