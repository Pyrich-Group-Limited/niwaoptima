@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        Edit Service Application
                    </h4>
                </div>
            </div>
        </div>
    </section>


    <div class="card mx-4">
        <div class="card-body mx-2">
            <form class=" form" action="{{ route('serviceeditiupdate', [$serviceApplication->id]) }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label for="">Applicant Name</label>
                        <select class=" form-control form-select" name="user_id" id="">
                            @foreach ($applicant as $item)
                                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-6">

                        <label for="">Service Name:</label>
                        <select class=" form-control form-select" name="service_id" id="">
                            @foreach ($theservices as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for=""> Date of Inspection</label>
                        <input class=" form-control date" type="date" name="date_of_inspection" id="">

                    </div>
                    <div class="col-6">
                        <label for="">Service Type:</label>
                        <select class=" form-control form-select" name="service_type_id" id="">
                            @foreach ($servicetype as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Application Form Payment Status</label>
                        <input type="checkbox" value="1" name="application_form_payment_status" class=" form-check"
                            id="">

                    </div>
                    <div class="col-6">
                        <label for="">Mse Are Documents Verified: </label>
                        <select class=" form-control form-select" name="mse_are_documents_verified" id="">
                            @foreach ($yesno as $item)
                            <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for=""> Status Summary:</label>
                        <input type="text" name="status_summary" class="form-control" id="">

                    </div>
                    <div class="col-6">
                        <label for=""> Mse Document Verification Comment:</label>
                        <input type="text" class=" form-control" name="mse_document_verification_comment" id="">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Finance Is Application Fee Verified: </label>
                        <select class=" form-control form-select" name="finance_is_application_fee_verified" id="">
                            @foreach ($yesno as $item)
                                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-6">
                        <label for="">Finance Is Processing Fee Verified: </label>
                        <select class=" form-control form-select" name="finance_is_processing_fee_verified" id="">
                            @foreach ($yesno as $item)
                                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Finance Is Inspection Fee Verified: </label>
                        <select class=" form-control form-select" name="finance_is_inspection_fee_verified" id="">
                            @foreach ($yesno as $item)
                                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-6">
                        <label for="">Inspection Status: </label>
                        <select class=" form-control form-select" name="inspection_status" id="">
                            @foreach ($yesno as $item)
                                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <label for="">Hod Approval: </label>
                        <select class=" form-control form-select" name="hod_marine_approval" id="">
                            @foreach ($approved as $item)
                                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="col-6">
                        <label for="">Area Officer Approval: </label>
                        <select class=" form-control form-select" name="area_officer_approval" id="">
                            @foreach ($approved as $item)
                            <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row my-5">
                    {{-- <a href="{{ route('serviceeditiupdate', [$serviceApplication->id]) }}">Upda</a> --}}
                    <button class="btn btn-sm btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
