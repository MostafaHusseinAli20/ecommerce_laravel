@extends('front.layouts.master')
@section('title', 'Categories')
@section('content')
    <x-products-section :section-category="$category"/>
@endsection