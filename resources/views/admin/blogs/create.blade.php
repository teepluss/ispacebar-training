@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-heading">Create a post</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.blogs.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>

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
                                <textarea class="form-control" id="body" name="body" rows="8">{{ old('body') }}</textarea>

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
                                    Create
                                </button>
                                @can('blogs.approve')
                                <label class="checkbox">
                                    <input type="checkbox" name="approve" value="1">
                                    Approve this blog
                                </label>
                                @endcan
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
