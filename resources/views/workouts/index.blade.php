@extends('layouts.head')

@section('content')

	<a href="/workout" class="btn btn-primary">Create Workout</a>

	<table class="table table-striped">

		<thead>

			<th>Workouts</th>

			<th width="80px"></th>

		</thead>

		<tbody>

			@foreach($workouts as $workout)

				<tr id="{{ 'item-'.$workout->id }}">

					<td>{{ $workout->name }}</td>

					<td>

						<a href="{{ '/workout/'.$workout->id }}"><i class="fas fa-edit"></i></a>

						<i class="fas fa-trash delete-button" data-href="{{ '/workout/delete/'.$workout->id }}" data-item-id="{{ $workout->id }}"></i>

					</td>

				</tr>

			@endforeach

		</tbody>

	</table>

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>

				</div>

				<div class="modal-body">

					Are you sure you want to delete this workout?

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>

					<a class="btn btn-danger" href="#" id="deleteConfirm" data-item-id="">Delete</a>

				</div>

			</div>

		</div>

	</div>


	<script>

	    // display a modal (small modal)
	    $(document).on('click', '.delete-button', function(event) {

	        let href = $(this).data('href');
			let itemId = $(this).data('item-id');

			$('#deleteConfirm').attr('href', href);

			$('#deleteConfirm').data('item-id', itemId);

			$('#deleteModal').modal('show');

	    });

		//closes the modal if you click close
		$(document).on('click', '#closeModal', function(event) {

			$('#deleteModal').modal('hide');

		});

		//delete's selected entry if you click delete
		$(document).on('click', '#deleteConfirm', function(event) {

			event.preventDefault();

		   	let href = $(this).attr('href');
			let itemId = $(this).data('item-id');

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

		   	$.ajax({
				url: href,
				method: 'POST',
				success: function(result) {

					$('#deleteModal').modal('hide');

					if(result.success == 'true')
						$('#item-' + itemId).remove();
				},
				error: function(jqXHR, status, error) {
	                console.log(error);
            	}
			});
	   });

	</script>

@endsection
