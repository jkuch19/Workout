<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Day;
use App\Models\MuscleGroup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$day = date('N');
		// $day= 2;

		$workouts = Workout::where('day_id', $day)->get();

		return view('dashboard')->with(compact('workouts'));
    }

	//pulls all the workouts for a given day indicated by the id
	public function day($id)
	{
		$day = Day::findOrFail($id);

		$workouts = $day->workouts;

		return view('days')->with(compact('workouts', 'day'));
	}

	//pulls all the workouts for a given muscle group indicated by the id
	public function muscleGroup($id)
	{
		$muscleGroup = MuscleGroup::findOrFail($id);

		$workouts = $muscleGroup->workouts;

		return view('muscle-groups')->with(compact('workouts', 'muscleGroup'));
	}
}
