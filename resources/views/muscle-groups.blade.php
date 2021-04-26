@extends('layouts.head')

@section('content')

	<h1>{{ $muscleGroup->name }} Workouts</h1>

	@include('workout-table')

@endsection
