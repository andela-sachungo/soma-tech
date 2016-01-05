<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>
    <div class="list-group" id="list-scrollable">
        @foreach ($categories as $category)
            <a href = "#" class="list-group-item">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div> <!-- .panel panel-info -->