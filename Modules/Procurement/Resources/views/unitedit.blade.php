@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class=" card-body">
                <div class="row">
                    <div class="col-4">
                        <label class=" fw-bolder" for="">Requestion Type</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->type }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fw-bolder" for="">Staff Name</label>
                        <div class="mx-3">

                            <span
                                class=" bold">{{ $data->user->first_name . ' ' . $data->user->middle_name . ' ' . $data->user->last_name }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fw-bolder" for="">Refrence ID</label>
                        <div class="mx-3">

                            <span class=" fw-bolder text-success">{{ $data->reference_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label class="fw-bolder" for="">Title</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->title }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fw-bolder" for="">DATE ISSUED</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->issue_date }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="fw-bolder" for="">STATUS</label>
                        <div class="mx-3">

                            <span class=" bold">
                                @if ($data->status == 0)
                                    {{ 'AWATING UNIT HEAD' }}
                                @elseif ($data->status == 1)
                                    {{ 'AWAITING HOD' }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="table mt-4">
                    <span class="text-center  text-success my-4">REQUESITION DETAILS</span>
                    <div class="table-responsive">
                        <table class=" table-bordered">
                            <thead>
                                <tr>
                                    <th>ITEMS</th>
                                    <th>QUANTITY</th>
                                    <th>RATE</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($req as $item)
                                    <tr>
                                        <td>{{ json_decode($item->item) }}</td>
                                        <td>{{ json_decode($item->quantity) }} </td>
                                        <td>{{ json_decode($item->rate) }}</td>
                                        <td>{{ json_decode($item->amount) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
    
                        </table>
                    </div>
                    
                </div>
            </div>
            @php

                $ap = DB::table('users')->where('unit_head_id', auth()->user()->id);
            @endphp

            @if ($data->status == 1)
                <div class="card-footer">
                    <form action="{{ route('unitp.save', [$data->id]) }}" method="post">
                        @csrf

                        {{-- @method('PUT') --}}


                        <div class="row">


                            <div class="form-group">
                                <label class=" form-label" for=""> ADD COMMENT AS THE SUPERVISOR</label>
                                <input type="text" name="unit_comment" class=" form-control form-input" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="return confirm('are you sure of declining this Request')"
                                    value="0" name="status" class="btn btn-danger">Decline</button>
                                <button type="submit" name="status" value="2" class="btn btn-success">Authorize</button>
                            </div>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
