<?php

namespace Soma\Http\Controllers;

use Gate;
use Soma\User;
use Soma\Categories;
use Soma\Http\Requests\CategoriesRequest;

class CategoryController extends Controller
{
    /**
     * A constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'getVideosByCategory',
                ],
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $categories = Categories::all();

        return view('categories.index')->with('categories', $categories);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $user = User::authorizedUser($request->email)->first();
        $user->categories()->create([
            'title' => $request->title,
        ]);

        // FLASH MESSAGE

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Categories::find($id);
        $category->update([
            'title' => $request->title,
            ]);

        // FLASH MESSAGE
        return redirect()->route('own.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if ($category) {
            Categories::destroy($id);

            return redirect()->back();
        }

        // REDIRECT WITH MESSAGE CATEGORY NOT FOUND
        return redirect()->route('dashboard');
    }

    /**
     * Get the categories of a particular user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $categories = Categories::where('user_id', auth()->user()->id)->get();

        return view('categories.own')->with('categories', $categories);
    }
}
