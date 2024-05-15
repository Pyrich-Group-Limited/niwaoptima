@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Bulk Ranks Upload (CSV format only)</h3>
    @include('flash::message')
    
    <div class="row">
    <div class="col-md-6">
        <form action="{{ route('rank_upload_now') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="default-06">Select bulk
                    Rank file (Excel only: .csv) <a
                        href="{{ Storage::url('ranks.csv') }}">Download bulk Rank
                        template</a></label>
                <div class="form-control-wrap">
                    <div class="form-file">
            <input type="file" class="form-control" name="excel" accept="text/csv">
                    </div>
                </div>
                <div class="form-group" style="margin-top: 20px;">
            <button style="" type="submit" class="btn btn-primary">Bulk Upload</button>
                </div>
        </form>
    </div>
    </div>
</div>


@endsection