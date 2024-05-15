@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    CLAIMS & COMPENSATIONS 
                    </h1>
                    
                
                </div>
                <div class="card">
                    <div class="form-group col-sm-6">
              
                    

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
        <div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        
        <div class="card">
            <form class="form" action="{{ route('ecs_number') }}" method="post">
                @csrf
                <div class="form-group my-4">

                    <label class="form-label">ENTER ECS NUMBER:</label>
                        <input class="form-control mt-3" type="text" name="ecs_number" placeholder="ECS Number">
                        <button class="btn btn-primary mt-6" type="submit">Search</button>
                </div>
            </form>

        </div>
    </div>
@endsection
