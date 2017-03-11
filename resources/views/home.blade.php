@extends('layouts.app')

@section('content')
    <div class="user-image">
        @if($user->image != null)
            PHOTO
            <button>Change Photo</button>
        @else 
            <i class="fa fa-user-circle" aria-hidden="true"></i><br>
            <button>Take A Photo</button>
        @endif
    </div>

    <h2 class="section-heading">{{ $user->name }}</h2>
@endsection
