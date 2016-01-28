<?php

namespace Soma\Http\Controllers;

use Soma\User;
use Illuminate\Http\Request;
use Soma\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * A constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing user profile.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.edit')->with('user', $user);
    }

    /**
     * Update user details in database.
     *
     * @param  Soma\Http\Requests\ProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(ProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

        flash()->success('Profile Updated', 'You have updated your profile!');

        return redirect()->route('dashboard');
    }

    /**
     * Update the avatar url.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function changeAvatar(Request $request, $id)
    {
        $baseDir = 'avatar';

        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp',
            ]);
        $file = $request->file('photo');
        $name = $file->getClientOriginalName();

        $file->move($baseDir, $name);

        $user = User::find($id);
        $user->avatar = '/'.$baseDir.'/'.$name;
        $user->save();
    }
}
