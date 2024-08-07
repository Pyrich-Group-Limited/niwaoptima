@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table mt-4 table-striped" id="procurement">
                <thead>
                    <tr>
                        <th scope="col">TRX ID</th>
                        <th scope="col">STAFF NAME</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">PROC.TYPE</th>
                        <th scope="col">ISSUE DATE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($procurement as $item)
                        <tr>
                            <th>{{ $item->reference_number }}</th>
                            <td>{{ $item->user->first_name . '' . $item->user->last_name }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->issue_date }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <span class=" fw-bolder text-danger">
                                        REJECTED
                                    </span>
                                @elseif ($item->status == 1)
                                    <span class=" fw-bolder text-warning"> Awaiting Supervisor Approval</span>
                                @elseif ($item->status == 6)
                                    <span class=" fw-bolder text-success "> Awaiting Payment</span>
                                @else
                                    <span class=" fw-bolder text-success"> PAID</span>
                                @endif
                            </td>
                            <td>
                                {{-- {!! Form::open(['route' => ['procurement.destroy', $item->id], 'method' => 'delete']) !!} --}}
                                <div class="btn-group">
                                    {{-- <a href="{{ route('procurement.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                                        View
                                    </a> --}}
                                    <a href="{{ route('fined.proc', [$item->id]) }}" class='btn btn-success text0-white btn-default btn-xs'>
                                        View
                                    </a>
    
                                    {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => "return confirm('Are you sure?')",
                                    ]) !!} --}}
                                </div>
                                {!! Form::close() !!}
                            </td>
    
                        </tr>
                    @endforeach
    
                </tbody>
            </table>
        </div>
        
        <script>
            let table = new DataTable('#procurement')
        </script>
    </div>
@endsection
