@extends('layouts.app')

@section('content')
<h3>Bulk Users Upload (CSV format only)</h3>
@include('flash::message')

<div class="row">
<div class="col-md-6">
    <form action="{{ route('bulk_upload_now') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" class="form-control" name="file" accept="text/csv">
        <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Bulk Upload</button>
    </form>
</div>
</div>


@endsection