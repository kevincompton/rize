@extends('layouts.app')

@section('content')

    <h2 class="section-heading">Create Event</h2>

    <section>
        {!! Form::open(['url' => '/event/store', 'files' => true]) !!}
            {!! Form::file('image', null) !!}
            <input name="title" type="text" placeholder="Title">
            <input name="city" type="text" placeholder="City">
            <textarea name="description" placeholder="Description"></textarea>
            <input name="date" class="datepicker" />
            <button type="submit">Update</button>
        {!! Form::close() !!}
    </section>

                
@endsection

