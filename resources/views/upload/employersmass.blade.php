@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="container">



        <form action="{{ route('emplistsa') }}" enctype="multipart/form-data" method="post" class="form">
            @csrf
            <div class="row-12">
                <center for="" class=" mb-4 text-center text-uppercase">Upload Applicants Record <i
                        class=" text-danger">*</i></center>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label for="" class=" form-label"> <i class=" text-danger">*</i></label>
                    <input type="file" name="file" class=" form-control file" id="">
                </div>
                <div class="form-group col-6 mt-2">

                    <a href="{{ route('empldownload') }}" class="btn  btn-secondary  btn-sm"><i
                            class=" bi bi-download"></i>DOWNLOAD SAMPLE</a>
                </div>



            </div>
            <div class="form-group ">

                <button class=" btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
