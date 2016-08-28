@extends('layouts.app')
@section('title', 'Edit a post')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Edit a post</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.blogs.update', $blog->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}" autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
                                <textarea class="form-control" id="body" name="body" rows="8">{{ old('body', $blog->body) }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
