<div class="card-body ">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="bookings-table">
            <thead>
                <tr class="fw-bold text-muted bg-light">
                    <th class="min-w-200px">Departure State</th>
                    {{-- <th class="min-w-200px">Departure Day</th> --}}
                    {{-- <th class="min-w-200px">Departure Time</th> --}}
                    <th class="min-w-200px">Trip Type</th>
                    {{-- <th class="min-w-200px">Price</th> --}}

                    {{-- <th class="min-w-200px">Trip Duration</th> --}}
                    {{-- <th class="min-w-200px">Arrival Time</th> --}}
                    {{-- <th class="min-w-200px">Arrival Day</th> --}}
                    <th class="min-w-200px">Arrival State</th>
                    {{-- <th class="min-w-120px" colspan="1">Action</th> --}}
                    <th >Action</th>
                    {{-- <th class="min-w-200px text-end rounded-end"></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr class="fw-bold text-muted bg-light">
                        <td>{{ $booking->arrival->branch_name?$booking->arrival->branch_name: 'dd' }}</td>
                        {{-- <td>{{ $booking->departure_day }}</td> --}}
                        <td>{{ $booking->trip_type }}</td>
                        {{-- <td>{{ $booking->price }}</td> --}}
                        {{-- <td>{{ $booking->trip_duration }}</td> --}}
                        {{-- <td>{{ $booking->arrival_day }}</td> --}}
                        <td>{{ $booking->departure->branch_name?$booking->departure->branch_name: 'dd' }}</td>

                        {{-- <td>{{ $booking->departure_time }}</td>
                        <td>{{ $booking->no_of_passengers }}</td>
                        <td>{{ $booking->arrival_time }}</td> --}}
                        <td style="width:120px">
                            {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('bookings.show', [$booking->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- <a href="{{ route('bookings.edit', [$booking->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a> --}}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "return confirm('Are you sure?')",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        {{-- <th class="min-w-200px text-end rounded-end"></th> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $bookings])
        </div>
    </div>
</div>
