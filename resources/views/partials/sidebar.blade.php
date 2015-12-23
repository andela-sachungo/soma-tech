<div class="col-sm-2" class="sidebar-color">
    <ul id="sidebar" class="nav nav-stacked affix">
        <li><a href=" {{ route('dashboard') }}">
            <span class ="glyphicon glyphicon-th"></span>
            Dashboard
        </a></li>
        <li><a href="{{ route('profile.edit', auth()->user()->id)}}">
            <span class="glyphicon glyphicon-pencil"></span>
            Edit Profile
        </a></li>
        <li><a href="{{ route('own.videos') }}">
            <span class="glyphicon glyphicon-facetime-video"></span>
            My videos</a>
        </li>
        <li><a href="{{ route('video.create') }}">
            <span class="glyphicon glyphicon-plus-sign"></span>
            Add videos</a>
        </li>
        <li><a href="{{ route('own.categories') }}">
        <span class="glyphicon glyphicon-list"></span>
            Created categories
        </a></li>
    </ul>
</div>