<ul class="nav navbar-nav">
@if (isset($navigations))
    @foreach($navigations as $name => $link)
    <li><a href="{{ $link }}">{{ $name }}</a></li>
    @endforeach
@endif
</ul>