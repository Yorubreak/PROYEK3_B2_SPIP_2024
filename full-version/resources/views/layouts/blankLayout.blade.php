{{-- @isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset --}}
@php
$configData = Helper::appClasses();
$isFront = false;
@endphp


@section('layoutContent')

@extends('layouts/commonMaster')

@include('layouts/sections/navbar/navbar-front')

<!-- Content -->
@yield('content')
<!--/ Content -->

@include('layouts/sections/footer/footer-front')
@endsection
