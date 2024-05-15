@extends('layouts.app')

@section('content')
@include('layouts.asset')
<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-8">
                <h3 class=""><?php echo trans('lang.assetdetail');?></h3>
            </div>
            <div class="col-md-4 text-md-right">
                                  <a target="_blank" href="{{url('assetlist/generatelabel', $id)}}" id="btndetail" class="btn btn-sm btn-fill btn-primary"><i
                                        class="ti-info"></i> <?php echo trans('lang.generatelabel');?></a>
                                <a href="{{ url('assetlist') }}" id="btndetail"  class="btn btn-sm btn-fill btn-warning"><i
                                        class="ti-info"></i> <?php echo trans('lang.backtoasset');?></a>
                           
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="hidden" value="{{ $id }}" name="id" id="id" />
                                <p class="title-detail font-bold"> <span class="assetname"></span> (<span
                                        class="assettag"></span>)</p>
                                <p class="assetdetail"><span class="assettype"></span>&bull;<span
                                        class="assetstatus"></span></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details"
                                            role="tab" aria-controls="details"
                                            aria-selected="true"><?php echo trans('lang.details');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#components"
                                            role="tab" aria-controls="components"
                                            aria-selected="false"><?php echo trans('lang.components');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#maintenance"
                                            role="tab" aria-controls="maintenance"
                                            aria-selected="false"><?php echo trans('lang.maintenances');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history"
                                            role="tab" aria-controls="history"
                                            aria-selected="false"><?php echo trans('lang.history');?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="details" role="tabpanel"
                                        aria-labelledby="details-tab">
                                        <div class="row">
                                            <div class="col-md-9 pt-3">
                                                <table class="table table-hover" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.type');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assettype2"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.status');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetstatus"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.serial');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetserial"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.brand');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetbrand"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.purchasedate');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetpurchasedate"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.cost');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetcost"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.warranty');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetwarranty"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.location');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetlocation"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.supplier');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetsupplier"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.updatedat');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetupdated"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.createdat');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetcreated"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.description');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetdescription"></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-3 pt-2 text-center">
                                                <img width="250" class="img-responsive assetimage" src="" />
                                                <div class="row">
                                                    <div class="col-md-3 p-2 border">
                                                        <div class="">
                                                            <div class="assetbarcode"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="components" role="tabpanel"
                                        aria-labelledby="components-tab">
                                         <div class="table-responsive  pt-4">
                                         <table id="datacomponent" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.picture');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.brand');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.avalaiblequantity');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.picture');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.brand');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.avalaiblequantity');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>


                                         </div>
                                    </div>
                                    <div class="tab-pane fade" id="maintenance" role="tabpanel"
                                        aria-labelledby="maintenance-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="datamaintenance" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.supplier');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.startdate');?></th>
                                                        <th><?php echo trans('lang.enddate');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.supplier');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.startdate');?></th>
                                                        <th><?php echo trans('lang.enddate');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="history" role="tabpanel"
                                        aria-labelledby="history-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="datahistory" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.employee');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.employee');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    
       
    </div>
</section>

<script>
$(document).ready(function() {

    var id = $("#id").val();
    $.ajax({
        type: "POST",
        url: "{{ url('assetbyid')}}",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $(".assetname").html(data.message.assetname);
            $(".assettag").html(data.message.assettag);
            $(".assettype").html(data.message.type);
            $(".assetsupplier").html(data.message.supplier);
            $(".assetstatus").html(data.assetstatus);
            $(".assetbrand").html(data.message.brand);
            $(".assettype2").html(data.message.type);
            $(".assetpurchasedate").html(data.assetpurchasedate);
            $(".assetcost").html(data.assetcost);
            $(".assetwarranty").html(data.assetwarranty);
            $(".assetdescription").html(data.message.assetdescription);
            $(".assetcreated").html(data.assetcreated_at);
            $(".assetupdated").html(data.assetupdated_at);
            $(".assetserial").html(data.message.serial);
            $(".assetlocation").html(data.message.location);
            $(".assetbarcode").html(data.assetbarcode);


            $(".assetimage").attr("src", data.assetimage);
        }
    });
    



    //maintenance data
    $('#datamaintenance').DataTable({
        ajax: {
        url: "{{ url('maintenanceassetsbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            },
        },
       
        columns: [{
                data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },

            {
                data: 'asset'
            },
            {
                data: 'supplier'
            },
            {
                data: 'type'
            },
            {
                data: 'startdate'
            },
            {
                data: 'enddate'
            }
        ],
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            }
        ]
    });


    //component data
    $('#datacomponent').DataTable({
        ajax: {
        url: "{{ url('componentassetbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            
            {
                data: 'pictures'
            },
           
            {
                data: 'name'
            },
            {
                data: 'type'
            },
            {
                data: 'brand'
            },
            {
                data: 'quantity'
            },
            {
                data: 'avalaiblequantity'
            },
           
        ],
       
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.component_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            }
        ]
    });


    //history data
    $('#datahistory').DataTable({
        ajax: {
        url: "{{ url('historyassetbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            
            {
                data: 'date'
            },
           
            {
                data: 'assetname'
            },
            {
                data: 'employeename'
            },
            {
                data: 'status'
            },
            
           
        ],
       
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.history_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ]
                }
            }
        ]
    });
});
</script>
@endsection