@extends('layouts.app')

@section('content')
    <div class="container">

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
                            @elseif ($item->status == 2)
                                <span class=" fw-bolder text-warning"> Awaiting HOD Approval</span>
                            @elseif ($item->status == 3)
                                <span class=" fw-bolder text-warning"> Awaiting Audit HOD Approval</span>
                            @elseif ($item->status == 4)
                                <span class=" fw-bolder text-warning"> Awaiting Legal HOD Approval</span>
                            @elseif ($item->status == 5)
                                <span class=" fw-bolder text-warning"> Awaiting MD Approval</span>
                            @else
                                <span class=" fw-bolder text-success"> Approved</span>
                            @endif
                        </td>
                        <td>
                            {{-- {!! Form::open(['route' => ['procurement.destroy', $item->id], 'method' => 'delete']) !!} --}}
                            <div class="btn-group">
                                {{-- <a href="{{ route('procurement.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                                    View
                                </a> --}}
                                <a href="{{ route('legal.edit', [$item->id]) }}" class='btn btn-default btn-xs'>
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
        <script>
            let table = new DataTable('#procurement')
        </script>
    </div>
@endsection
