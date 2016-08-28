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
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created</th>
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
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}">edit</a> |
                                    <a href="{{ route('admin.blogs.delete', ['id' => $blog->id]) }}">delete</a>
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
