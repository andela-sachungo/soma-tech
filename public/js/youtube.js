var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var scriptTag = document.getElementsByTagName('script')[0];
scriptTag.parentNode.insertBefore(tag, scriptTag);

var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
    events: {
        'onStateChange': onPlayerStateChange
        }
    });
}

var count = 0;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && count == 0) {
        var pathname = window.location.pathname;
        var match = pathname.match(/(?:\/video\/)(\w+)/);
        var id = match[1];

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/views/video",
            data: {id: id},
            success: function(resp) {
                console.log(resp);
                $("#count").html(resp + ' Views');
            },
            error: function(exception) {
                console.log(exception);
            }
        });
        count++;
    }
}
