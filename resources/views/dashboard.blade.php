@extends('layouts.head')

@section('content')

	<h1>Todays Workout: {{ date('l, F d Y') }}</h1>

	@if ($workouts->count() < 1)
		<h2 class="mt-5">No workout today!</h2>
	@endif
	
	@include('workout-table')

@endsection
