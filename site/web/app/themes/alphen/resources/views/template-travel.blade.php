{{--
  Template Name: Travel Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-travel')
  @endwhile
@endsection
