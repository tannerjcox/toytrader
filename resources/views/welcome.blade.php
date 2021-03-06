@extends('layouts.app')
@section('title')
    {{ config('app.name') }}
@stop
@section('content')
    <div class="row">
        <div class="col s12">
            <a href="{{ route('browse') }}" class="col m6 row">
                <img src="{{ asset('images/boy-child-fun-beach.jpg') }}" class="col s12 m-b-sm" alt="Boy playing at the beach">
            </a>
            <a href="{{ route('browse') }}" class="col m6 m-b-sm row">
                <img src="{{ asset('images/tools.jpg') }}" class="col s12 m-b-sm" alt="Tools">
            </a>
        </div>
    </div>
@stop
