@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class=" card-body">
                <div class="row">
                    <div class="col-4">
                        <label for="">Requestion Type</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->type }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">Staff Name</label>
                        <div class="mx-3">

                            <span
                                class=" bold">{{ $data->user->first_name . ' ' . $data->user->middle_name . ' ' . $data->user->last_name }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">Refrence ID</label>
                        <div class="mx-3">

                            <span class=" fw-bolder">{{ $data->reference_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="">Title</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->title }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">DATE ISSUED</label>
                        <div class="mx-3">

                            <span class=" bold">{{ $data->issue_date }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="">STATUS</label>
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
            @php

                $ap = DB::table('users')->where('unit_head_id', auth()->user()->id);
            @endphp
            @unless ($data->status == 6)
                <div class="card-footer">
                    <form action="{{ route('mded.save', [$data->id]) }}" method="post">
                        





                        @csrf
                        <div class="row">


                            <div class="form-group">
                                <label class=" form-label" for=""> ADD COMMENT AS THE MD</label>
                                <input type="text" name="md_comment" class=" form-control form-input" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="status" value="0" class="btn btn-danger">REJECT </button>
                                <button type="submit" name="status" value="6" class="btn btn-success">APPROVE</button>
                            </div>
                        </div>
                        {{-- @endif
                        @endforeach --}}
                    </form>
                </div>
            @endunless
        </div>
    </div>
@endsection
