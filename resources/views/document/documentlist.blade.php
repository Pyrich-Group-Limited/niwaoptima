@if (count($document_list) != 0)
    <div class="col-md-9">
        <!--Document List Start-->
        <div class="col-md-12 panel">
            <h1>{{ trans('file.Document') }}(<?php echo $ldms_total_documents_number; ?>)</h1>
            <div class="container-fluid">
                <a href="#" data-toggle="modal" data-target="#importProduct" class="btn btn-primary"><i
                        class="fa fa-file"></i> {{ trans('file.Import Document') }}</a>
            </div>
            <div class="col-md-12">
                <table id="document-table" class="table table-bordered table-striped">
                    <thead>
                        <th class="not-exported"></th>
                        <th>{{ trans('file.SL No') }}</th>
                        <th>{{ trans('file.Document Title') }}</th>
                        <th>{{ trans('file.Expired Date') }}</th>
                        <th>{{ trans('file.Notification Email') }}</th>
                        <th>{{ trans('file.Notification Mobile') }}</th>
                        <th class="text-center hidden-print not-exported">{{ trans('file.Option') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($document_list as $key => $document)
                            <?php
                            $fileExtension = $document->file_name;
                            $fileExtension = substr($fileExtension, strpos($fileExtension, '.') + 1);
                            $todayDate = strtotime(date('Y-m-d'));
                            $expiredDate = strtotime($document->expired_date);
                            ?>
                            <tr class=<?php if ($expiredDate < $todayDate) {
                                echo 'danger';
                            } ?> data-toggle="tooltip" data-placement="top"
                                title= "<?php if ($expiredDate < $todayDate) {
                                    echo trans('file.Document Date is Expired');
                                } ?>">
                                <td>{{ $key }}</td>
                                <td><?php echo $key + 1; ?></td>
                                <td>{!! $document->title !!}</td>
                                <td>{!! date('d-m-Y', strtotime($document->expired_date)) !!}</td>
                                <td>{!! $document->email !!}</td>
                                <td>{!! $document->mobile !!}</td>
                                <td class="text-center hidden-print">
                                    <?php
                                    if ($expiredDate < $todayDate) {
                                        $ldms_line_through = 'line-through';
                                    } else {
                                        $ldms_line_through = 'none';
                                    } ?>
                                    <div class="btn-group">
                                        <button type="button"
                                            class="btn btn-default">{{ trans('file.Action') }}</button>
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li><a title = "View" href="ldms_edit/{!! $document->id !!}"><i
                                                        class="fa fa-eye" aria-hidden="true"></i>
                                                    {{ trans('file.View') }}</a></li>
                                            <li class="divider"></li>
                                            <li><a title = "Download" href="../public/document/<?php echo $document->file_name; ?>"
                                                    download><i class="fa fa-download" aria-hidden="true"></i>
                                                    {{ trans('file.Download') }}</a></li>
                                            <li class="divider"></li>
                                            <li><a title = "Delete"
                                                    href="ldms_delete/{!! $document->id !!}/{!! $document->file_name !!}"
                                                    onclick='return confirmDelete()'><i class="fa fa-trash"
                                                        aria-hidden="true"></i> {{ trans('file.Delete') }}</a></li>
                                            <li class="divider"></li>
                                            <li><a class="<?php if ($expiredDate < $todayDate) {
                                                echo 'disabled';
                                            } ?>"
                                                    href="ldms_alarm_date/{!! $document->id !!}" title="Alarm Date"><i
                                                        class="fa fa-bell" aria-hidden="true"></i>
                                                    <span
                                                        style="text-decoration:<?php echo $ldms_line_through; ?>">{{ trans('file.Alarm') }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--Document List End-->
    </div>
    <div class="col-md-3">
        <div class="col-md-12 panel">
            <h3>{{ trans('file.Upload New Document') }}</h3>
        @else
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 panel">
                    <h3>{{ trans('file.Upload New Document') }}</h3>
@endif


<!--Document Create Start-->
<form method="post" action="ldms_store" files="true" enctype="multipart/form-data">
    <div class="col-md-12">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="ldms_documentTitle">{{ trans('file.Document Title') }}</label>
            <div class="form-group-inner">
                <div class="field-outer">
                    <input class="form-control" type="text" name="title" id="ldms_documentTitle"
                        placeholder="{{ trans('file.Trade License') }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ldms_experiedDate">{{ trans('file.Expired Date') }} *</label>
            <div class="form-group-inner">
                <div class="field-outer">
                    <input id="ldms_experiedDate" name="ldms_experiedDate" class="form-control" type="text"
                        name="date" value="<?php echo date('d-m-Y', strtotime('+2 day')); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ldms_email">{{ trans('file.Notification Email') }} *</label>
            <div class="form-group-inner">
                <div class="field-outer">
                    <input class="form-control" type="email" name="ldms_email" id="ldms_email"
                        placeholder=
                        "abc@gmail.com">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ldms_email">{{ trans('file.Notification Mobile') }}</label>
            <div class="form-group-inner">
                <div class="field-outer">
                    <input class="form-control" type="text" name="mobile"
                        placeholder=
                        "+8801*********">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ldms_documentFile">{{ trans('file.Document') }}</label>
            <div class="form-group-inner">
                <div class="field-outer">
                    <input type="file" name="ldms_documentFile" id="ldms_documentFile">
                    <label class="btn btn-default" for="ldms_documentFile"><i class="fa fa-upload"></i>
                        {{ trans('file.Upload File') }}</label>
                    <span id="ldms_document_file_name"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group submit text-right">
        <label for="submit"></label>
        <div class="form-group-inner">
            <div class="field-outer">
                <input type="submit" name="submit" value="{{ trans('file.Submit') }}" class="btn btn-primary"
                    id="createForm">
            </div>
        </div>
    </div>
</form>
<!--Document Create End-->
