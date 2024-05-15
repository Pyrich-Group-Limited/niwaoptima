<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="order-listing">
            <thead>
            <tr>
                {{-- <th> TRAVEL PURPOSE</th> --}}
                <th>COMMENTS</th>
                <th>REVIEW STATUS</th>
                <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dtareview as $review)
                <tr>
                    <td>{{ $review->comments }}</td>
                    <td>{{ $review->review_status }}</td>
                    <td>{{ $review->status}}</td>
                            
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{-- @include('adminlte-templates::common.paginate', ['records' => $dtarequests]) --}}
        </div>
    </div>
</div>
