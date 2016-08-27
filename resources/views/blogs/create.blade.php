@extends('layouts.master')
@section('title', 'Create a blog')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endpush
@section('content')
My name is {{ $name }}
@endsection
