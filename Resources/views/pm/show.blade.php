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
                <a href="{{ URL::route('privatemessage', ['inbox' => $thread->inbox]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{{ \Lang::get('privatemessage::view.show.back-to-list') }}}
                </a>
            </span>
        </div>
        <div class="panel-body">

            @yield('pm-action-bar')

            <ul class="list-group">

            @foreach($messages as $message)
                <li>
                    <div class="pull-right">
                        <span class="date">{{ $message->created_at->format('d-m-Y') }}</span>
                        <div class="pull-right">
                            <img src="{{ $message->author->present()->gravatar() }}" class="img-circle" alt="User Image" />
                            <br />
                            {{{ $message->author->present()->fullname }}}
                        </div>
                    </div>

                    {!! $message->message !!} {{-- TODO format the output with $message->format --}}
                </li>
            @endforeach
                <li>
                    TODO form to answer
                </li>
            </ul>
{{-- TODO manage pagiantion (or autoload throught js) --}}
        </div>
        <div class="panel-footer">
            <span class="linkBack">
                <a href="{{ URL::route('privatemessage', ['inbox' => $thread->inbox]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{{ \Lang::get('privatemessage::view.show.back-to-list') }}}
                </a>
            </span>
        </div>
    </div>
@stop
