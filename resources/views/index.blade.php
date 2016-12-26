@extends('layouts.master')

@section('content')
    <h1 class="app-name">MoneyMath</h1>
    <container></container>
@stop

@section('scripts')
    <script src="{{ elixir("js/app.js") }}"></script>
@stop