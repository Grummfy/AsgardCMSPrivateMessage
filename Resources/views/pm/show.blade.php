@extends('layouts.master')

@section('title')
    {{ $thread->topic }} | @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <span class="linkBack">
                <a href="{{ URL::route($currentLocale . '.privatemessage') }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{{ \Lang::get('privatemessage::view.show.back-to-list') }}}
                </a>
            </span>
            <h1>{{ $thread->title }}</h1>
            @foreach($messages as $message)

                <li>
                    <span class="date">{{ $message->created_at->format('d-m-Y') }}</span>
                    <h3>from message</h3>
                    {!! $message->message !!}
                </li>
                <div class="clearfix"></div>

            @endforeach
        </div>
    </div>
@stop
