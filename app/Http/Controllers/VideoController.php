<?php

namespace Soma\Http\Controllers;

use Soma\Videos;
use Soma\Categories;
use Soma\Http\Requests\VideoRequest;
use Soma\Http\Controllers\Controller;

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
                ]
            ]);
        $this->getCategories = Categories::all();
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::with('category')->get();
        return view('videos.index')->with('videos', $videos);
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

        $category->videos()->create([
            'user_id' => $this->user->id,
            'youtube_link' => $link,
            'title' => $request->title,
            'description' => $request->description,
            ]);

        // FLASH MESSAGE

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video= Videos::find($id);
        return view('videos.show')->with('video', $video);
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
        $video= Videos::find($id);

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
        $video->update([
            'category_id' => $request->category_id,
            'youtube_link' => $request->youtube_link,
            'title' => $request->title,
            'description' => $request->description,
            ]);

        // FLASH MESSAGE
        return redirect()->route('dashboard');
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
            return redirect()->route('dashboard');
        }

        // REDIRECT WITH MESSAGE VIDEO NOT FOUND
        return redirect()->route('dashboard');

    }

    /**
     * Write the URL to allow the video to be embeded on page.
     *
     * @param  string  $youtubeLink
     * @return \Illuminate\Http\Response
     */
    private function youtubeEmbedLink($youtubeLink)
    {
        $search     = "/^(?:https?:\/\/)?(www\.youtube\.com\/)(?:embed\/|watch\?v=)([\w-]{9,12})(?:.*)$/";
        $replace    = 'https://www.youtube.com/embed/$2';
        $url        = preg_replace($search, $replace, $youtubeLink);

        return $url;
    }
}
