@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    Posts
                    <div class="pull-right">
                        <a href="{{ route('admin.blogs.index') }}">Filter: all</a> |
                        <a href="{{ route('admin.blogs.index', ['approved' => 1]) }}">Filter: approved</a> |
                        <a href="{{ route('admin.blogs.create') }}">Create</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{
                                        $blog->created_at
                                             ->timezone('Asia/Bangkok')
                                             ->format('d/m/Y H:i')
                                    }}
                                </td>
                                <td>
                                    <span class="fullname">
                                        {{ $blog->user->fullname }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}">edit</a> |
                                    <a href="{{ route('admin.blogs.approve', $blog->id) }}">approve</a> |
                                    <a href="{{ route('admin.blogs.delete', $blog->id) }}">delete</a>
                                    {{--<form class="form-inline" style="display:inline" method="post" action="{{ route('admin.blogs.delete', ['id' => $blog->id]) }}">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <input type="submit" value="delete">
                                    </form>--}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.panel-body -->
            </div>
            <div class="paginate-x">
                {{ $blogs->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
