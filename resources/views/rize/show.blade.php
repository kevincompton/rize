@extends('layouts.app')

@section('content')

    <a href="/rizeups" class="back">< back</a>

    @if($rize->image)
        <img src="/images/rizes/{{ $rize->image }}" />
    @else
        <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
    @endif
    <h2 class="section-heading">{{ $rize->title }}</h2>
    <small>{{ $rize->date }}</small><br>
    <p>{{ $rize->description }}</p>

    <div class="ui">
        @if(isset($user->id) && $rize->chimes->contains('user_id', $user->id))
            <div class="chimed"><i class="fa fa-bell-o" aria-hidden="true"></i> {{ count($rize->chimes) }}</div>
        @else
            {!! Form::open(['url' => '/chime/rize']) !!}
                {!! Form::hidden('id', $rize->id) !!}
                {!! Form::hidden('type', 'rize') !!}
                <button class="chime-btn" type="submit"><i class="fa fa-bell-o" aria-hidden="true"></i> {{ count($rize->chimes) }}</button>
            {!! Form::close() !!}
        @endif
    </div>
                
@endsection

