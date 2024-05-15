<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- Permissions Field -->
<div class="col-sm-12">
    {!! Form::label('permissions', 'Permissions:') !!}
    {{-- <div class="row">
        <p>
            @foreach ($role_permissions as $permission)
                <div class="col-sm-6">
                    <li class="text-gray-800 list-disc">{{ $permission->name }}</li>
                </div>
            @endforeach
        </p>
    </div> --}}
    @foreach ($groupedPermissions as $groupName => $permissions)
        <div class="row">
            <h4 class="mb-3 mt-5">{{ $groupName }}</h4>
            @foreach ($permissions as $permission)
                <div class="col-sm-6">
                    <li class="text-gray-800 list-disc">{{ $permission->name }}</li>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
