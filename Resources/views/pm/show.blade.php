@extends('layouts.master')

@section('title')
    {{ $thread->topic }} | @parent
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">
                {{{ $thread->topic }}}
            </h1>
            <span class="linkBack">
                <a href="{{ URL::route($currentLocale . '.privatemessage', ['inbox' => $thread->inbox]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{{ \Lang::get('privatemessage::view.show.back-to-list') }}}
                </a>
            </span>
        </div>
        <div class="panel-body">
            <ul class="list-group">
            @foreach($messages as $message)
                <li>
                    <span class="date">{{ $message->created_at->format('d-m-Y') }}</span>
                    {{--Authior--}}
                    {!! $message->message !!}
                </li>
            @endforeach
            </ul>
        </div>
        <div class="panel-footer">
            <span class="linkBack">
                <a href="{{ URL::route($currentLocale . '.privatemessage', ['inbox' => $thread->inbox]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{{ \Lang::get('privatemessage::view.show.back-to-list') }}}
                </a>
            </span>
        </div>
    </div>



@stop
