@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3">Document Title: {{ $document->title }}</h1>
                    <h2>Versions</h2>
                    <p>
                        Path:
                        <span>
                            @foreach (array_reverse($document->folder->getAllAncestors()) as $ancestor)
                                <a href="{{ route('folders.show', $ancestor->id) }}">
                                    {{ $ancestor->name }}/
                                </a>
                            @endforeach
                            <a href="{{ route('folders.show', $document->folder->id) }}">
                                {{ $document->folder->name }}
                            </a>
                        </span>
                    </p>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end" href="{{ url()->previous() }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('documentmanager::folders.documents.document_versions.table')
        </div>
    </div>
@endsection
