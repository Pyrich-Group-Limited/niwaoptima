@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="float-left">Login Audit Logs</div>
          
        </div>

        <div class="card">

            <div class="card-body">



                <table id="table" class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Email</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                        </tr>
                    </thead>
                    <tbody>
                      

                  
                            <tr>
                               
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              
             
                            </tr>
                      


                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var searchmessage = $('#searchmessage');
        var searchfrequency = $('#searchfrequency');
        var seachsubject = $('#seachsubject');
        seachsubject.hide()
        // $(function() {
        //     seachsubject.click(function(
        //         alert('ddddddddddddddddddddd');
        //     ))
        // })
    </script>
@endsection
