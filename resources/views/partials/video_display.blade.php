<div class="col-sm-4">
    <div class="thumbnail box-shadow">
        <img src="http://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg">
        <a href="{{ route('video.show', $video->id) }}" id="test">
            <div class="caption vid-thumbnail" id="align">
                <h4>{{ $video->title }}</h4>
                <h6>{{ date("M d, Y", strtotime(substr($video->created_at, 0, 10))) }}</h6>
                <p id="desc"> {{ $video->description }}</p>
            </div> <!-- .caption -->
        </a>
        <div class="more">
            <div class="row">
                <div class="col-sm-4 myBtn">
                    <h5>
                        <span><i class="fa fa-eye"></i></span>
                            @if(is_null($video->play))
                                0
                            @else
                                {{ $video->play }}
                            @endif
                    </h5>
                </div>
                <div class="col-sm-8 myBtn">
                    @can('userVideo', $video)
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-md btn-info btn-shape">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <!-- Form to send a HTTP DELETE request -->
                                    {!! Form::open(array('route' => array('video.destroy', $video->id), 'method' => 'delete')) !!}
                                        <button type="submit" class = "btn btn-md btn-default btn-shape">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div> <!-- .row -->
        </div> <!-- .more -->
    </div> <!-- .thumbnail -->
</div> <!-- .col-sm-4 -->