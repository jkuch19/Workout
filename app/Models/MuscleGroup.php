<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{

		public function workouts()
		{

			return $this->hasMany(Workout::class);

		}
}
