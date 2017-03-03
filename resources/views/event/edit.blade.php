@extends('layouts.app')

@section('content')

    <h2 class="section-heading">Edit Event</h2>

    @if($event->image)
        <img src="/images/events/{{ $event->image }}" />
    @else
        <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
    @endif

    <section>
        {!! Form::open(['url' => '/event/update', 'files' => true]) !!}
            {!! Form::hidden('event_id', $event->id) !!}
            {!! Form::file('image', null) !!}
            <input name="title" type="text" value="{{ $event->title }}">
            <input name="city" type="text" value="{{ $event->city }}">
            <textarea name="description">{{ $event->description }}</textarea>
            <button type="submit">Update</button>
        {!! Form::close() !!}
    </section>
                
@endsection

