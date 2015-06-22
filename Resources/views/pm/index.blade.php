@extends('layouts.master')

@section('title')
    {{{ \Lang::get('privatemessage::view.index.title') }}} | @parent
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="label label-default pull-right">
                <a title="{{{ \Lang::get('privatemessage::view.pm-bar.create-thread') }}}" href="{{ URL::route('privatemessage.new') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </span>
            <h1 class="panel-title">
                {{{ \Lang::get('privatemessage::view.index.mainTitle') }}}
            </h1>
        </div>
        <div class="panel-body">
            <div class="list-group">
            @forelse($threads as $thread)
                <a class="list-group-item" href="{{ URL::route('privatemessage.show', ['threadId' => $thread->id]) }}">
                    <h4>{{ $thread->topic }}</h4>
                    <span class="badge">{{ count($thread->messages ?: 0) }}</span>
                    <span class="date">{{ $thread->created_at->format('d-m-Y') }}</span>
                </a>
            @empty
                <a class="list-group-item list-group-item-info" href="#">
                    {{{ \Lang::get('privatemessage::view.index.no-thread') }}}
                </a>
            @endforelse
            </div>
        </div>
    </div>
@stop
