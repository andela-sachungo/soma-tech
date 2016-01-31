<div class="col-sm-2">
    <ul class="nav nav-stacked" id="sidebar">
        <li><a href=" {{ route('dashboard') }}">
            <span class ="glyphicon glyphicon-dashboard"></span>
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
            Categories
        </a></li>
    </ul>
</div>