@extends('layouts.app')

@section('title', 'Document Categories')


@push('styles')
@endpush


@section('content')
{{-- @include('layouts.messages') --}}
    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Incoming File Indexing</h3>
                <div class="row">
                <div class="col-md-12">
                    @can("create files")
                    
                    <a href="{{ route('incoming_documents_category.create') }}" class="btn btn-primary float-end" ><em
                        class="fa fa-user-add"></em> <span>Add New File</span></a>
                    @endcan
                </div>
                </div>
            </div><!-- .nk-block-head-content -->
           <!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="card">
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4" id="document-category">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>File No.</th>
                        <th>Subject</th>
                        <th>Total Documents</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($incoming_documents_categories as $index => $incoming_documents_category)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Use $index + 1 as the serial number -->
                            <td>{{ $incoming_documents_category->department ? $incoming_documents_category->department->name.' / ' : '' }}{{ $incoming_documents_category->name }}</td>
                            <td>{{ $incoming_documents_category->description }}</td>
                            <td>{{ $incoming_documents_category->documents()->count() ?? 'N/A' }}</td>
                            <td>
                                <a style="padding-right:10px;" href="{{ route('incoming_documents_category.edit', $incoming_documents_category->id) }}" title="Edit Document Category">
                                    <span class="nk-menu-icon text-info"><em class="fa fa-edit"></em></span>
                                </a>
                               

                                {{-- <a href="#" title="Terminate document category" style="cursor: pointer;"
                                onclick="confirmDelete({{ $incoming_documents_category->id }})">
                                            <span class="nk-menu-icon text-danger eg-swal-av3">
                                                <em class="fa fa-trash"></em>
                                            </span>
                                        </a> --}}
                                        
                                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
                        </div>
        </div> </div><!-- .card-preview -->
        <!-- JavaScript -->
   {{--  <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script> --}}
         <script>
            /* (function($) {
                'use strict';
                $(function() {
                    $('#order-listing1').DataTable({
                        "aLengthMenu": [
                            [5, 10, 15, -1],
                            [5, 10, 15, "All"]
                        ],
                        "iDisplayLength": 10,
                        "language": {
                            search: ""
                        },
                        "columnDefs": [ // Add this to specify column rendering
                            { "orderable": false, "targets": 0 } // Disable sorting for the first column
                        ]
                    });
                    $('#order-listing1').each(function() {
                        var datatable = $(this);
                        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                        search_input.attr('placeholder', 'Search');
                        search_input.removeClass('form-control-sm');
                        // LENGTH - Inline-Form control
                        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                        length_sel.removeClass('form-control-sm');
                    });
                });
            })(jQuery); */

            function confirmDelete(id) {
    // Show confirmation dialog
    if (confirm('Are you sure you want to delete this item?')) {
        // Send AJAX request
        $.ajax({
            url: '/documents-category/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the page or update UI as needed
            },
            error: function(xhr) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    }
}

        </script>
@endsection


