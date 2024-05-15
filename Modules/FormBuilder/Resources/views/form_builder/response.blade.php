@extends('layouts.app')
@section('page-title')
    {{ $form->name.__("'s Response") }}
@endsection
@push('script-page')

@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('form_builder.index')}}">{{__('Form Builder')}}</a></li>
    <li class="breadcrumb-item">{{__('Response')}}</li>
@endsection

@section('content')
<style>
    .btn-sm1, .btn-group-sm > .btn {
    --bs-btn-padding-y: 0.25rem;
    --bs-btn-padding-x: 0.5rem;
    --bs-btn-font-size: 0.76563rem;
    --bs-btn-border-radius: 4px;
}
.btn1 {
    --bs-btn-padding-x: 1.3rem;
    --bs-btn-padding-y: 0.575rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 0.875rem;
    --bs-btn-font-weight: 500;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: #293240;
    --bs-btn-bg: transparent;
    --bs-btn-border-width: 1px;
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: 6px;
    --bs-btn-hover-border-color: transparent;
    --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.2rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
    display: inline-block;
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    color: var(--bs-btn-color);
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: var(--bs-btn-bg);
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    transition: color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
.mx-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
}
.action-btn {
    width: 29px;
    height: 28px;
    color: rgb(255, 255, 255);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
    border-radius: 9.3552px;
}
.bg-danger {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
}
.ms-2 {
    margin-left: 0.5rem !important;
}
.btn1 i {
    display: inline-flex;
    font-size: 1rem;
    padding-right: 0.rem;
    vertical-align: middle;
    line-height: 0;
}
</style>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            @if($form->response->count() > 0)
                            <tbody>
                            @php
                                $first = null;
                                $second = null;
                                $third = null;
                                $i = 0;
                            @endphp
                            @foreach ($form->response as $response)
                                @php
                                    $i++;
                                        $resp = json_decode($response->response,true);
                                        if(count($resp) == 1)
                                        {
                                            $resp[''] = '';
                                            $resp[' '] = '';
                                        }
                                        elseif(count($resp) == 2)
                                        {
                                            $resp[''] = '';
                                        }
                                        $firstThreeElements = array_slice($resp, 0, 3);

                                        $thead= array_keys($firstThreeElements);
                                        $head1 = ($first != $thead[0]) ? $thead[0] : '';
                                        $head2 = (!empty($thead[1]) && $second != $thead[1]) ? $thead[1] : '';
                                        $head3 = (!empty($thead[2]) && $third != $thead[2]) ? $thead[2] : '';
                                @endphp
                                @if(!empty($head1) || !empty($head2) || !empty($head3) && $head3 != ' ')
                                    <tr>
                                        <th>{{ $head1 }}</th>
                                        <th>{{ $head2 }}</th>
                                        <th>{{ $head3 }}</th>
                                        <th>#</th>
                                    </tr>
                                @endif
                                @php
                                    $first =  $thead[0];
                                    $second =  $thead[1];
                                    $third =  $thead[2];
                                @endphp
                                <tr>
                                    @foreach(array_values($firstThreeElements) as $ans)
                                        <td>{{$ans}}</td>
                                    @endforeach
                                    <td class="Action">
                                        <div class="action-btn bg-warning ms-2">
                                            <a href="#" class="mx-3 btn1 btn-sm d-inline-flex align-items-center" data-url="{{ route('response.detail',$response->id) }}" data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title="{{__('View')}}" data-title="{{__('Response Detail')}}">
                                                <i class="fa fa-eye text-white"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td class="text-center">{{__('No data available in table')}}</td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

