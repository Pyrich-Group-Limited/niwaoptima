@extends('layouts.app')

@section('title', 'Services')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm mb-3">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Document Upload Names</h3>
                <div class="nk-block-des text-soft">
                    
                </div>
            </div><!-- .nk-block-head-content -->
            
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
<div class="row">
    <div class="col-md-12 text-right" style="padding-right: 30px;">
        <a href="{{ route('document_upload.create') }}" class="btn btn-primary"><em class="fa fa-plus"></em><span>Add New Document</span></a>
    </div>
</div>
<div class="content px-3" style="margin-bottom: 60px;">
    <div class="clearfix"></div>
   <div class="card">
    <div class="card-body p-5">
        <form method="GET" action="{{ route('document_upload.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Document Name..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4" id="order-listing123">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all">
                            </th>
                            <th>Service Name</th>
                            <th>Document Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody> @php
                        $no = 1;
                    @endphp
                        @foreach ($document_uploads  as $index =>  $document_upload)
                        <tr class="">
                            <td>
                                <input type="checkbox" class="checkbox-item" data-id="{{ $document_upload->id }}">
                            </td>
                             <td>{{ ucwords(strtolower($document_upload->service->name ?? 'NILL')) }}</td>
                                <td>{{ $document_upload->name }}</td>
                                <td>
                                    <a style="padding-right:10px;" href="{{ route('document_upload.edit', $document_upload->id) }}" title="Edit Service"><span
                                            class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span></a>
                                    

                                            <a title="Terminate Item" style="cursor: pointer;"
                                            onclick="confirmDelete({{ $document_upload->id }});">
                                            <span class="nk-menu-icon text-danger eg-swal-av3"><em class="fa fa-trash"></em></span>
                                        </a>
                                        <form id="delete-item-form-{{ $document_upload->id }}" action="{{ route('document_upload.destroy', $document_upload->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button id="delete-selected-btn" class="btn btn-outline-primary" onclick="deleteSelected()">Delete Selected</button>

            </div>
            <div>{{ $document_uploads->appends(['search' => request('search')])->links() }}</div>
        </div></div> 
        </div>

@endsection


@push('page_scripts')
    <script>
        function confirmDelete(itemId) {
    var confirmation = confirm("Are you sure you want to delete this item?");
    if (confirmation) {
        document.getElementById('delete-item-form-' + itemId).submit();
    } else {
        // Do nothing or handle cancellation
    }
}

document.getElementById("check-all").addEventListener("change", function () {
        var checkboxes = document.getElementsByClassName("checkbox-item");
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });

    function deleteSelected() {
        var checkboxes = document.getElementsByClassName("checkbox-item");
        var selectedIds = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedIds.push(checkboxes[i].getAttribute("data-id"));
            }
        }
        if (selectedIds.length > 0) {
            // Show a confirmation dialog
            var confirmation = confirm("Are you sure you want to delete the selected items?");
            if (confirmation) {
                $('#loader-demo-box1').show();
                // If the user confirms, make an AJAX request to delete the selected items
                $.ajax({
                    url: "{{ route('delete.selected.document.uploads') }}",
                    type: 'DELETE',
                    data: {
        _token: '{{ csrf_token() }}',
        selectedIds: selectedIds
    },
                    success: function(response) {
    $('#loader-demo-box1').hide();
    if (response.success) {
        console.log(response.message);
        //alert(response.message);
        // Optionally, reload the page or update the UI after deletion
        // Reload the page after successful deletion
        location.reload();
    } else {
        console.error(response.message);
        alert("Error: " + response.message);
        // Optionally, display the error message to the user
    }
},
error: function(xhr, status, error) {
    $('#loader-demo-box1').hide();
    console.error(error);
    alert("Error: " + error);
    // Handle errors
}
                });
            }
        } else {
            alert("Please select at least one item to delete.");
        }
    }
    </script>
@endpush