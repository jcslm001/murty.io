@extends('layouts.app')

@section('header')
    <h1>
        <a href="/isla">Isla Murty</a>
    </h1>

    @include('sections.list_sites_header')
@endsection

@section('content')
    {!! $content_html !!}
@endsection
