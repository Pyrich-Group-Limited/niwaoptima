@extends('layouts.app')

@section('title', 'Sub-Services')


@push('styles')
@endpush


@section('content')

    <div class="content-wrapper">
        {{-- <div class="components-preview wide-md mx-auto"> --}}
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="page-title">Uploaded documents</h3>
                    <div class="nk-block-des text-soft">
                        <p>List of uploaded documents</p>
                        {{-- @include('layouts.messages') --}}
                    </div>
                </div><!-- .nk-block-head-content -->
                <!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Documents Table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="datatable-init-export table" id="order-listing" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Document Name</th>
                                        <th>Document (PDF)</th>
                                        <th>Approval Status</th>
                                        <th>Date Uploaded</th>
                                        {{-- <th>Manage</th> --}}
                                    </tr>
                                </thead>
                                <tbody> @php
                                    $no = 1;
                                @endphp
                                    @foreach ($employer_documents as $employer_document)
                                        <tr>
                                            <td>@php
                                                echo $no++;
                                            @endphp</td>

                                            <td>
                                                @if (!empty($employer_document->employer))
                                                    {{ $employer_document->employer->contact_firstname }}
                                                    {{ $employer_document->employer->contact_surname }}
                                                @endif
                                            </td>

                                            <td>{{ $employer_document->title }}</td>
                                            <td>
                                                <a href="{{ 'http://ebs.eniwa.com.ng/storage/' . $employer_document->file_path }}"
                                                    target="_blank">
                                                    View PDF
                                                </a>
                                            </td>
                                            <td><span
                                                    class="badge tb-status text-{{ $employer_document->payment_status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $employer_document->payment_status == 1 ? 'APPROVED' : 'NOT APPROVED' }}</span>
                                            </td>
                                            <td>{{ $employer_document->created_at->format('F j, Y') }}</td>
                                            <td>
                                                @if ($employer_document->payment_status != 1)
                                                    <form action="{{ route('approveDocument', $employer_document->id) }}"
                                                        method="post" id="approveForm{{ $employer_document->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($employer_document->approval_status != 1)
                                                            <a href="#" title="Approve Payment"
                                                                onclick="confirmApprove({{ $employer_document->id }})">
                                                                <span class="nk-menu-icon text-primary">Approve
                                                            </a>
                                                        @endif
                                                    </form>
                                                @endif
                                            </td>

                                            <script>
                                                function confirmApprove(paymentId) {
                                                    var confirmation = window.confirm('Are you sure you want to approve this document?');

                                                    if (confirmation) {
                                                        // If the user clicks "OK" in the confirmation dialog, submit the form
                                                        document.getElementById('approveForm' + paymentId).submit();
                                                    } else {
                                                        // If the user clicks "Cancel" in the confirmation dialog, do nothing
                                                    }
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employer_documents->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->

        {{-- </div><!-- .components-preview --> --}}
    </div>

@endsection
