<?php

class PasswordController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function edit()
	{
        if(!Auth::check()) return Redirect::route('session.create');
        else return View::make('user.password')->with('msg', '');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        DD(User::find(1)->updated_at . '   ' . User::find(1)->last_login);
		$old = Input::get('a');
        $new = Input::get('b');

        if (Hash::check($old, Auth::user()->password))
        {
            try
            {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($new);
                $user->save();
            }catch(Exception $e)
            {
                $error = new Error();
                $error->message = 'User: ' . Auth::user()->id . '  Message: ' . $e->getMessage();
                $error->line = $e->getLine();
                $error->file = 'PasswordController.php';
                $error->time = time();
                $error->save();
                return [0, 'Password failed to updated because: ' . $e->getMessage() . ' at line ' . $e->getLine()];
            }
            return [1,'Password updated successfully!'];
        }
        else
        {
            return [0,'Old password doesn\'t match account.'];
        }
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
