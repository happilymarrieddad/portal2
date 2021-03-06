<?php

class SessionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if(Auth::check()) return Redirect::route('home.index');
		return View::make('session.create')->with('msg', '');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$email = Input::get('email');
        $pass  = Input::get('password');
        if (Auth::attempt(array('email' => $email, 'password' => $pass)))
        {
            $user = User::find(Auth::user()->id);
            $user->last_login = time();
            $user->save();
            return Redirect::route('home.index');
        }
        return View::make('session.create')->with('msg', '<span style="color: red">Login failed... please verify credentials</span>');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
        //
	}

    public function logout()
    {
        Auth::logout();
        return Redirect::route('session.create');
    }

}
