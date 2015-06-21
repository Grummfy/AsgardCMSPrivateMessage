@extends('layouts.master')

@section('title')
    {{{ \Lang::get('privatemessage::view.index.title') }}} | @parent
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{{ \Lang::get('privatemessage::view.index.mainTitle') }}}</h1>
            {{-- TODO tab for inbox type --}}
            @if (isset($threads))
            <ul>
            @forelse($threads as $thread)
                <li>
                    <span class="date">{{ $thread->created_at->format('d-m-Y') }}</span>
                    <h3><a href="{{ URL::route($currentLocale . 'privatemessage.show', [$thread->id]) }}">{{ $thread->topic }}</a></h3>
                </li>
                <div class="clearfix"></div>
            @else
                <li>
                    {{{ \Lang::get('privatemessage::view.index.no-thread') }}}
                </li>
                <div class="clearfix"></div>
            @endforelse
            </ul>
            @endif
        </div>
    </div>
@stop
