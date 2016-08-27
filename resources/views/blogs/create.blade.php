@extends('layouts.master')
@section('title', 'Create a blog')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endpush
@section('content')
<form method="post" action="{{ route('blogs.store') }}">
{{ csrf_field() }}
  <div class="form-group">
    <label for="inputTitle">Tilte</label>
    <input type="text" name="title" class="form-control" id="inputTitle">
  </div>
  <div class="form-group">
    <label for="inputBody">Body</label>
    <textarea class="form-control" id="inputBody" name="body"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
