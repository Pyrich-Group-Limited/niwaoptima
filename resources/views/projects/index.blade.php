@extends('layouts.app')

@section('content')
    <div class="content-fluid mb-2 mx-4">
        {{-- <a href="#" data-size="lg" data-url="{{ route('projects.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create New Project') }}" class="btn btn-sm btn-primary float-end">
            <i class=" bi bi-plus"></i>
        </a> --}}
        <button type="button" class="btn btn-primary float-end" title="{{ __('Create New Project') }}" data-toggle="modal" data-target="#exampleModalLong">
            <i class=" bi bi-plus"></i>
        </button>
    </div>
    <div class="content-fluid mx-3">
        <div class="row m-750">
            @if (isset($projects) && !empty($projects) && count($projects) > 0)
                {{-- @if (isset($projects) && !empty($projects) && count($projects) < 0) --}}

                <div class="col-12">
                    <div class="row">

                        @foreach ($projects as $key => $project)
                            <div class="col-md-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-header border-0 pb-0">
                                        <div class="d-flex align-items-center">
                                            <img {{ $project->img_image }} class="img-fluid wid-30 me-2" alt="Project Name">
                                            <h5 class="mb-0"><a class="text-dark"
                                                    href="{{ route('projects.show', $project) }}">{{ $project->project_name }}</a>
                                            </h5>
                                        </div>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{-- <i class="ti ti-dots-vertical"></i> --}}
                                                    <i class=" bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                    @can('create project')
                                                        <a class="dropdown-item" data-ajax-popup="true" data-size="md"
                                                            data-title="{{ __('Duplicate Project') }}"
                                                            data-url="{{ route('project.copy', [$project->id]) }}">
                                                            <i class="ti ti-copy"></i> <span>{{ __('Duplicate') }}</span>
                                                        </a>
                                                    @endcan
                                                    @can('edit project')
                                                        <a href="#!" data-size="lg"
                                                            data-url="{{ route('projects.edit', $project->id) }}"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="{{ __('Edit Project') }}">
                                                            <i class="ti ti-pencil"></i>
                                                            <span>{{ __('Edit') }}</span>
                                                        </a>
                                                    @endcan
                                                    @can('delete project')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy', $project->id]]) !!}
                                                        <a href="#!" class="dropdown-item bs-pass-para">
                                                            <i class="ti ti-archive"></i>
                                                            <span> {{ __('Delete') }}</span>
                                                        </a>

                                                        {!! Form::close() !!}
                                                    @endcan
                                                    @can('edit project')
                                                        <a href="#!" data-size="lg"
                                                            data-url="{{ route('invite.project.member.view', $project->id) }}"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="{{ __('Invite User') }}">
                                                            <i class="ti ti-send"></i>
                                                            <span>{{ __('Invite User') }}</span>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2 justify-content-between">
                                            <div class="col-auto"><span
                                                    class="badge rounded-pill bg-{{ \App\Models\Project::$status_color[$project->status] }}">{{ __(\App\Models\Project::$project_status[$project->status]) }}</span>
                                            </div>

                                        </div>
                                        <p class="text-muted text-sm mt-3">{{ $project->description }}</p>
                                        <small>{{ __('MEMBERS') }}</small>
                                        <div class="user-group">
                                            @if (isset($project->users) && !empty($project->users) && count($project->users) > 0)
                                                @foreach ($project->users as $key => $user)
                                                    @if ($key < 3)
                                                        <a href="#" class="avatar rounded-circle avatar-sm">
                                                            <img @if ($user->avatar) src="{{ asset('/storage/uploads/avatar/' . $user->avatar) }}" @else src="{{ asset('/storage/uploads/avatar/avatar.png') }}" @endif
                                                                alt="image" data-bs-toggle="tooltip"
                                                                title="{{ $user->first_name }}">
                                                        </a>
                                                    @else
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="card mb-0 mt-3">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6
                                                        class="mb-0 {{ strtotime($project->start_date) < time() ? 'text-danger' : '' }}">
                                                        {{ \Modules\Accounting\Models\Utility::getDateFormated($project->start_date) }}
                                                    </h6>
                                                    <p class="text-muted text-sm mb-0">{{ __('Start Date') }}</p>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <h6 class="mb-0">
                                                        {{ \Modules\Accounting\Models\Utility::getDateFormated($project->end_date) }}
                                                    </h6>
                                                    <p class="text-muted text-sm mb-0">{{ __('Due Date') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center mb-0">{{ __('No Projects Found.') }}</h6>
                    </div>
                </div>
            </div>
        @endif


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => 'projects', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-body">
                    {{-- start for ai module --}}
                    @php
                        $settings = \Modules\Accounting\Models\Utility::settings();
                    @endphp
                    @if ($settings['ai_chatgpt_enable'] == 'on')
                        <div class="text-end">
                            <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm"
                                data-ajax-popup-over="true" data-url="{{ route('generate', ['project']) }}"
                                data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                                <i class="fas fa-robot"></i> <span>{{ __('Generate with AI') }}</span>
                            </a>
                        </div>
                    @endif
                    {{-- end for ai module --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('project_name', __('Project Name'), ['class' => 'form-label']) }}<span
                                    class="text-danger">*</span>
                                {{ Form::text('project_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('start_date', __('Start Date'), ['class' => 'form-label']) }}
                                {{ Form::date('start_date', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('end_date', __('End Date'), ['class' => 'form-label']) }}
                                {{ Form::date('end_date', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            {{ Form::label('project_image', __('Project Image'), ['class' => 'form-label']) }}<span
                                class="text-danger">*</span>
                            <div class="form-file mb-3">
                                <input type="file" class="form-control" name="project_image" required="">
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('client', __('Client'), ['class' => 'form-label']) }}<span
                                    class="text-danger">*</span>
                                {!! Form::select('client', $clients, null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('user', __('User'), ['class' => 'form-label']) }}<span
                                    class="text-danger">*</span>
                                {!! Form::select('user[]', $users, null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('budget', __('Budget'), ['class' => 'form-label']) }}
                                {{ Form::number('budget', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('estimated_hrs', __('Estimated Hours'), ['class' => 'form-label']) }}
                                {{ Form::number('estimated_hrs', null, ['class' => 'form-control', 'min' => '0', 'maxlength' => '8']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '50']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('tag', __('Tag'), ['class' => 'form-label']) }}
                                {{ Form::text('tag', null, ['class' => 'form-control', 'data-toggle' => 'tags']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
                                <select name="status" id="status" class="form-control main-element">
                                    @foreach (\App\Models\Project::$project_status as $k => $v)
                                        <option value="{{ $k }}">{{ __($v) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <input type="button" value="{{ __('Cancel') }}" class="btn  btn-light"
                        data-bs-dismiss="modal">
                    <input type="submit" value="{{ __('Create') }}" class="btn  btn-primary">
                </div>
                {{ Form::close() }}
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
