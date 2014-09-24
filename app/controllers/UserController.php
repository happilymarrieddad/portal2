<?php

class UserController extends \BaseController {

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
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $usern = Input::get('username');
		$pass  = Input::get('password');
        $email = Input::get('email');
        $fname = Input::get('first_name');
        $lname = Input::get('last_name');
        $addr1 = Input::get('address1');
        $addr2 = Input::get('address2');
        $apsut = Input::get('apt_suite');
        $city  = Input::get('city');
        $state = Input::get('state');
        $cntry = Input::get('country');
        $zip   = Input::get('zip');

        $validator = Validator::make(
            array(
                'username'  => $usern,
                'password'  => $pass,
                'email'     => $email
            ),
            array(
                'username'  => 'required|unique:users',
                'password'  => 'required|min:8',
                'email'     => 'required|email|unique:users'
            )
        );

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }

        $user = new User();
        $user->username   = $usern;
        $user->password   = Hash::make($pass);
        $user->email      = $email;
        $user->first_name = $fname;
        $user->last_name  = $lname;
        $user->address1   = $addr1;
        $user->address2   = $addr2;
        $user->apt_suite  = $apsut;
        $user->city       = $city;
        $user->state      = $state;
        $user->country    = $cntry;
        $user->zip        = $zip;
        $user->admin      = false;
        $user->active     = true;
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();

        if (Auth::attempt(array('email' => $email, 'password' => $pass)))
        {
            return Redirect::route('home.index');
        }
        else Redirect::route('session.create');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
