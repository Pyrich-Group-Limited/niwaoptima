@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval Type</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-end" href="{{ route('type.create') }}">
                        Add New Type
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3 mt-5">

        @include('flash::message')

        @if ($errors->any())
            <div class="example-alert">
                <div class="alert alert-danger alert-icon alert-dismissible">
                    <em class="icon ni ni-alert-circle"></em>
                    <strong>Error:</strong>
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <button class="close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <div class="clearfix"></div>

        <div class="card mb-5">
            <div class="card-body p-5">
                <h5>Add Approval Type</h5>
                <hr>

                <form action="{{ route('type.store') }}" method="POST">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cycle">Cycle</label>
                                <select name="cycle" id="cycle"
                                    class="form-control @error('cycle') is-invalid @enderror" required>
                                    <option value="">- Select Cycle -</option>
                                    <option @selected(old('cycle') == 'Annually')>Annually</option>
                                    <option @selected(old('cycle') == 'Quarterly')>Quarterly</option>
                                    <option @selected(old('cycle') == 'Periodically')>Periodically</option>
                                    <option @selected(old('cycle') == 'Once')>Once</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <label for="metric">Duration Metric</label>
                            <select name="metric" id="metric" class="form-control">
                                <option value="">- Select Duration Metric -</option>
                                <option @selected(old('metric') == 'Days')>Days</option>
                                <option @selected(old('metric') == 'Weeks')>Weeks</option>
                                <option @selected(old('metric') == 'Months')>Months</option>
                                <option @selected(old('metric') == 'Years')>Years</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="duration">Duration Period</label>
                            <input type="number" name="duration" id="duration" value="{{ old('duration', 1) }}"
                                class="form-control" min="1">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <label for="scope">Scope</label>
                            <select name="scope" id="scope" class="form-control" size="3">
                                <option @selected(old('scope') == null) value="null">All</option>
                                <option @selected(old('scope') == 'Region')>Region</option>
                                <option @selected(old('scope') == 'Branch')>Branch</option>
                                <option @selected(old('scope') == 'Department')>Department</option>
                            </select>
                        </div>
                        <div class="col-6 region_div d-none">
                            <label for="region">Region</label>
                            <select name="region" id="region" class="form-control" multiple size="3">
                                <option value="null">All</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 branch_div d-none">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control" multiple size="3">
                                <option value="null">All</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 department_div d-none">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control" multiple size="3">
                                <option value="null">All</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-primary btn-lg mt-5">Add Approval Type</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




    </div>
@endsection


@push('page_scripts')
    <script>
        $(document).ready(function() {
            /**
             * APPROVAL SCOPE
             */
            $('#scope').on('change', function() {
                if ($(this).val() == 'Region') {
                    $('.region_div').removeClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').addClass('d-none');
                } else if ($(this).val() == 'Department') {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').removeClass('d-none');
                } else if ($(this).val() == 'Branch') {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').removeClass('d-none');
                    $('.department_div').addClass('d-none');
                } else {
                    $('.region_div').addClass('d-none');
                    $('.branch_div').addClass('d-none');
                    $('.department_div').addClass('d-none');
                }
            });

            $('#scope').trigger('change');
        });
    </script>
@endpush
