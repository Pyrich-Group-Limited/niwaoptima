@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-6">
            <div class="form-group">

                <label for="">The Type</label>
                <select class="form-control form-select" name="type" id="">
                    <option value="{{ $procurement->type }}">{{ $procurement->type }}</option>
                </select>
            </div>
        </div>
        <div class="col-6">

            <div class="form-group">

                <label for="">Title</label>
                <input type="text" class="form-control" value="{{ $procurement->title }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row targetDiv" id="div0">
            <div class="col-md-12">
                <div id="group1" class="fvrduplicate">
                    <div class="row entry">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label>ITEMS </label>
                                <input class="form-control form-control-sm" name="item[]"
                                    type="text" placeholder="">
                            </div>
                        </div>

                        <div class="col-4 col-md-5">
                            <div class="form-group">
                                <label>QUANTITY </label>
                                <input class="form-control form-control-sm quantity"
                                    name="quantity[]" type="number" placeholder=" ">
                            </div>
                        </div>


                        <div class="col-4 col-md-5">
                            <div class="form-group">
                                <label>RATE</label>
                                <input class="form-control form-control-sm rate"
                                    name="rate[]" type="number" placeholder="">
                            </div>
                        </div>



                        <div class="col-4 col-md-5">
                            <div class="form-group">
                                <label>AMOUNT</label>
                                <input class="form-control form-control-sm amount" readonly
                                    name="amount[]" type="text" placeholder="">
                            </div>
                        </div>



                        <div class="col-xs-12 col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-success btn-sm btn-add">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                $('#exampleModal').on('hidden.bs.modal', function() {
                                    // Reset modal content when modal is closed
                                    $(this).find('form')[0].reset();
                                });

                                // Add event listener for changes in quantity and rate inputs
                                $(document).on('input', '.quantity, .rate', function() {
                                    updateAmounts(); // Recalculate amounts
                                });

                                // Function to recalculate amounts for all rows
                                function updateAmounts() {
                                    $('.entry').each(function() {
                                        var quantity = $(this).find('.quantity').val();
                                        var rate = $(this).find('.rate').val();
                                        var amount = parseFloat(quantity) * parseFloat(rate);
                                        if (!isNaN(amount)) {
                                            $(this).find('.amount').val(amount.toFixed(2));
                                        } else {
                                            $(this).find('.amount').val('');
                                        }
                                    });
                                }

                                // Event listener for form submission
                                $('#submitForm').click(function() {
                                    // Perform form validation here if needed
                                    // If form is valid, submit the form
                                    // Otherwise, prevent submission
                                    validateForm()
                                });
                            });
                        </script>



<script>
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            var controlForm = $(this).closest('.fvrduplicate'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<i class="fa fa-minus" aria-hidden="true">-</i>');
        }).on('click', '.btn-remove', function(e) {
            $(this).closest('.entry').remove();
            return false;
        });
    });
</script>



<script>
    const inputgroup = document.querySelector('.atp');
    inputgroup.class = 'row';

    function addmore() {
        const kpibox = document.createElement('input');
        const krabox = document.createElement('input');
        const jobbox = document.createElement('input');
        const timebox = document.createElement('input');
        kpibox.type = "text";
        kpibox.name = 'key_performance_indicators';
        kpibox.class = 'form-control';
        kpibox.placeholder = 'yea';

        krabox.type = "text";
        krabox.name = 'key_result_area';
        krabox.class = 'form-control';
        krabox.placeholder = 'key result area';

        jobbox.type = "text";
        jobbox.name = 'job_objective';
        jobbox.class = 'form-control';
        jobbox.placeholder = 'job objective';

        timebox.type = "text";
        timebox.name = 'timeline';
        timebox.class = 'form-control';
        timebox.placeholder = 'timeline';

        const div = document.createElement('div');
        div.class = 'col-3';

        inputgroup.appendChild(div);
        div.appendChild(kpibox);
        div.appendChild(timebox);
        div.appendChild(jobbox);
        div.appendChild(krabox);
    }
</script>

</div>
@endsection
