@extends('layouts.app')

<style>
    body {
        font-family: sans-serif;
        font-size: 14px;
    }

    .container {
        border: 1px solid #a0a0a0;
        border-radius: 4px;
        padding: 16px;
        margin: 30px auto;
        width: 800px;
    }

    #map-area {
        width: 504px;
        margin: 0 auto;
    }
</style>

@section('content')
    <!--begin::Content wrapper-->
    <!-- partial -->
    <div class="content-wrapper">
        {{-- <center> --}}

        <h1 class=" text-uppercase text-success text-center bold mb-5">Area Office Coordinator Dashboard
        </h1>
        {{-- </center> --}}


        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex float-end">
                            <div class="col-4">

                                {!! Form::label('from', 'FROM', ['class' => 'form-label']) !!}
                                {!! Form::date('from', null, ['class' => 'form-control form-date', 'id' => 'revenuefrom']) !!}
                            </div>
                            <div class="col-4">

                                {!! Form::label('to', 'TO', ['class' => 'form-label']) !!}
                                {!! Form::date('to', null, ['class' => 'form-control form-date', 'id' => 'revenueto']) !!}
                            </div>
                            <div class="col-4">
                                {{-- {!! Form::label('to', 'ACTION', ['class' => 'form-label']) !!} --}}
                                {!! Form::submit('SEARCH', ['class' => 'btn btn-sm btn-success form-control', 'id' => 'revenuesearchbtn']) !!}

                            </div>

                        </div>
                        <h4 class="card-title mb-0">TOTAL REVENUE GENERATED</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0" id="totalrevenue">{{ $totalrevenue }}</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        {{-- <i class="far fa-clock text-muted"></i> --}}
                                        <small class=" ml-1 mb-0"></small>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">REVENUE SOURCES</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0"></h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        {{-- <i class="far fa-clock text-muted"></i> --}}
                                        {{-- <small class="ml-1 mb-0">Updated: 05:42pm</small> --}}
                                    </div>

                                </div>

                            </div>
                            <div class="d-inline-block">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#revenueModal">
                                    VIEW
                                </button>
                                {{-- <i class="fas fa-shopping-cart text-danger icon-lg"></i> --}}
                                {{-- <span class="m-3 badge badge-outline-success badge-pill">0% increase</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Active Projects</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">{{ $active_project }}</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        {{-- <i class="far fa-clock text-muted"></i> --}}
                                        <small class=" ml-1 mb-0"></small>
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Completed Project</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">{{ $completed_project }}</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        {{-- <i class="far fa-clock text-muted"></i> --}}
                                        {{-- <small class="ml-1 mb-0">Updated: 05:42pm</small> --}}
                                    </div>

                                </div>

                            </div>
                            <div class="d-inline-block">
                                {{-- <i class="fas fa-shopping-cart text-danger icon-lg"></i> --}}
                                {{-- <span class="m-3 badge badge-outline-success badge-pill">0% increase</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-facebook btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Staff</h5>
                                    <p class="mb-0">{{ $staff }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-twitter btn-rounded">
                                    <i class="fa fa-building"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Departments</h5>
                                    <p class="mb-0">{{ $total_department }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <button class="btn btn-social-icon btn-google btn-rounded">
                                    <i class="fas fa-user"></i>
                                </button>
                                <div class="ml-4">
                                    <h5 class="mb-0">Total Clients</h5>
                                    <p class="mb-0">{{ $total_clients }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-chart-pie"></i>
                            Project Distribution
                        </h4>
                        <h2 class="mb-5">0<span class="text-muted h4 font-weight-normal">Total Projects</span></h2>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <div id="project" class="mt-3 chartjs-render-monitor" width="425" height="212"
                                style="display: block; height: 170px; width: 500px;"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">
                            <i class="fas fa-tachometer-alt"></i>
                            DOCUMENTS CATEGORIES
                        </h4>

                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <div id="aoc" class="mt-3 mb-3 mb-md-0 chartjs-render-monitor" width="425"
                                height="212" style="display: block; height: 170px; width:500px;"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Files</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">{{ $totalfolders }}</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        {{-- <small class=" ml-1 mb-0">Updated: 9:10am</small> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-chart-pie text-info icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Files</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-inline-block pt-3">
                                <div class="d-md-flex">
                                    <h2 class="mb-0">0</h2>
                                    <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                        <i class="far fa-clock text-muted"></i>
                                        {{-- <small class="ml-1 mb-0">Updated: 05:42pm</small> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="d-inline-block">
                                <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fa fa-user mr-2"></i>
                                    Number Of Employee
                                </p>
                                <h2>{{ $staff }}</h2>
                                {{-- <label class="badge badge-outline-success badge-pill">0% increase</label> --}}
                            </div>
                            <div class="statistics-item">
                                <p>
                                    <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                    Staff On Leave
                                </p>
                                <h2>{{ $staffonleave }}</h2>
                                {{-- <label class="badge badge-outline-success badge-pill">0% decrease</label> --}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>







        @php
            $leave = DB::table('leave_request')->select('staff_id');
        @endphp
        <div class="row mb-5">
            <div class="col-12 grid-margin">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="">
                            <Form method="GET">
                                {!! Form::select('searchbranch', $thebranch, null, ['class' => 'form-select', 'id' => 'listofbranch']) !!}
                                {{-- <button type="submit" class="btn btn-primary">Search</button> --}}


                            </Form>
                        </div>
                        <h4 class="card-title">
                            LIST OF STAFF </h4>

                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="staffonleavetable" class="table staffonleavetable">
                                    <thead>
                                        <tr>
                                            <th class="sortStyle">Employee ID<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">First Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Last Name<i class="fa fa-angle-down"></i></th>
                                            <th class="sortStyle">Department<i class="fa fa-angle-down"></i></th>
                                            {{-- <th class="sortStyle">Leave Status<i class="fa fa-angle-down"></i></th> --}}
                                            {{-- <th class="sortStyle">Reason<i class="fa fa-angle-down"></i></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($theareas as $item)
                                            <tr>
                                                <td>{{ $item->staff_id ? $item->staff_id : $item->id }}</td>
                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->name ? $item->name : 'No Department' }}</td>
                                                {{-- <td>
                                                    @if ($item->staff_id == $leave)
                                                        <p>Yes</p>
                                                    @else
                                                        <p>Not on Leave</p>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Revenue Modal -->
    <div class="modal fade" id="revenueModal" tabindex="-1" role="dialog" aria-labelledby="revenueModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="revenueModalLabel">Revenue Sources</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-6 grid-margin">
                        <div class="">
                            <div class="">
                                <h4 class="card-title mb-0">REVENUE SOURCES</h4>
                                <table class="table">
                                    {{-- <thead>
                                        <tr>BRANCH NAME</tr>
                                        <tr>REVENUE GENERATED</tr>
                                    </thead> --}}
                                    <tbody>
                                        @foreach ($paymentbybranch as $item)
                                            <tr>

                                                <td>{{ $item->branch_name }}</td>
                                                <td>{{ $item->sum }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- Add other buttons or actions here --}}
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!--end::Content wrapper-->
@endsection
<script>
    let table = new DataTable('sortable-table-1');
    let tablee = new DataTable('table table-bordered');
</script>



{{-- @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush --}}

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
    $(function() {
        var branches = $('#listofbranch');
        var thetable = $('#staffonleavetable');
        var totalrevenue = $('#totalrevenue');
        var revenuefrom = $('#revenuefrom');
        var revenueto = $('#revenueto');
        var revenuesearchbtn = $('#revenuesearchbtn');


        revenuesearchbtn.click(function() {

            $.ajax({
                type: "GET",
                url: "totalrevenue",
                data: {
                    to: revenueto.val(),
                    from: revenuefrom.val()
                },
                dataType: "json",
                success: function(response) {



                    totalrevenue.text(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        })

        branches.change(function() {
            var thevalue = $(this).val();


            // console.log(thetable);

            $.ajax({
                type: "GET",
                url: "thelist",
                data: {
                    thevalue: thevalue
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    // alert(response)


                    thetable.find('tbody').empty();
                    $.each(response, function(index, item) {

                        var row = '<tr>' +
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.first_name + '</td>' +
                            '<td>' + item.last_name + '</td>' +
                            '<td>' + (item.name ? item.name : 'No Department') +
                            '</td>' +
                            '</tr>';

                        thetable.find('tbody').append(row);
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        var chartdata = @json($documents);
        var projectdata = @json($project_chart);

        var status = projectdata.map(function(item) {
            return item.status;
        });
        var projectnumber = projectdata.map(function(item) {
            return item.number;
        });

        var names = chartdata.map(function(item) {
            return item.name;
        });
        var numbers = chartdata.map(function(item) {
            return item.num;
        });

        var projectshow = new ApexCharts(document.querySelector('#project'), {
            chart: {
                type: 'pie'
            },
            series: projectnumber,
            labels: status,
            plotOptions: {
                pie: {
                    size: 200
                }
            }
        });
        projectshow.render();

        var options = {
            chart: {
                type: 'pie'
            },
            series: numbers,
            labels: names,
            setTitle: 'Hello.....................',
            plotOptions: {
                pie: {
                    size: 200
                }
            }
        };

        var thechart = new ApexCharts(document.querySelector('#aoc'), options);
        thechart.render();
    });
</script>
