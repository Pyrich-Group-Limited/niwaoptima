<div class="row col-sm-12" data-repeater-list="form_fields">
    <div class="form-group row col-sm-12" data-repeater-item>
        <!-- Field Name Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('field_name', 'Field Name:') !!}
            {!! Form::text('field_name', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <!-- Field Type Id Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('field_type_id', 'Field Type:') !!}
            {!! Form::select('field_type_id', $field_types, null, ['class' => 'form-control', 'required']) !!}
        </div>

        <!-- Field Label Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('field_label', 'Field Label:') !!}
            {!! Form::text('field_label', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <!-- Field Options Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('field_options', 'Field Options:') !!}
            {!! Form::text('field_options', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Is Required Field -->
        <div class="form-group col-sm-3">
            <div class="form-check">
                {!! Form::hidden('is_required', 0, ['class' => 'form-check-input']) !!}
                {!! Form::checkbox('is_required', '1', null, ['class' => 'form-check-input']) !!}
                {!! Form::label('is_required', 'Is Required', ['class' => 'form-check-label']) !!}
            </div>
        </div>

        <!-- Add Button -->
        <div class="form-group col-sm-3">
            {!! Form::button('Delete', ['class' => 'btn btn-danger', 'data-repeater-delete']) !!}
        </div>

    </div>

</div>


<!-- Add Button -->
<div class="form-group col-sm-12">
    {!! Form::button('Add New', ['class' => 'btn btn-success', 'data-repeater-create']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const repeater = $('.repeater').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: true,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {},
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function() {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.
                ready: function(setIndexes) {

                },
                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: true
            });

            const values = <?php echo !empty(old('form_field')) ? json_encode(old('form_field')) : $form->formFields; ?>

            repeater.setList(values);
        });
    </script>
@endpush
