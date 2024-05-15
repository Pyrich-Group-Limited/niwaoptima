@extends('layouts.app')

@section('content')
    @include('flash::message')

    <div class="container">




        <form class="form" action="{{ route('uploadpay') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row-12">
                <center for="" class=" mb-4 text-center text-uppercase">Upload Payment Record <i
                        class=" text-danger">*</i>
                </center>
            </div>
            <div class="row">

                <div class="form-group col-6">

                    <input type="file" name="file" class=" form-control file col-8" id="">
                </div>

                <div class="form-group col-6 mt-2">
                    <a href="{{ route('paydownload') }}" class="btn  btn-secondary  btn-sm "> <i
                            class=" bi bi-download"></i>
                        DOWNLOAD SAMPLE</a>

                </div>
            </div>
            <div class="form-group">

                <button class=" btn btn-success" type="submit">Submit</button>
            </div>

        </form>
    </div>
@endsection
