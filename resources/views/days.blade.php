@extends('layouts.head')

@section('content')

	<h1>{{ $day->name }}'s Workout</h1>

	@include('workout-table')

@endsection
