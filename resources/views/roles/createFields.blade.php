<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('permissions[]', 'Permissions:') !!}
    <div class="flex flex-wrap justify-start mb-4">
        <div class="row">


            @foreach ($groupedPermissions as $groupName => $permissions)
            <div class="row">
                <h4 class="mb-3 mt-5">{{ $groupName }}</h4>
                <div class="col-12 mb-3">
                    <a href="#" class="check-all-link" data-group="{{ $groupName }}">Select/Hide All</a> <!-- Add Check All link -->
                </div>
                @foreach ($permissions as $permission)
                    <div class="col-6 mb-3">
                        {!! Form::checkbox('permissions[]', $permission->id, $permission->assigned, [
                            'class' => 'form-checkbox h-4 w-4 ' . $groupName, // Added group name as a class
                        ]) !!}
                        <span class="">{{ $permission->name }}</span>
                    </div>
                @endforeach
            </div>
        @endforeach
        

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
            $('.check-all-link').click(function(e) {
                e.preventDefault();
                var groupName = $(this).data('group');
                var groupCheckboxes = $('.' + groupName);

                // Check if any checkbox in the group is checked
                var anyChecked = groupCheckboxes.is(':checked');

                // Toggle the checked state of all checkboxes in the group
                groupCheckboxes.prop('checked', !anyChecked);
            });
        });
    </script>
    
</div>
