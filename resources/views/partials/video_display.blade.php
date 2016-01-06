<div class="col-sm-4">
    <div class="thumbnail box-shadow">
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $video->youtube_link }}"></iframe>
        </div> <!-- .embed-responsive -->
        <div class="caption vid-thumbnail" id="align">
            <h4>{{ $video->title }}</h4>
            <h6>{{ substr($video->created_at, 0, 10) }}</h6>
            <p id="desc"> {{ $video->description }}</p>
            <a href="{{ route('video.show', $video->id) }}" class="btn btn-default btn-sm pull-right">More Info</a>
            @can('userVideo', $video)
                <div class="row">
                    <div class="col-sm-2">
                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-md btn-info btn-shape">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <!-- Form to send a HTTP DELETE request -->
                        {!! Form::open(array('route' => array('video.destroy', $video->id), 'method' => 'delete')) !!}
                            <button type="submit" class = "btn btn-md btn-default btn-shape"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endcan
        </div> <!-- .caption -->
    </div> <!-- .thumbnail -->
</div> <!-- .col-sm-4 -->