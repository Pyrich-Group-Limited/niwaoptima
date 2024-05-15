@extends('layouts.app')

@section('title', 'Services')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">List of Services</h3>
                <div class="nk-block-des text-soft">
                    
                </div>
            </div><!-- .nk-block-head-content -->
           
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="row">
        <div class="col-md-12 text-right" style="padding-right: 30px;">
            <a href="{{ route('services.create') }}" class="btn btn-primary"><em class="fa fa-plus"></em><span> Add New</span></a>
        </div>
    </div>
    <div class="content px-3">
    <div class="clearfix"></div>
   <div class="card">
    <div class="card-body p-5">
        <form method="GET" action="{{ route('services.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <?php 
               /*  $start = 3;
$end = 672;
$step = 28;

$array = [];

for ($i = $start; $i <= $end; $i += $step) {
    $array[] = $i;
}

echo "[" . implode(", ", $array) . "]"; */
                ?>
            <table class="table align-middle gs-0 gy-4" id="order-listing123">
                    <thead>
                        <tr>
                           {{--  <th>S/N</th> --}}
                            <th>Service Name</th>
                            {{-- <th>Area Office</th> --}}
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($services as $index => $service)
                            <tr>
                                {{-- <td>{{ $index + 1 }}</td> --}}
                                <td>{{ $service->name }}</td>
                               {{--  <td>{{ $service->branch->branch_name ?? 'NILL' }}</td> --}}
                                 <td><span
                                        class="tb-status text-{{ $service->status == 1 ? 'success' : 'danger' }}">{{ $service->status == 1 ? 'ACTIVE' : 'NOT ACTIVE' }}</span>
                                </td>
                                <td>
                                    <a style="padding-right:10px;" href="{{ route('services.edit', $service->id) }}" title="Edit Service"><span
                                            class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span></a>
                                    {{-- <a data-id="{{ $service->id }}"><span class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="icon ni ni-trash"></em></span>
                                            </a> --}}

                                    {{-- <a id="delete-service" title="Terminate Service" style="cursor: pointer;"
                                        onclick="event.preventDefault();
                                    document.getElementById('delete-service-form').submit();"><span
                                            class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="fa fa-trash"></em></span>
                                    </a> --}}
                                    <form id="delete-service-form" action="{{ route('services.destroy', $service->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button onclick="return false" id="delete-service"
                                            class="btn btn-danger">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>{{ $services->appends(['search' => request('search')])->links() }}</div>

           
    </div>
</div></div>

@endsection
