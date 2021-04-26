@foreach ($workouts as $workout)

	<div class="">

		<table class="table workout-table">

			<thead>

				<th class="title text-center" colspan="6">{{ $workout->name }}</th>

			</thead>

			<tbody>

				<tr>

					<td colspan="2" class="subtitle">Set 1</td>

					<td colspan="2" class="subtitle">Set 2</td>

					<td colspan="2" class="subtitle">Set 3</td>

				</tr>

				<tr>

					<td>Reps</td>

					<td>Weight</td>

					<td>Reps</td>

					<td>Weight</td>

					<td>Reps</td>

					<td>Weight</td>

				</tr>

				<tr>

					<td>{{ $workout->reps->set_1 ?? "" }}</td>

					<td>{{ $workout->weights->set_1 ?? "" }}</td>

					<td>{{ $workout->reps->set_2 ?? "" }}</td>

					<td>{{ $workout->weights->set_2 ?? "" }}</td>

					<td>{{ $workout->reps->set_3 ?? "" }}</td>

					<td>{{ $workout->weights->set_3 ?? "" }}</td>

				</tr>

			</tbody>

		</table>
		
	</div>

@endforeach
