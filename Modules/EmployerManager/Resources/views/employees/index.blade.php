@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employees</h1>
            </div>
            
    </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        @include('employermanager::employees.table')
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        if ({
                {
                    session('success')
                }
            }) {
            Swal.fire({
                title: 'Success',
                text: '{{ session('success ') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            });
        }
    });
</script>

@endsection