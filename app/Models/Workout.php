<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
{

	use SoftDeletes;

	protected $fillable = ['name', 'day_id', 'muscle_group_id'];

	//--- Models --//

	//relationship reference between day and muscleGroup
	public function day()
	{

		return $this->belongsTo(Day::class);

	}

	//relationship reference between workout and muscleGroup
	public function muscleGroup()
	{

		return $this->belongsTo(MuscleGroup::class);

	}

	//relationship reference between workout and reps
	public function reps()
	{

		return $this->hasOne(Rep::class);

	}

	//relationship reference between workout and weights
	public function weights()
	{

		return $this->hasOne(Weight::class);

	}


	//-- Functions --//

	//updates or creates rep record for workout
	public function setReps($reps)
	{
		if($this->reps)
		{
			$this->reps->update($reps);
		}
		else
		{
			$this->reps()->create($reps);
		}
	}

	//updates or creates weight record for workout
	public function setWeights($weights)
	{
		if($this->weights)
		{
			$this->weights->update($weights);
		}
		else
		{
			$this->weights()->create($weights);
		}
	}
}
