<div id="importProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'document.import', 'method' => 'post', 'files' => true]) !!}
                <div class="modal-header">
                    <span style="font-weight: 850;">Import Document</span>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <i><small>{{ trans('file.All field labels are required input fields.') }}</small></i><br><br>
                    <p>{{ trans('file.The correct column order is') }} (title, expiredDate(d-m-Y), email, mobile,
                        fileName) {{ trans('file.and you must follow this.') }}
                        {{ trans('file.Make sure expiredDate column is in text format.') }}
                        {{ trans('file.Files must be located in') }} public/document {{ trans('file.directory') }}.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>{{ trans('file.Upload File') }} *</strong></label>
                                {{ Form::file('file', ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong> {{ trans('file.Sample File') }}</strong></label>
                                <a href="../public/sample/sample-doc.csv" class="btn btn-info btn-block btn-md"><i
                                        class="fa fa-download"></i> {{ trans('file.Download') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="operation_value"></div>
                    <input type="submit" name="submit" value="{{ trans('file.Submit') }}"
                        class="btn btn-primary">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
