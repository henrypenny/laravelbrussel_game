<?php

class ScoreController extends \BaseController {

    public function highscore() {
        $scoreList = Score::where("level", "=", "normal")
            ->take("5")
            ->join("users", "users.id", "=", "scores.user_id")
            ->orderBy("score", "DESC")
            ->get(array("username", "level", "score"))
            ->toJson();

        JavaScript::put(array("data" => $scoreList));
        return View::make('game');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($level = "normal")
	{
        $scoreList = Score::where("level", "=", $level)
            ->take("5")
            ->join("users", "users.id", "=", "scores.user_id")
            ->orderBy("score", "DESC")
            ->get()
            ->toJson();

        return $scoreList;
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
	 * Display the specified score (needed for player profile page).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified score for that level in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($level,$score)
	{

        // Get the id of the user currently logged in.
		$user = Auth::user()->id;
        // Get the score of the user currently logged in
        $userObj = Score::where("user_id", "=", $user)->where("level", "=", $level)->get();
        $userScore = $userObj[0]->score;
        // If new highscore -> save highscore to database.
        if($userScore < $score) {
            $userObj[0]->score = $score;
            $userObj[0]->save();
            echo "New highscore saved with value " . $score . ".";
        } else {
            echo $score . " was not high enough to get a new highscore.";
        }

	}


}
