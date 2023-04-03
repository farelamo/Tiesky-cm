@extends('landing.layouts.master')

@section('hero')
  @include('landing/components/hero')
@endsection

@section('content')
  @include('landing/components/home-about')
  @include('landing/components/featured-services')
  @include('landing/components/home-product')
@endsection