@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="card-title">
                        Edit PAYMENT Record
                    </h4>
                </div>
            </div>
        </div>
    </section>


    <div class="card mx-4">
        <div class="card-body mx-2">
            <form class=" form" action="{{ route('paymentupdate', [$data->id]) }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label for="">Applicant Name</label>
                        {{-- <select class=" form-control form-select" name="user_id" id="">
                            @foreach ($applicant as $item)
                                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                            @endforeach
                        </select> --}}
                        {!! Form::select('user_id', $applicant, $data->employer, ['class' => 'form-control form-select']) !!}

                    </div>
                    <div class="col-6">

                        <label for="">Invoice Number:</label>
                        {{-- <select class=" form-control form-select" name="service_id" id="">
                            @foreach ($theservices as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select> --}}
                        <input type="text" class=" form-control" name="invoice_number" id="">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for=""> Invoice Generated At:</label>
                        <input class=" form-control date" type="date" name="invoice_generated_at" id="">

                    </div>
                    <div class="col-6">
                        <label for=""> Invoice Duration:</label>
                        <input class="form-control date" type="date" name="invoice_duration" id="">

                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Payment Status</label>
                        <input type="text" name="payment_status" class=" form-control" id="">

                    </div>


                    <div class="col-6">
                        <label for="">Amount</label>
                        <input type="text" name="amount" class=" form-control" id="">

                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <label for=""> Service Application Id:</label>
                        <input type="number" name="service_application_id" class="form-control" id="">

                    </div>
                    <div class="col-6">
                        <label for=""> Transaction Id:</label>
                        <input type="text" class="form-control" name="transaction_id" id="">

                    </div>
                </div>

                {{-- <div class="row">
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
                </div> --}}
                <div class="row my-5">

                    <button class="btn btn-sm btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
