@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="card-title"> Documents By Category</div>
        </div>
        <div class="card">

            <div class="card-body">
                <div>
                    <canvas id="dmschart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>

        {{-- <!--begin::Calendar Widget 1-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">My Calendar</span>
                    <span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>
                </h3>
                <div class="card-toolbar">
                    {{-- <a href="../../demo1/dist/apps/calendar.html" class="btn btn-primary">Manage Calendar</a> --}}
                {{-- </div>
            </div> --}}
            <!--end::Card header-->
            <!--begin::Card body-->
            {{-- <div class="card-body"> --}}
                <!--begin::Calendar-->
                <div id='calendar'></div>
                <!--end::Calendar-->
            {{-- </div> --}}
            <!--end::Card body-->
        {{-- </div> --}}
        <!--end::Calendar Widget 1-->



    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            var chart = $('#dmschart');
            new Chart(chart, {
                type: 'pie',
                data: {
                    labels: [
                        'Damas',
                        'Obaid',
                        'Testchild',
                        'Product Name'
                    ],
                    datasets: [{
                        label: 'Documents Category',
                        data: [300, 200, 400, 600],
                        backgroundColor: [
                            'rgba(255,99,132,0.7)',
                            'rgba(75,192,192,0.7)',
                            'rgba(54,162,235,0.7)',
                            'rgba(50, 99, 235, 0.7)',
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }

            });


            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });

            calendar.render();
        })
    </script>
@endsection
