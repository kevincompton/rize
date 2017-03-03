@extends('layouts.app')

@section('content')

    <h2 class="section-heading">Assemble Los Angeles</h2>

    <div class="cards">            
               
       @foreach($events as $event)
            <a class="card-url" href="/events/show/{{ $event->id }}">
                <div class="card">
                    <div class="card-image">
                        @if($event->image)
                            <img src="/images/events/{{ $event->image }}" />
                        @else
                            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
                        @endif
                    </div>
                    <div class="card-header">
                        {{ $event->title }}<br><small>{{ $event->date }}</small><br><strong><small>{{ $event->user->name }}</small></strong>
                    </div>
                    <div class="card-copy">
                        {{ str_limit($event->description, 100) }}
                        
                        <div class="chime-tools">
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

                        @if($event->user_id === $user->id)
                            <a class="settings" href="/event/{{ $event->id }}"><i class="fa fa-cog" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </div>
            </a>
       @endforeach

    </div>
                
@endsection

