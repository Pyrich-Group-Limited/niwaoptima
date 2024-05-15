@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="float-left">Reminder</div>
            <a href="{{ route('reminder.create') }}" class="btn btn-sm btn-success"> <i class="bi bi-plus"></i> Add
                Reminder</a>
        </div>

        <div class="card">

            <div class="card-body">



                <table id="table" class="table table-responsive datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Document</th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    <div class="dropdown">

                                        <i title="Action" data-toggle="dropdown" class=" btn bi bi-three-dots-vertical"
                                            aria-haspopup="true" aria-expanded="false"></i>
                                        <div class="dropdown-menu dropdown-menu-right" style="z-index: 9999;"
                                            aria-labelledby="dropdownMenuButton">
                                            {{-- <a target="_blank" href="" class='btn btn-default btn-xs dropdown-item'>
                                                <i class="far fa-eye"></i> View
                                            </a> --}}

                                            <a href="{{ route('reminder.edit', [$item->id]) }}"
                                                class='btn btn-default btn-xs dropdown-item'>
                                                <i class="far fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('reminder.destroy', [$item->id]) }}" method="post">
                                                @method('Delete')
                                                @csrf
                                                <button type="submit" class='btn btn-default btn-xs dropdown-item'>
                                                    Delete
                                                </button>

                                            </form>

                                        </div>
                                    </div>
                                </td>
                                <th>{{ $item->reminderstart_date }}</th>
                                <td>{{ $item->reminderend_date ? $item->reminderend_date : $item->reminderstart_date }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->frequency ? $item->frequency : '' }}</td>
                                <td>{{ $item->documentmanager ? $item->documentmanager->title : '' }}</td>

                            </tr>
                        @endforeach


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
