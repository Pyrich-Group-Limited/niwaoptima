@extends('layouts.app')

@section('title', 'Sub-Service')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Create New Sub-Service</h3>
                <div class="nk-block-des text-soft">
                    
                </div>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form action="{{ route('sub-services.store') }}" method="POST">
                    @csrf
                    @include('sub_services.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection


@push('scripts')
   {{--  <script>
        $(document).ready(function() {
            //FETCH LGAs FROM STATE ID
            const lUrl = "{{ route('employer.lgas') }}?state=";
            $('#state_of_origin').change(function() {
                $.ajax({
                    url: lUrl + $(this).val(),
                    type: "GET",
                    data: null,
                    dataType: 'json',
                }).done(function(response) {
                    $('#local_govt_area').empty();
                    var lgas = '';
                    $.each(response.data, function(a, b) {
                        lgas += '<option value="' + b.id + '">' + b.name + '</option>';
                    });
                    $('#local_govt_area').html(lgas);
                });
            });

            $('#state_of_origin').trigger('change');
        });
    </script> --}}
@endpush
