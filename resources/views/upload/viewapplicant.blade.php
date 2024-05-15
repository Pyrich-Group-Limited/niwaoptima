@extends('layouts.app')
@section('content')
    <div class="card mx-4">
        <div class="card-body">

            <div class="row">
                <div class="col-6">

                    <label for="">Applicant Code:</label>
                    <span>{{ $data->applicant_code }}</span>
                </div>
                <div class="col-6">

                    <label for="">Phone Number:</label>
                    <span>{{ $data->company_phone }}</span>
                </div>

            </div>
            <div class="row">
                <div class="col-6">

                    <label for="">Applicant Name:</label>
                    <span>{{ $data->contact_surname . '' . $data->contact_firstname }}</span>
                </div>
                <div class="col-6">

                    <label for="">EMAIL:</label>
                    <span>{{ $data->company_email }}</span>
                </div>

            </div>

        </div>

        <div class=" card-footer">
            @if ($data->status == 1)
            <form action="{{route('apsav',[$data->id])}}" method="POST" class="form">
                @csrf

                <button value="2" name="status" class=" btn btn-success" type="submit">Approve</button>
                <button value="0" name="status" class=" btn btn-danger" type="submit">Reject</button>

            </form>
        @endif
        </div>
    </div>
@endsection
