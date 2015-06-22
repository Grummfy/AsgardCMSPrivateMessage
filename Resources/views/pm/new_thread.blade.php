@extends('layouts.master')

@section('title')
    {{{ \Lang::get('privatemessage::view.index.title') }}} | @parent
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">
                {{{ \Lang::get('privatemessage::view.new.creation') }}}
            </h1>
        </div>
        <div class="panel-body">

            TODO : form

        </div>
    </div>
@stop
