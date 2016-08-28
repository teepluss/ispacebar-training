<div>
    <p>
        <h2>{{ $blog->title }}</h2>
    </p>
    <p>
        {{ $blog->body }}
    </p>
    <hr>
    <a href="{{ route('admin.blogs.approve', $blog->id) }}">OK Approve!!!!</a>
</div>