@extends('layouts.app')

@section('content')

    <a href="/events" class="back">< back</a>

    @if($event->image)
        <img src="/images/events/{{ $event->image }}" />
    @else
        <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
    @endif
    <h2 class="section-heading">{{ $event->title }}</h2>
    <small>{{ $event->date }}</small><br>
    <small>{{ $event->user->name }}</small>
    <p>{{ $event->description }}</p>

    <div class="ui">
        @if(isset($user->id) && $event->chimes->contains('user_id', $user->id))
            <div class="chimed"><i class="fa fa-bell-o" aria-hidden="true"></i> {{ count($event->chimes) }}</div>
        @else
            {!! Form::open(['url' => '/chime/event']) !!}
                {!! Form::hidden('id', $event->id) !!}
                {!! Form::hidden('type', 'event') !!}
                <button class="chime-btn" type="submit"><i class="fa fa-bell-o" aria-hidden="true"></i> {{ count($event->chimes) }}</button>
            {!! Form::close() !!}
        @endif
    </div>
                
@endsection

