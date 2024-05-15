{{-- <a href="{{ route('home') }}" class="btn btn-sm btn-success float-end ">Go Home</a> --}}
{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex">
    <img   src="{{ asset('assets/media/logos/NIWA Optima-transparent.png') }}" alt="optima logo"/></a>

        {{-- <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
            alt="{{ auth()->user()->avatar }}"> --}}
</div>
<p class="info-name">{{ config('chatify.name') }}</p>

<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete All Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
