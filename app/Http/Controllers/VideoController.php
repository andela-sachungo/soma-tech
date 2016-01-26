<?php

namespace Soma\Http\Controllers;

use Soma\Videos;
use Soma\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Soma\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    protected $getCategories;
    protected $user;

    /**
     * A constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'index',
                'show',
                'getVideosByCategory',
                'viewCount',
                ],
            ]);
        $this->getCategories = Categories::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::paginate(6);
        $categories = $this->getCategories;

        return view('welcome', compact('videos', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategories;

        return view('videos.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $category = Categories::find($request->category_id);

        $link = $this->youtubeEmbedLink($request->youtube_link);
        $videoId = $this->getYoutubeId($request->youtube_link);

        $category->videos()->create([
            'user_id' => auth()->user()->id,
            'youtube_link' => $link,
            'youtube_id' => $videoId,
            'title' => $request->title,
            'description' => $request->description,
            ]);

        flash()->success('Success!', 'You have uploaded a video');

        return redirect()->route('own.videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Videos::find($id);
        $category = Categories::find($video->category_id);

        return view('videos.show', compact('video', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->getCategories;
        $video = Videos::find($id);

        return view('videos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = Videos::find($id);

        $link = $this->youtubeEmbedLink($request->youtube_link);
        $videoId = $this->getYoutubeId($request->youtube_link);

        $video->update([
            'category_id' => $request->category_id,
            'youtube_link' => $link,
            'youtube_id' => $videoId,
            'title' => $request->title,
            'description' => $request->description,
            ]);

        flash()->success('Video Updated', 'You have updated a video!');

        return redirect()->route('own.videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videos::find($id);
        if ($video) {
            Videos::destroy($id);
            flash()->success('Deleted', 'The video has been deleted!');

            return redirect()->route('own.videos');
        }

        flash()->error('Not Found', 'The video do not exist!');

        return redirect()->route('dashboard');
    }

    /**
     * Get the videos of a particular user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVideos()
    {
        $id = auth()->user()->id;
        $videos = Videos::where('user_id', $id)->paginate(6);

        return view('videos.index')->with('videos', $videos);
    }

    /**
     * Get all the videos of a particular category.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVideosByCategory($id)
    {
        $categories = $this->getCategories;
        $videos = Videos::where('category_id', $id)->paginate(6);

        return view('categories.video', compact('videos', 'categories'));
    }

    /**
     * Save the count variable in the database.
     *
     * @param  Illuminate\Http\Request
     * @return void
     */
    public function viewCount(Request $request)
    {
        if (isset($request->id)) {
            $video = Videos::find($request->id);

            $video->play = is_null($video->play) ? 1 : $video->play + 1;
            $video->save();

            return new Response($video->play, 200);
        }
    }

    /**
     * Write the URL to allow the video to be embedded on page.
     *
     * @param  string  $youtubeLink
     * @return string
     */
    private function youtubeEmbedLink($youtubeLink)
    {
        $search = "/^(?:https?:\/\/)?(www\.youtube\.com\/)(?:embed\/|watch\?v=)([\w-]{9,12})(?:.*)$/";
        $replace = 'https://www.youtube.com/embed/$2';
        $url = preg_replace($search, $replace, $youtubeLink);

        return $url;
    }

    /**
     * Get the youtube id from the submitted url.
     *
     * @param  string  $youtubeLink
     * @return string
     */
    private function getYoutubeId($youtubeLink)
    {
        $pattern = "/^(?:https?:\/\/)?(?:www\.youtube\.com\/)(?:embed\/|watch\?v=)([\w-]{9,12})(?:.*)$/";
        preg_match($pattern, $youtubeLink, $matches);

        return $matches[1];
    }
}
