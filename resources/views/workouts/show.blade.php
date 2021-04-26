@extends('layouts.head')

@section('content')

	@if ($workout)

		<h1>Edit: {{ $workout->name }}</h1>
		
		<form class="general-form" action="{{ '/workout/'.$workout->id }}" method="post">

	@else

		<h1>Create New Workout</h1>

		<form class="general-form" action="/workout" method="post">

	@endif

	@csrf

	<div class="row">

		<div class="col-sm-12">

			<div class="form-group">

				<label>Name: </label>

				<input type="text" name="name" id="name" value="{{ $workout ? $workout->name : "" }}" placeholder="Enter a Name" class="form-control @error('name') is-invalid @enderror">

				@error('name')

    				<div class="alert alert-danger">{{ $message }}</div>

				@enderror

			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-12">

			<div class="form-group">

				<label>Day: </label>

				<select name="day_id" class="form-control @error('day_id') is-invalid @enderror" >

					<option disabled selected value> -- Select a Day -- </option>

					@foreach ($days as $day)

						<option value="{{ $day->id }}" {{ ($workout && $workout->day_id == $day->id) ? "selected=true" : "" }}>{{ $day->name }}</option>

					@endforeach

				</select>

				@error('day_id')

    				<div class="alert alert-danger">{{ $message }}</div>

				@enderror

			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-12">

			<div class="form-group">

				<label>Muscle Group: </label>

				<select name="muscle_group_id" class="form-control @error('muscle_group_id') is-invalid @enderror">

					<option disabled selected value> -- Select a Muscle Group -- </option>

					@foreach ($muscleGroups as $muscleGroup)

						<option value="{{ $muscleGroup->id }}" {{ ($workout && $workout->muscle_group_id == $muscleGroup->id) ? "selected=true" : "" }}>{{ $muscleGroup->name }}</option>

					@endforeach

				</select>

				@error('muscle_group_id')

    				<div class="alert alert-danger">{{ $message }}</div>

				@enderror

			</div>

		</div>

	</div>

	<h3 class="mt-5">Reps</h3>

	<div class="row">

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 1: </label>

				<input type="number" name="reps[set_1]" value="{{ $workout && $workout->reps ? $workout->reps->set_1 : "" }}" class="form-control">

			</div>

		</div>

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 2: </label>

				<input type="number" name="reps[set_2]" value="{{ $workout && $workout->reps ? $workout->reps->set_2 : "" }}" class="form-control">

			</div>

		</div>

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 3: </label>

				<input type="number" name="reps[set_3]" value="{{ $workout && $workout->reps ? $workout->reps->set_3 : "" }}" class="form-control">

			</div>

		</div>

	</div>

	<h3 class="mt-5">Weights</h3>

	<div class="row">

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 1: </label>

				<input type="number" name="weights[set_1]" value="{{ $workout && $workout->weights ? $workout->weights->set_1 : "" }}" class="form-control">

			</div>

		</div>

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 2: </label>

				<input type="number" name="weights[set_2]" value="{{ $workout && $workout->weights ? $workout->weights->set_2 : "" }}" class="form-control">

			</div>

		</div>

		<div class="col-sm-12 col-md-4">

			<div class="form-group">

				<label>Set 3: </label>

				<input type="number" name="weights[set_3]" value="{{ $workout && $workout->weights ? $workout->weights->set_3 : "" }}" class="form-control">

			</div>

		</div>

	</div>

	<button class="btn btn-primary mt-5 back"><a href="/workouts">Back</a></button>

	<button class="btn btn-primary mt-5" type="submit">Save</button>

	</form>

@endsection
