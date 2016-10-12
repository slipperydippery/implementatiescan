<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Instantie;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::get();
        return view ('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! User::where('email', '=', $request->email)->get()->count())
        {
            $user = new User();
            $user->initial_pwd = 'password';
            $user->password = Hash::make($user->initial_pwd);
            $user->name_first = $request->name_first;
            $user->name_last = $request->name_last;
            $user->email = $request->email;
            $user->save();
        }
        else {
            return 'Gebruiker met deze email bestaat al';
        }
        return Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return ($user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function edituserinfo(Request $request, User $user, Scan $scan)
    {
        $user->update($request->all());
        $user->save();
        $instantie = Instantie::findOrFail($request->instantie);
        // $instantie->users->save($user);
        foreach($user->instanties->intersect($scan->instanties) as $this_instantie)
        {
            $user->instanties()->detach($this_instantie);
        }
        $user->instanties()->save($instantie);
        return Redirect::back();
    }

    public function editbaseuser(Request $request, User $user)
    {
        $user->update($request->all());
        $user->save();
        return redirect()->back();
    }

    public function password()
    {
        return view('auth.passwords.change');
    }

    public function changepassword(Requests\ChangePasswordRequest $request, User $user)
    {
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::route('home')->with('success', 'password has been changed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
