@extends('layouts.app')

@section('content')
    
    <h2 class="section-heading">Rize Up</h2>

    <div class="cards">

        @foreach($rizes as $rize)
            <a class="card-url" href="/rize/show/{{ $rize->id }}">
                <div class="card">
                    <div class="card-image">
                        @if($rize->image)
                            <img src="/images/rize/{{ $rize->image }}" />
                        @else
                            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/mountains.png" alt="">
                        @endif
                    </div>
                    <div class="card-header">
                        {{ $rize->title }}<br><small>{{ $rize->date }}</small>
                    </div>
                    <div class="card-copy">
                        {{ str_limit($rize->description, 100) }}
                        
                        <div class="chime-tools">
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
                    </div>
                </div>
            </a>
        @endforeach

    </div>

@endsection