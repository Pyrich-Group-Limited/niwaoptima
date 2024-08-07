@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Create Employers
                </h1>
            </div>
        </div>
    </div>
</section>


<!--begin::Content-->
<div id="kt_app_content" class="app-content1 flex-column-fluid1">
   
    <div class="card d-flex flex-row-fluid flex-center">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!--begin::Form-->
        <form class="p-10" id="kt_create_account_form" method="post" action="{{route('employers.store')}}" enctype="multipart/form-data">
            @include('employermanager::employers.fields')
        </form>
        <!--end::Form-->
    </div>
</div>
<!--end::Content-->

@endsection


@push('page_scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('select[name="user_id"]').select2({
            theme: 'bootstrap',
            placeholder: 'Select a Team Member',
            minimumResultsForSearch: 0 // Show search input
        });
    });
</script> --}}
@endpush
