<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the sessions.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new session.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('index');
	}

	/**
	 * Store a newly created session in memory.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(Auth::check()) { return Redirect::to("game"); }
		if(Auth::attempt(Input::only("username", "password"))) {
            return Redirect::to("game");
        }
        return "failed authentication!";
	}

    public function register() {
        $data = Input::only("username", "email", "password");

        User::create(array(
            "username" => $data["username"],
            "password" => $data["password"]
        ));

        // Stuur bevestigingsmail
        Mail::send("emails.auth.create", $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject("Laratron account creation.");
        });

        return Redirect::to("/");
    }

	/**
	 * Display the specified session.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified session.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified session in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified session from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        return Redirect::to("/");
	}

}
