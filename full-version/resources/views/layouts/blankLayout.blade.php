{{-- @isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset --}}
@php
$configData = Helper::appClasses();
$isFront = false;
@endphp

@extends('layouts/commonMaster')

@section('layoutContent')

@include('layouts/sections/navbar/navbar-front')

<div class="container">
    @yield('content')
</div>

@include('layouts/sections/footer/footer-front')

@endsection
