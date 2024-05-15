@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="card-title">Create Form</h4>
    <form method="POST" action="{{ route('form.store') }}">
        @csrf
        <div class="mb-3">
            <label for="form_name" class="form-label">Form Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div id="form_fields">
            <!-- Dynamically generated form fields will be inserted here -->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Template for dynamically generating form fields -->
<template id="form_field_template">
    <div class="mb-3">
        <label for="field_##INDEX##" class="form-label">Field Name</label>
        <input type="text" name="fields[##INDEX##][name]" id="field_##INDEX##" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="field_##INDEX##_type" class="form-label">Field Type</label>
        <select name="fields[##INDEX##][type]" id="field_##INDEX##_type" class="form-select" required>
            <option value="text">Text Input</option>
            <option value="textarea">Text Area</option>
            <option value="checkbox">Checkbox</option>
            <option value="radio">Radio Button</option>
            <option value="select">Select Menu</option>
            <option value="file">File Input</option>
            <option value="password">Password Input</option>
            <option value="email">Email Input</option>
            <option value="number">Number Input</option>
            <option value="range">Range Input</option>
            <option value="date">Date Input</option>
            <option value="time">Time Input</option>
            <option value="color">Color Picker</option>
            <option value="hidden">Hidden Input</option>
            <option value="button">Button</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="field_##INDEX##_value" class="form-label">Field Value</label>
        <input type="text" name="fields[##INDEX##][value]" id="field_##INDEX##_value" class="form-control">
    </div>
    <div class="mb-3">
        <label for="field_##INDEX##_placeholder" class="form-label">Field Placeholder</label>
        <input type="text" name="fields[##INDEX##][placeholder]" id="field_##INDEX##_placeholder" class="form-control">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="fields[##INDEX##][required]" id="field_##INDEX##_required" class="form-check-input">
        <label for="field_##INDEX##_required" class="form-check-label">Required</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="fields[##INDEX##][disabled]" id="field_##INDEX##_disabled" class="form-check-input">
        <label for="field_##INDEX##_disabled" class="form-check-label">Disabled</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="fields[##INDEX##][readonly]" id="field_##INDEX##_readonly" class="form-check-input">
        <label for="field_##INDEX##_readonly" class="form-check-label">Readonly</label>
    </div>
    <div class="mb-3">
        <label for="field_##INDEX##_maxlength" class="form-label">Maxlength</label>
        <input type="number" name="fields[##INDEX##][maxlength]" id="field_##INDEX##_maxlength" class="form-control">
    </div>
    <!-- Add more form field properties based on your requirements -->
    <hr>
</template>


<script>
    let fieldIndex = 0;

    function addFormField() {
        const template = document.getElementById('form_field_template');
        const clone = template.content.cloneNode(true);
        const formFieldsDiv = document.getElementById('form_fields');
        const templateHtml = clone.innerHTML.replace(/##INDEX##/g, fieldIndex);
        const templateElement = document.createElement('div');
        templateElement.innerHTML = templateHtml.trim();
        formFieldsDiv.appendChild(templateElement.firstChild);
        fieldIndex++;
    }
</script>
@endsection