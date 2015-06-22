@extends('layouts.master')

@section('title')
    {{{ \Lang::get('privatemessage::view.index.title') }}} | @parent
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">
                {{{ \Lang::get('privatemessage::view.index.mainTitle') }}}
            </h1>
        </div>
        <div class="panel-body">
        @if (isset($threads))
            <div class="list-group">
            @forelse($threads as $thread)
                <a class="list-group-item" href="{{ URL::route($currentLocale . 'privatemessage.show', [$thread->id]) }}">
                    <h4>{{ $thread->topic }}</h4>
                    <span class="badge">{{ $thread->cptMessages ?: 0 }}</span>
                    <span class="date">{{ $thread->created_at->format('d-m-Y') }}</span>
                </a>
            @else
                <a class="list-group-item list-group-item-info" href="#">
                    {{{ \Lang::get('privatemessage::view.index.no-thread') }}}
                </a>
            @endforelse
            </div>
        @endif
        </div>
    </div>
@stop
