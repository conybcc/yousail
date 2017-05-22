<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    /**
     * avatarUpdateShow
     * @param   $request
     * @return
     */
    public function avatarUpdateShow(Request $request)
    {
        return view('avatar');
    }

    /**
     * avatarUpdateSubmit
     * @param   $request
     * @return
     */
    public function avatarUpdateSubmit(Request $request)
    {
        if (!$request->hasFile('avatar')) {
            return ['error'];
        }

        $file = $request->file('avatar');
        $file->storeAs('public', Auth::user()->id . '.png');

        return redirect()->route('home');
    }
}
