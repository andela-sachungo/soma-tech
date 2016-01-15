<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>
    <div class="list-group list-scrollable">
        @foreach ($categories as $category)
            <a href = "{{ route('category.videos', $category->id) }}" class="list-group-item">{{ $category->title }}</a>
        @endforeach
    </div>
</div> <!-- .panel panel-info -->
