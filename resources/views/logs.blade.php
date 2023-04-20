@extends('adminlte::page')

@section('title', 'Log Viewer')

@section('content_header')
    <h1>Log Viewer</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Logs</h3>
        </div>
        <div class="box-body">
            <iframe src="{{ route('log-viewer') }}" style="width:100%; height:600px; border:0;"></iframe>
        </div>
    </div>
@stop
