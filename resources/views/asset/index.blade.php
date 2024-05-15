@extends('layouts.app')
@section('content')
    @include('layouts.asset')
    <section class="">
        <div class="content p-4">
            <div class="row pt-3">
                <div class="col-md-6">
                    <h3 class="">ASSET LIST</h3>
                </div>
                <div class="col-md-6 text-md-right pb-md-0 pb-3">
                    <button type="button" data-toggle="modal" data-target="#add" class="btn btn-sm btn-fill btn-primary"><i
                            class="fa fa-plus"></i> Add Data</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div id="checkoutsuccess" class="display-none alert alert-success">data_checkout_succeess</div>
                            <div id="checkinsuccess" class="display-none alert alert-success">data_checkin_succeess</div>
                            <div id="messagesuccess" class="display-none alert alert-success">data_added</div>
                            <div id="messagedelete" class="display-none alert alert-success">data_deleted</div>
                            <div id="messageupdate" class="display-none alert alert-success">data_updated</div>
                            <div class="table-responsive">
                                <table id="data" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th><?php echo trans('lang.picture'); ?></th>
                                            <th><?php echo trans('lang.assettag'); ?></th>
                                            <th><?php echo trans('lang.serial'); ?></th>
                                            <th><?php echo trans('lang.purchasedate'); ?></th>
                                            <th><?php echo trans('lang.cost'); ?></th>
                                            <th><?php echo trans('lang.description'); ?></th>
                                            <th><?php echo trans('lang.name'); ?></th>
                                            <th><?php echo trans('lang.type'); ?></th>
                                            <th><?php echo trans('lang.brand'); ?></th>
                                            <th><?php echo trans('lang.location'); ?></th>
                                            <th><?php echo trans('lang.action'); ?></th>
                                        </tr>
                                    </thead>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--add new data -->
        <div id="add" class="modal fade" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <form action="#" id="formadd" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal-header">

                            <h5 class="modal-title"><?php echo trans('lang.add_data'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="display-none messageexist alert alert-success"><?php echo trans('lang.tag_exist'); ?></div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.name'); ?></label>
                                    <input name="name" type="text" id="name" class=" form-control" required
                                        placeholder="<?php echo trans('lang.name'); ?>" />
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.assettag'); ?></label>
                                    <input name="assettag" type="text" id="assettag" class=" form-control" required
                                        placeholder="<?php echo trans('lang.assettag'); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.supplier'); ?></label>
                                    <select name="supplierid" id="supplierid" required class="form-control">

                                        @foreach ($suppliers as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.location'); ?></label>
                                    <select name="locationid" id="locationid" required class="form-control">
                                        @foreach ($location as $item)
                                            <option value="{{ $item->id }}">{{ $item->branch_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.brand'); ?></label>
                                    <select name="brandid" id="brandid" required class="form-control">
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.serial'); ?></label>
                                    <input name="serial" type="text" id="serial" class="form-control" required
                                        placeholder="<?php echo trans('lang.serial'); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.assettype'); ?></label>
                                    <select name="typeid" id="typeid" required class="form-control">
                                        @foreach ($type as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        {{-- <option value=""><?php echo trans('lang.assettype'); ?></option>  --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="cost" class="control-label"><?php echo trans('lang.cost'); ?></label>
                                    <div class="input-group mb-0">
                                        <span class="input-group-addon setcurrency border-1" id="currency"></span>
                                        <input class="form-control number" required="" placeholder="<?php echo trans('lang.cost'); ?>"
                                            id="cost" name="cost" type="text">
                                    </div>
                                    <label class="error" for="cost"></label>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="purchasedate" class="control-label"><?php echo trans('lang.purchasedate'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control setdate" required=""
                                            placeholder="<?php echo trans('lang.purchasedate'); ?>" id="purchasedate" name="purchasedate"
                                            type="date">
                                        {{-- <span class="input-group-addon border-1" id="date" ><i class="fa fa-calendar"></i></span>  --}}
                                    </div>
                                    <label class="error" for="purchasedate"></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="warranty" class="control-label"><?php echo trans('lang.warranty'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control number" required=""
                                            placeholder="<?php echo trans('lang.warranty'); ?>" id="warranty" name="warranty"
                                            type="text">
                                        <span class="input-group-addon border-1"
                                            id="warrantyyear"><?php echo trans('lang.month'); ?></span>
                                    </div>
                                    <label class="error" for="warranty"></label>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label><?php echo trans('lang.status'); ?></label>
                                    <select name="status" id="status" required class="form-control">
                                        <option value=""><?php echo trans('lang.status'); ?></option>
                                        <option value="1"><?php echo trans('lang.readytodeploy'); ?></option>
                                        <option value="2"><?php echo trans('lang.pending'); ?></option>
                                        <option value="3"><?php echo trans('lang.archived'); ?></option>
                                        <option value="4"><?php echo trans('lang.broken'); ?></option>
                                        <option value="5"><?php echo trans('lang.lost'); ?></option>
                                        <option value="6"><?php echo trans('lang.outofrepair'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo trans('lang.description'); ?></label>
                                <textarea class="form-control" name="description" id="description" placeholder="<?php echo trans('lang.description'); ?>"></textarea>
                            </div>

                            <div class="form-group">
                                <label><?php echo trans('lang.picture'); ?></label>
                                <input name="picture" type="file" id="picture" class=" form-control"
                                    placeholder="<?php echo trans('lang.picture'); ?>" />
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" style="" class="btn btn-primary"
                                id="save"><?php echo trans('lang.save'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end add data-->

        <!--edit new data -->
        <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="#" id="formedit" enctype="multipart/form-data">
                        <div class="modal-header">

                            <h5 class="modal-title"><?php echo trans('lang.edit_data'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="messageexist alert alert-success display-none"><?php echo trans('lang.tag_exist'); ?></div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.name'); ?></label>
                                    <input name="name" type="text" id="editname" class=" form-control" required
                                        placeholder="<?php echo trans('lang.name'); ?>" />
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.assettag'); ?></label>
                                    <input name="assettag" type="text" id="editassettag" class=" form-control"
                                        required placeholder="<?php echo trans('lang.assettag'); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.supplier'); ?></label>
                                    <select name="supplierid" id="editsupplierid" required class="form-control">

                                        @foreach ($suppliers as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.location'); ?></label>
                                    <select name="locationid" id="editlocationid" required class="form-control">
                                        <option value=""><?php echo trans('lang.location'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.brand'); ?></label>
                                    <select name="brandid" id="editbrandid" required class="form-control">
                                        <option value=""><?php echo trans('lang.brand'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.serial'); ?></label>
                                    <input name="serial" type="text" id="editserial" class="form-control " required
                                        placeholder="<?php echo trans('lang.serial'); ?>" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo trans('lang.assettype'); ?></label>
                                    <select name="typeid" id="edittypeid" required class="form-control">
                                        <option value=""><?php echo trans('lang.assettype'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="cost" class="control-label"><?php echo trans('lang.cost'); ?></label>
                                    <div class="input-group mb-0">
                                        <span class="input-group-addon setcurrency border-1" id="editcurrency"></span>
                                        <input class="form-control number" required=""
                                            placeholder="<?php echo trans('lang.cost'); ?>" id="editcost" name="cost"
                                            type="text">
                                    </div>
                                    <label class="error" for="cost"></label>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label for="purchasedate" class="control-label"><?php echo trans('lang.purchasedate'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control setdate" required=""
                                            placeholder="<?php echo trans('lang.purchasedate'); ?>" id="editpurchasedate" name="purchasedate"
                                            type="date">
                                        {{-- <span class="input-group-addon border-1" id="editdate" ><i class="fa fa-calendar"></i></span> --}}
                                    </div>
                                    <label class="error" for="purchasedate"></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <label for="warranty" class="control-label"><?php echo trans('lang.warranty'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control number" required=""
                                            placeholder="<?php echo trans('lang.warranty'); ?>" id="editwarranty" name="warranty"
                                            type="text">
                                        <span class="input-group-addon border-1"
                                            id="editwarrantyyear"><?php echo trans('lang.month'); ?></span>
                                    </div>
                                    <label class="error" for="warranty"></label>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <label><?php echo trans('lang.status'); ?></label>
                                    <select name="status" id="editstatus" required class="form-control">
                                        <option value=""><?php echo trans('lang.status'); ?></option>
                                        <option value="1"><?php echo trans('lang.readytodeploy'); ?></option>
                                        <option value="2"><?php echo trans('lang.pending'); ?></option>
                                        <option value="3"><?php echo trans('lang.archived'); ?></option>
                                        <option value="4"><?php echo trans('lang.broken'); ?></option>
                                        <option value="5"><?php echo trans('lang.lost'); ?></option>
                                        <option value="6"><?php echo trans('lang.outofrepair'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo trans('lang.description'); ?></label>
                                <textarea class="form-control" name="description" id="editdescription" placeholder="<?php echo trans('lang.description'); ?>"></textarea>
                            </div>

                            <div class="form-group">
                                <label><?php echo trans('lang.picture'); ?></label>
                                <input name="picture" type="file" id="editpicture" class=" form-control"
                                    placeholder="<?php echo trans('lang.picture'); ?>" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="editid" />
                            <button type="submit" class="btn btn-primary" id="saveedit"><?php echo trans('lang.save'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end edit data-->



        <!--add checkout -->
        <div id="checkout" class="modal fade" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <form action="#" id="formcheckout" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal-header">

                            <h5 class="modal-title"><?php echo trans('lang.checkout'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.assettag'); ?></label>
                                    <input name="assettag" type="text" readonly id="checkoutassettag"
                                        class=" form-control" required placeholder="<?php echo trans('lang.assettag'); ?>" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.asset'); ?></label>
                                    <input name="asset" type="text" readonly id="checkoutname"
                                        class=" form-control" required placeholder="<?php echo trans('lang.asset'); ?>" />
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.checkoutto'); ?></label>
                                    <select name="employeeid" id="checkoutemployeeid" required class="form-control">
                                        <option value=""><?php echo trans('lang.employee'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 mb-0">
                                    <label for="checkoutdate" class="control-label"><?php echo trans('lang.checkoutdate'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control setdate" required=""
                                            placeholder="<?php echo trans('lang.checkoutdate'); ?>" id="checkoutdate" name="checkoutdate"
                                            type="date">
                                        {{-- <span class="input-group-addon border-1" id="date" ><i class="fa fa-calendar"></i></span> --}}
                                    </div>
                                    <label class="error" for="checkoutdate"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="assetid" id="assetid" />
                            <button type="submit" class="btn btn-primary"
                                id="savecheckout"><?php echo trans('lang.save'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end checkout-->


        <!--add checkin -->
        <div id="checkin" class="modal fade" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <form action="#" id="formcheckin" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo trans('lang.checkin'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.assettag'); ?></label>
                                    <input name="assettag" type="text" readonly id="checkinassettag"
                                        class=" form-control" required placeholder="<?php echo trans('lang.assettag'); ?>" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label><?php echo trans('lang.asset'); ?></label>
                                    <input name="asset" type="text" readonly id="checkinname" class=" form-control"
                                        required placeholder="<?php echo trans('lang.asset'); ?>" />
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 mb-0">
                                    <label for="checkindate" class="control-label"><?php echo trans('lang.checkindate'); ?></label>
                                    <div class="input-group mb-0">
                                        <input class="form-control setdate" required=""
                                            placeholder="<?php echo trans('lang.checkindate'); ?>" id="checkindate" name="checkindate"
                                            type="date">
                                        {{-- <span class="input-group-addon border-1" id="date" ><i class="fa fa-calendar"></i></span>  --}}
                                    </div>
                                    <label class="error" for="checkindate"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="employeeid" id="checkinemployeeid" value="0" />
                            <input type="hidden" name="assetid" id="checkinassetid" />
                            <button type="submit" class="btn btn-primary"
                                id="savecheckin"><?php echo trans('lang.save'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end checkin-->


        <!--delete data -->
        <div class="modal fade" id="delete" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="#" id="formdelete">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo trans('lang.delete'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo trans('lang.delete_confirm'); ?></p>
                            <input type="hidden" value="" name="id" id="iddelete" />

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="delete"><?php echo trans('lang.delete'); ?></button>
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo trans('lang.close'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end delete data -->
    </section>

    <script>
       /*  $(document).ready(function() { */
            $('#data').DataTable({
                ajax: "{{ url('asset/data') }}",
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
                        data: 'assettag'
                    },
                    {
                        data: 'serial',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'purchasedate',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'cost',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },

                {
                    data: 'description',
                    orderable: false,
                    searchable: false,
                    visible: false
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
                    data: 'location'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            buttons: [{
                    extend: 'copy',
                    text: 'Copy <i class="fa fa-files-o"></i>',
                    className: 'btn btn-sm btn-fill btn-info ',
                    title: '<?php echo trans('lang.asset_list '); ?>',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV <i class="fa fa-file-excel-o"></i>',
                    className: 'btn btn-sm btn-fill btn-info ',
                    title: '<?php echo trans('lang.asset_list'); ?>',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                    className: 'btn btn-sm btn-fill btn-info ',
                    title: '<?php echo trans('lang.asset_list'); ?>',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                    },
                    customize: function(doc) {
                        doc.styles.tableHeader.alignment = 'left';
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0]
                                .length + 1)
                            .join('*').split('');
                    }
                },
                {
                    extend: 'print',
                    title: '<?php echo trans('lang.asset_list'); ?>',
                    className: 'btn btn-sm btn-fill btn-info ',
                    text: 'Print <i class="fa fa-print"></i>',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                }
            ]
        });


        //get all supplier
        $.ajax({
            type: "GET",
            url: "{{ url('listsupplier') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                jQuery.each(objs, function(index, record) {
                    var id = decodeURIComponent(record.id);
                    var name = decodeURIComponent(record.name);
                    $("#supplierid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                    $("#editsupplierid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                });
            }
        });

        //get all employee
        $.ajax({
            type: "GET",
            url: "{{ url('listemployees') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                jQuery.each(objs, function(index, record) {
                    var id = decodeURIComponent(record.id);
                    var name = decodeURIComponent(record.fullname);
                    $("#checkinemployeeid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                    $("#checkoutemployeeid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                });
            }
        });


        //get all asset type
        $.ajax({
            type: "GET",
            url: "{{ url('listassettype') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                jQuery.each(objs, function(index, record) {
                    var id = decodeURIComponent(record.id);
                    var name = decodeURIComponent(record.name);
                    $("#typeid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                    $("#edittypeid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                });
            }
        });

        //get all brand 
        $.ajax({
            type: "GET",
            url: "{{ url('listbrand') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                jQuery.each(objs, function(index, record) {
                    var id = decodeURIComponent(record.id);
                    var name = decodeURIComponent(record.name);
                    $("#brandid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                    $("#editbrandid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                });
            }
        });

        //get all location 
        $.ajax({
            type: "GET",
            url: "{{ url('listlocation') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                jQuery.each(objs, function(index, record) {
                    var id = decodeURIComponent(record.id);
                    var name = decodeURIComponent(record.name);
                    $("#locationid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                    $("#editlocationid").append($("<option></option>")
                        .attr("value", id)
                        .text(name));
                });
            }
        });

        //generate product code
        $.ajax({
            type: "GET",
            url: "{{ url('asset/generateproductcode') }}",
            dataType: "JSON",
            success: function(html) {
                var objs = html.message;
                $("#assettag").val(html.message);
            }
        });

        //add data
        $("#formadd").validate({
            rules: {
                warranty: {
                    required: true,
                    digits: true,
                    maxlength: 2
                }
            },
            submitHandler: function(form) {
                var form = new FormData();
                var name = $("#name").val();
                var locationid = $("#locationid").val();
                var supplierid = $("#supplierid").val();
                var typeid = $("#typeid").val();
                var brandid = $("#brandid").val();
                var assettag = $("#assettag").val();
                var serial = $("#serial").val();
                var quantity = $("#quantity").val();
                var purchasedate = $("#purchasedate").val();
                var cost = $("#cost").val();
                var warranty = $("#warranty").val();
                var status = $("#status").val();
                var description = $("#description").val();
                var picture = $('#picture')[0].files[0];

                form.append('name', name);
                form.append('locationid', locationid);
                form.append('supplierid', supplierid);
                form.append('brandid', brandid);
                form.append('typeid', typeid);
                form.append('assettag', assettag);
                form.append('serial', serial);
                form.append('quantity', quantity);
                form.append('purchasedate', purchasedate);
                form.append('cost', cost);
                form.append('warranty', warranty);
                form.append('status', status);
                form.append('description', description);
                form.append('picture', picture);

                $.ajax({
                    type: "POST",
                    url: "{{ url('saveasset') }}",
                    data: form,
                    contentType: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.message == 'success') {
                            $("#messagesuccess").css({
                                'display': "block"
                            });
                            $('#add').modal('hide');
                            window.setTimeout(function() {
                                location.reload()
                            }, 2000);
                        }
                        if (data.message == 'exist') {
                            $(".messageexist").css({
                                'display': "block"
                            });
                        }
                    }
                });
            }
        });

        //edit data
        $("#formedit").validate({
            rules: {
                warranty: {
                    required: true,
                    digits: true,
                    maxlength: 2
                }
            },
            submitHandler: function(form) {
                var form = new FormData();
                var id = $("#editid").val();
                var name = $("#editname").val();
                var locationid = $("#editlocationid").val();
                var supplierid = $("#editsupplierid").val();
                var typeid = $("#edittypeid").val();
                var brandid = $("#editbrandid").val();
                var assettag = $("#editassettag").val();
                var serial = $("#editserial").val();
                var quantity = $("#editquantity").val();
                var purchasedate = $("#editpurchasedate").val();
                var cost = $("#editcost").val();
                var warranty = $("#editwarranty").val();
                var status = $("#editstatus").val();
                var description = $("#editdescription").val();
                var picture = $('#editpicture')[0].files[0];


                form.append('id', id);
                form.append('name', name);
                form.append('locationid', locationid);
                form.append('supplierid', supplierid);
                form.append('brandid', brandid);
                form.append('typeid', typeid);
                form.append('assettag', assettag);
                form.append('serial', serial);
                form.append('quantity', quantity);
                form.append('purchasedate', purchasedate);
                form.append('cost', cost);
                form.append('warranty', warranty);
                form.append('status', status);
                form.append('description', description);
                form.append('picture', picture);

                $.ajax({
                    type: "POST",
                    url: "{{ url('updateasset') }}",
                    data: form,
                    contentType: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (data.message == 'success') {
                            $("#messageupdate").css({
                                'display': "block"
                            });
                            $('#edit').modal('hide');
                            window.setTimeout(function() {
                                location.reload()
                            }, 2000);
                        }
                        if (data.message == 'exist') {
                            $(".messageexist").css({
                                'display': "block"
                            });
                        }

                    }
                });
            }
        });

        //delete data
        $("#formdelete").validate({
            submitHandler: function(form) {
                $.ajax({
                    method: "POST",
                    url: "{{ url('deleteasset') }}",
                    data: $("#formdelete").serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        $("#messagedelete").css({
                            'display': "block"
                        });
                        $('#delete').modal('hide');
                        window.setTimeout(function() {
                            location.reload()
                        }, 2000)
                    }
                });
            }
        });

        //show edit data
        $('#edit').on('show.bs.modal', function(e) {
            var $modal = $(this),
                id = $(e.relatedTarget).attr('customdata');
            $.ajax({
                type: "POST",
                url: "{{ url('assetbyid') }}",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $("#editid").val(id);
                    $("#editname").val(data.message.assetname);
                    $("#editlocationid").val(data.message.locationid);
                    $("#editsupplierid").val(data.message.supplierid);
                    $("#editbrandid").val(data.message.brandid);
                    $("#edittypeid").val(data.message.typeid);
                    $("#editassettag").val(data.message.assettag);
                    $("#editserial").val(data.message.serial);
                    $("#editquantity").val(data.message.quantity);
                    $("#editpurchasedate").val(data.message.purchasedate);
                    $("#editcost").val(data.message.cost);
                    $("#editwarranty").val(data.message.warranty);
                    $("#editstatus").val(data.message.status);
                    $("#editdescription").val(data.message.assetdescription);
                }
            });
        });
            //show checkout
            $('#checkout').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    id = $(e.relatedTarget).attr('customdata');
                $.ajax({
                    type: "POST",
                    url: "{{ url('assetbyid') }}",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $("#assetid").val(id);
                        $("#checkoutname").val(data.message.name);
                        $("#checkoutassettag").val(data.message.assettag);
                    }
                });
            });

            //show checkin
            $('#checkin').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    id = $(e.relatedTarget).attr('customdata');
                $.ajax({
                    type: "POST",
                    url: "{{ url('assetbyid') }}",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $("#checkinassetid").val(id);
                        $("#checkinname").val(data.message.name);
                        $("#checkinassettag").val(data.message.assettag);
                    }
                });
            });

            //show delete data

            $('#delete').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    id = $(e.relatedTarget).attr('customdata');
                $("#iddelete").val(id);
            });
        /* }); */
    </script>
@endsection
