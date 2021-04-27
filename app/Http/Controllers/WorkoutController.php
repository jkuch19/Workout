<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Day;
use App\Models\MuscleGroup;

class WorkoutController extends Controller
{
	//grabs all the workouts.
  	public function index()
	{
		$workouts = Workout::orderBy('name')->get();

    	return view('workouts.index', [
      		'workouts' => $workouts,
    	]);
  	}

	//grabs all the workouts, days, MGs.
  	public function show($id=false)
  	{
		if(!$id)
		{
			$workout = null;
		}
		else
		{
			$workout = Workout::findOrFail($id);
		}

		$days = Day::all();

		$muscleGroups = MuscleGroup::all();

    	return view('workouts.show', [
			'workout' => $workout,
			'days' => $days,
			'muscleGroups' => $muscleGroups
		]);
	}

	//Passed an id, if null creates new workout record. If !null updates existing record.
	public function store($id=false)
	{
		//form validation
		$validated = request()->validate([
			'name' => 'required|max:255',
			'day_id' => 'required',
			'muscle_group_id' => 'required',
			'reps.set_1' => 'required',
			'weights.set_1' => 'required'
		]);

		if(!$id)
		{
			$workout = Workout::create(request()->all());
		}
		else
		{
			$workout = Workout::findOrFail($id);
			$workout->update(request()->all());
		}

		$workout->setReps(request('reps'));

		$workout->setWeights(request('weights'));

		return redirect('/workouts');
	}

	//passed an id, deletes existing record.
	public function destroy($id)
	{
		$workout = Workout::findOrFail($id);

		$workout->delete();

		return response()->json(['success' => 'true']);
	}
}
