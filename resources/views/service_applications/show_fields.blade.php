<!-- Service Id Field -->
<div class="col-sm-6">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{{ $serviceApplication->theservice ? $serviceApplication->theservice->name : '' }}</p>
</div>

<!-- Application Form Payment Status Field -->
<div class="col-sm-6">
    {!! Form::label('application_form_payment_status', 'Application Form Payment Status:') !!}
    <p>{{ $serviceApplication->application_form_payment_status ? 'Paid' : 'Not Paid' }}</p>
</div>

<!-- Date Of Inspection Field -->
<div class="col-sm-6">
    {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
    <p>{{ $serviceApplication->date_of_inspection }}</p>
</div>

<!-- Service Type Id Field -->
<div class="col-sm-6">
    {!! Form::label('service_type_id', 'Service Type:') !!}
    <p>{{ $serviceApplication->processingType ? $serviceApplication->processingType->name : '' }}</p>
</div>


<!-- User Id Field -->
<div class="col-sm-6">
    {!! Form::label('user_id', 'Client:') !!}
    <p>{{ $serviceApplication->employer ? $serviceApplication->employer->company_name : '' }}</p>
</div>


{{-- @if ($serviceApplication->current_step == 5)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Documents Approval</h3>
        {!! Form::open([
            'route' => ['application.final.documents.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
        <div class="form-group col-sm-6 mb-5">
            {!! Form::label('mse_document_verification_comment', 'Comments:') !!}
            {!! Form::textarea('mse_document_verification_comment', $serviceApplication->mse_document_verification_comment, [
                'class' => 'form-control',
                'id' => 'mse_document_verification_comment',
            ]) !!}
        </div>
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endif --}}
@php 
$app_fee = \App\Models\Payment::where('payment_status', 1)->where('approval_status', 0)->where('payment_type', 1)->where("employer_id", $serviceApplication->user_id)->latest()->first();
@endphp
@if(!empty($app_fee))
@if ($serviceApplication->current_step == 4)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Application Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.fee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
       
        <p>Amount Paid: <b>{{ $app_fee->amount ?? '' }} </b></p>
        <!-- Date Of Inspection Field -->
        {{-- <div class="form-group col-sm-6">
            {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
            {!! Form::date('date_of_inspection', null, ['class' => 'form-control', 'id' => 'date_of_inspection']) !!}
        </div> --}}

        @push('page_scripts')
            <script type="text/javascript">
                //$('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve or decline application form fee')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            @endcan
            {{-- {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!} --}}
        </div>
        {!! Form::close() !!}
    </div>
@endif
@endif
@php 
$pro_fee = \App\Models\Payment::where('payment_status', 1)->where('approval_status', 0)->where('payment_type', 2)->where("employer_id", $serviceApplication->user_id)->latest()->first();
@endphp
@if(!empty($pro_fee))
@if ($serviceApplication->current_step == 61)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Processing Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.processingfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
       
        <p>Amount Paid: <b>{{ $pro_fee->amount ?? '' }} </b></p>
        <!-- Date Of Inspection Field -->
        {{-- <div class="form-group col-sm-6">
            {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
            {!! Form::date('date_of_inspection', null, ['class' => 'form-control', 'id' => 'date_of_inspection']) !!}
        </div> --}}

        @push('page_scripts')
            <script type="text/javascript">
                //$('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve or decline processing fee')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
            @endcan
        </div>
        {!! Form::close() !!}
    </div>
@endif
@endif

@php 
$insp_fee = \App\Models\Payment::where('payment_status', 1)->where('approval_status', 0)->where('payment_type', 3)->where("employer_id", $serviceApplication->user_id)->latest()->first();
@endphp
@if(!empty($insp_fee))
@if ($serviceApplication->current_step == 8)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Set inspection Date & Comments</h3>
        {!! Form::open([
            'route' => ['application.inspectionfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
{{-- <p>Amount Paid: <b>{{ $insp_fee->amount ?? '' }} </b></p> --}}
        <!-- Date Of Inspection Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('date_of_inspection', 'Date Of Inspection:') !!}
            {!! Form::date('date_of_inspection', null, ['class' => 'form-control', 'id' => 'date_of_inspection']) !!}
        </div>
        <div class="form-group col-sm-6 mb-5">
            {!! Form::label('comments_on_inspection', 'Comments:') !!}
            {!! Form::textarea('comments_on_inspection', $serviceApplication->comments_on_inspection, [
                'class' => 'form-control',
                'id' => 'comments_on_inspection',
            ]) !!}
        </div>
        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve or decline inspection fee')
            {!! Form::button('SUBMIT', [
                'type' => 'submit',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            @endcan
            {{-- {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!} --}}
        </div>
        {!! Form::close() !!}
    </div>
@endif
@endif

@if ($serviceApplication->current_step == 9)
<div class="col-sm-12">
    <!-- Documents Approval -->
    <h3>Inspection Status Report</h3>
    {!! Form::open([
        'route' => ['application.inspection.status', $serviceApplication->id],
        'method' => 'post',
        'id' => 'approvalForm',
        'enctype' => 'multipart/form-data',
    ]) !!}
    <div class="form-group col-sm-6 mb-5">
        {!! Form::label('inspection_report', 'Upload Report (.pdf only):') !!}
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('inspection_report', ['class' => 'form-control', 'required', 'id' => 'fileInput23', 'accept' => '.pdf']) !!}
            </div>
        </div>
    </div>
    <input type="hidden" name="selected_status" id="selected_status_input">
    <div class="btn-group">
        @can('approve or decline inspection fee')
            {!! Form::button('SUBMIT', [
                'type' => 'submit',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {{-- Uncomment the following lines if you want to add a Decline button --}}
            {{-- {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!} --}}
        @endcan
    </div>
    {!! Form::close() !!}
</div>

@endif


@if ($serviceApplication->current_step == 10)
<div class="col-sm-12">
    
    {!! Form::open([
        'route' => ['application.equipmemt.invoice', $serviceApplication->id],
        'method' => 'post',
        /* 'class' => 'repeater', */
        'id' => 'approvalFormData',
    ]) !!}
    <h4>Equipment Fees</h4><br/>
    <div class="form-group col-sm-6">
        {!! Form::label('monitoring_fees1', 'Select Monitoring Fee') !!}
        <select class="form-control" name="monitoring_fees1" id="monitoring_fees1" required>
            <option value="0">Select Monitoring Fee</option>
            @forelse ($monitoring_fees as $monitoring_fee)
                <option value="{{ $monitoring_fee->amount }}">{{ $monitoring_fee->name }}</option>
            @empty
                <option value="0">No Monitoring Fee</option>
            @endforelse
        </select>
    </div>
    
    <div class="form-group col-sm-6">
        <label>Custom Amount (Optional)</label>
        <input class="form-control" id="custom_amount" name="custom_amount" type="number" value="">
 </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('expiry_date', 'Expiry Date:') !!}
        {!! Form::date('expiry_date', null, ['class' => 'form-control', 'id' => 'expiry_date', 'required' => 'required']) !!}
    </div>
    @push('page_scripts')
        <script type="text/javascript">
            $('#expiry_date').datepicker()
        </script>
    @endpush
    <input type="hidden" name="payment_type" id="payment_type" value="5">
    <input type="hidden" name="service_application_id" value="{{ $serviceApplication->id }}">
    <input type="hidden" name="demand_total" id="demand_total" value="">

    <div class="form-group row col-sm-12" style="">
        <div class="row col-sm-12">
            <div class="form-group col-sm-3 dd1">
                <input class="form-control" required="" id="m_amount" name="price[]" type="hidden" value="">
         </div>
            <div class="form-group col-sm-3 dd2">
                <input class="form-control" required="" name="qty[]" type="hidden" value="1">
             </div>
            
        </div>
    </div>
    <div class="form-group row col-sm-12" style="">
        <div class="row col-sm-12">
            <div class="form-group col-sm-3 dd3">
                <input class="form-control" required="" id="custom_amount3" name="price[]" type="hidden" value="">
         </div>
            <div class="form-group col-sm-3 dd4">
                <input class="form-control" required="" name="qty[]" type="hidden" value="1">
             </div>
            
        </div>
    </div>
    <div class="row col-sm-12" id="equipment-list">
        <!-- Existing equipment fields will be appended here -->
    </div>

    <!-- Add Button -->
    @can('generate equipment invoice')
    <div class="form-group col-sm-3 mt-5">
        <button type="button" class="btn btn-primary" id="add-new-btn">Add New</button>
    </div>
    @endcan

    <div class="form-group col-sm-3 mt-5">
        <span>Monitoring Fee: ₦<span id="monitoring_fees2"></span></span><br/><br/>
        <span>Custom Amount: ₦<span id="custom_amount2">0.00</span></span><br/><br/>
        <span class="total-price"></span>
        <input type="hidden" class="total-price-input" name="total_price" id="total_price">
    </div>
    
    <div id="equipments"></div>
    @can('generate equipment invoice')
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Generate Invoice</button>
    </div>
    @endcan
    {!! Form::close() !!}
</div>

<div class="form-group row col-sm-12 equipment-item" id="equipment-template" style="display: none;">
    <div class="row col-sm-12">
        <div class="form-group col-sm-3">
            {!! Form::label('equipment', 'Equipment:') !!}
            {!! Form::select('price[]', ['' => '', ...$equipment_and_fees], null, ['class' => 'form-control price-select', 'required']) !!}
        </div>
        <div class="form-group col-sm-3">
            {!! Form::label('qty', 'Qty/Days/Trip:') !!}
            {!! Form::number('qty[]', null, ['class' => 'form-control qty-input', 'required']) !!}
            <div>
                <p class="price"><span class="sub-price"></span></p>
            </div>
        </div>
        <!-- Delete Button -->
        {{-- <div class="form-group col-sm-3">
            <button type="button" class="btn btn-danger delete-btn">Delete</button>
        </div> --}}
    </div>
</div>
@endif

@php 
$equip_fee = \App\Models\Payment::where('payment_status', 1)->where('approval_status', 0)->where('payment_type', 5)->where("employer_id", $serviceApplication->user_id)->latest()->first();
@endphp
@if(!empty($equip_fee))
@if ($serviceApplication->current_step == 14)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Equipment Fee Payment Approval</h3>
        {!! Form::open([
            'route' => ['application.equipmentfee.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}
           <p>Amount Paid: <b>{{ $equip_fee->amount ?? '' }} </b></p>
        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve or decline equipment fee')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
            @endcan
        </div>
        {!! Form::close() !!}
    </div>

    
@endif
@endif

@if ($serviceApplication->current_step == 141)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>HOD Marine Approval</h3>
        {!! Form::open([
            'route' => ['application.areaofficer.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve service application as hod marine')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
            @endcan
        </div>
        {!! Form::close() !!}
    </div>
@endif

@if ($serviceApplication->current_step == 142)
    <div class="col-sm-12">
        <!-- Documents Approval -->
        <h3>Area Manager Approval</h3>
        {!! Form::open([
            'route' => ['application.hodmarine.approval', $serviceApplication->id],
            'method' => 'post',
            'id' => 'approvalForm',
        ]) !!}

        @push('page_scripts')
            <script type="text/javascript">
                $('#date_of_inspection').datepicker()
            </script>
        @endpush
        <input type="hidden" name="selected_status" id="selected_status_input">
        <div class='btn-group'>
            @can('approve service application as area officer')
            {!! Form::button('Approve', [
                'type' => 'button',
                'class' => 'btn btn-success btn-xs1',
                'onclick' => "setSelectedStatus('approve')",
            ]) !!}
            {!! Form::button('Decline', [
                'type' => 'button',
                'class' => 'btn btn-danger btn-xs1',
                'onclick' => "setSelectedStatus('decline')",
            ]) !!}
            @endcan
        </div>
        {!! Form::close() !!}
    </div>
@endif

<script type="text/javascript">
    function setSelectedStatus(status) {
        document.getElementById('selected_status_input').value = status;
        let confirmation = confirm("Are you sure you want to proceed?");
        if (confirmation) {
            document.getElementById('approvalForm').submit(); // Submit the form
        }
    }
</script>

@push('page_scripts')

    <script>
        $(document).ready(function() {
            $('#monitoring_fees1').change(function () {
        var monitoring_fee1 = $(this).val();
        $('#monitoring_fees2').html(monitoring_fee1);
        $('#m_amount').val(monitoring_fee1);
        updatePrice();
            });
            $('#custom_amount').on('keyup', function() {
        var custom_amount = $(this).val();
        
        $('#custom_amount2').html(custom_amount);  // Update HTML content
        $('#custom_amount3').val(custom_amount);   // Update input field value
        updatePrice();
    });

            // Function to update the price and quantity data
            function updateEquipmentData() {
    var equipmentData = [];
    
    // Iterate through each equipment item
    $('.equipment-item').each(function () {
    var $equipmentItem = $(this);
    var price = parseFloat($equipmentItem.find('.price-select').val()) || 0;
    var qty = parseFloat($equipmentItem.find('.qty-input').val()) || 0;
    var m_price = parseFloat($('#m_amount').val()) || 0; // Assuming m_amount is a numeric input
    var c_price = parseFloat($('#custom_amount3').val()) || 0; // Assuming custom_amount3 is a numeric input

    // Calculate total price
    var all_price = c_price + m_price;

    // Add all_price to the price
    price += all_price;

    // Push price and quantity values to the equipmentData array
    equipmentData.push({ price: price, qty: qty });
});

    return equipmentData;
}


    $('#add-new-btn').click(function() {
        // Clone the template and append it to the equipment list
        $('#equipment-template').clone().appendTo('#equipment-list').removeAttr('id').show();
    });

    // Listen for changes in the select and number elements
    $('#equipment-list').on('input', 'select, input[type="number"]', function() {
        updatePrice();

        // Remove all existing equipment-template elements
        //$('#equipments').clear();

        var equipmentData = updateEquipmentData();

            // Convert equipment data to JSON
            var equipmentJson = JSON.stringify(equipmentData);

            $('#equipments').empty();
            // Add JSON data to a hidden input field
            $('<input>').attr({
                type: 'hidden',
                name: 'equipment',
                value: equipmentJson
            }).appendTo($('#equipments'));
    });

    // Form Submit Event
    /* $('#approvalFormData').submit(function (event) {
        event.preventDefault(); // Prevent default form submission
            // Get equipment data
            var equipmentData = updateEquipmentData();

            // Convert equipment data to JSON
            var equipmentJson = JSON.stringify(equipmentData);

            // Add JSON data to a hidden input field
            $('<input>').attr({
                type: 'hidden',
                name: 'equipment',
                value: equipmentJson
            }).appendTo($(this));

            // Manually submit the form
        $(this).submit();
        
        }); */

});

function updatePrice() {
    var m_price = $('#m_amount').val() || 0;
    var c_price = $('#custom_amount3').val() || 0;
    var totalPrice = parseFloat(m_price);//0;
    var totalcPrice = parseFloat(c_price);

    var totalPrices = totalPrice + totalcPrice;

    // Iterate through each equipment item
    $('#equipment-list .equipment-item').each(function() {
        var price = $(this).find('.price-select').val() || 0;
        var quantity = $(this).find('.qty-input').val() || 0;
        var subPrice = price * quantity;

        // Update the corresponding p tag with the calculated sub-price
        $(this).find('.sub-price').text('Price: ₦' + subPrice);

        // Add the sub-price to the total
        totalPrices += subPrice;
    });

    // Update the total price
    $('.total-price').text('Total Price: ₦' + totalPrices);
    $('.total-price-input').val(totalPrices);
}

    </script>
    <script>
        document.getElementById('fileInput23').addEventListener('change', function() {
            const file = this.files[0];
            const maxSize = 1048576; // 1MB in bytes
            const allowedFormats = ['application/pdf'];
            
            if (file) {
                if (!allowedFormats.includes(file.type)) {
                    alert('Please select a valid file format PDF.');
                    this.value = ''; // Clear the file input
                } else if (file.size > maxSize) {
                    alert('File size exceeds the maximum limit of 1MB.');
                    this.value = ''; // Clear the file input
                }
            }
        });
    </script>
@endpush
