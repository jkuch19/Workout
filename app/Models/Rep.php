<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
		//only allow these fields to be automatically filled when using update()
		protected $fillable = ['set_1', 'set_2', 'set_3'];

		public function workout()
		{

			return $this->hasOne(Workout::class);

		}
}
