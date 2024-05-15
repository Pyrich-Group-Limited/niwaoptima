@extends('layouts.app')

@push('page_css')
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">Users</h4>
                </div>
                <div class="col-sm-6">

                    
                    <a class="btn btn-primary float-end" href="{{ route('users.create') }}">
                        Add User
                    </a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-3 ">
                    <form method="get" action="" class="navbar-search mr-4 ">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ \Request::get('search', '') }}"
                                class="form-control bg-light border-0 small" placeholder="@lang('Search Users list..')"
                                aria-label="Search" aria-describedby="basic-addon2">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('users.tablepage')
        </div>
    </div>
@endsection
