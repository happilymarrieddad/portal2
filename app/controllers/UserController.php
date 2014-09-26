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
        $cntry = Input::get('country');

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
        $user->first_name = '';
        $user->last_name  = '';
        $user->address1   = '';
        $user->address2   = '';
        $user->apt_suite  = '';
        $user->city       = '';
        $user->state      = '';
        $user->country    = $cntry;
        $user->zip        = '';
        $user->admin      = false;
        $user->active     = true;
        $user->created_at = time();
        $user->updated_at = time();
        $user->last_login = time();
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
	 * @return Response
	 */
	public function show()
	{
        if(!Auth::check()) return Redirect::route('session.create');
        else return View::make('user.show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
        if(!Auth::check()) return Redirect::route('session.create');
        else return View::make('user.edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update()
	{
        $email = Input::get('a');
        $fname = Input::get('b');
        $lname = Input::get('c');
        $address1 = Input::get('d');
        $address2 = Input::get('e');
        $aptsuite = Input::get('f');
        $city = Input::get('g');
        $state = Input::get('h');
        $country = Input::get('i');
        $zip = Input::get('j');

        try
        {
            $user = User::find(Auth::user()->id);
            $user->email = $email;
            $user->first_name = $fname;
            $user->last_name = $lname;
            $user->address1 = $address1;
            $user->address2 = $address2;
            $user->apt_suite = $aptsuite;
            $user->city = $city;
            $user->state = $state;
            $user->country = $country;
            $user->zip = $zip;
            $user->save();
        }catch(Exception $e)
        {
            $error = new Error();
            $error->message = 'User: ' . Auth::user()->id . '  Message: ' . $e->getMessage();
            $error->line = $e->getLine();
            $error->file = 'UserController.php';
            $error->time = time();
            $error->save();
            return [0, 'User Profile failed to updated because: ' . $e->getMessage() . ' at line ' . $e->getLine()];
        }
        return [1, 'Profile updated successfully!'];
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
