<?php

namespace Soma\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Store a newly created category in database.
     *
     * @param  Soma\Http\Requests\CategoriesRequest  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(CategoriesRequest $request)
    {
        $user = User::authorizedUser($request->email)->first();
        $user->categories()->create([
            'title' => $request->title,
        ]);

        flash()->success('Category Added', 'You have created a new category!');

        return redirect()->back();
    }

    /**
     * Show the form for editing the category.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $category = Categories::find($id);

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the category.
     *
     * @param  Soma\Http\Requests\CategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Categories::find($id);
        $category->update([
            'title' => $request->title,
            ]);

        flash()->success('Update successful!', 'The category has been updated.');

        return redirect()->route('own.categories');
    }

    /**
     * Delete the category.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if ($category) {
            Categories::destroy($id);

            flash()->success('Deleted', 'The category has been deleted!');

            return redirect()->back();
        }

        flash()->error('Not Found', 'The category do not exist!');

        return redirect()->route('own.categories');
    }

    /**
     * Get the categories of a particular user.
     *
     * @return view
     */
    public function getCategories()
    {
        $categories = Categories::where('user_id', auth()->user()->id)->get();

        return view('categories.own')->with('categories', $categories);
    }
}
