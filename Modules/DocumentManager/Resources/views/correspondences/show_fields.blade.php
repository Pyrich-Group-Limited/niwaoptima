<!-- Subject Field -->
<div class="col-sm-12">
    {!! Form::label('subject', 'Subject:' , ['class' => 'h4']) !!}
    <p>{{ $correspondence->subject }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:' , ['class' => 'h4']) !!}
    <p>{{ $correspondence->date }}</p>
</div>

<!-- Sender Field -->
<div class="col-sm-12">
    {!! Form::label('sender', 'Sender:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->sender }}</p>
</div>

<!-- Reference Number Field -->
<div class="col-sm-12">
    {!! Form::label('reference_number', 'Reference Number:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->reference_number }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->description }}</p>
</div>

<!-- Comments Field -->
<div class="col-sm-12">
    {!! Form::label('comments', 'Comments:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->comments }}</p>
</div>


<!-- Document Id Field -->
<div class="col-sm-12">
    {!! Form::label('document_id', 'Document URL:', ['class' => 'h4']) !!}
    @php
        $latestDocumentUrl = $correspondence->document
            ->documentVersions()
            ->latest()
            ->first()
            ? $correspondence->document
                ->documentVersions()
                ->latest()
                ->first()->document_url
            : '#';
    @endphp
    {{-- <p>{{ $latestDocumentUrl }}</p> --}}
    <a target="_blank" href="{{ asset($latestDocumentUrl) }}">
        <p>View</p>
    </a>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:', ['class' => 'h4']) !!}
    <p>{{ $correspondence->updated_at }}</p>
</div>
