<div class="panel-group" id="accordion">

	<div class="panel panel-default">

        <div class="panel-heading">

			<li class="nav-item">

			    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">

			        <i class="nav-icon fas fa-home"></i>

			        <p>Home</p>

			    </a>

			</li>

		</div>

	</div>

	<div class="panel panel-default">

        <div class="panel-heading">

			<li class="nav-item">

			    <a href="/workouts" class="nav-link {{ Request::route()->getName() == 'workouts' ? 'active' : '' }}">

			        <i class="nav-icon fas fa-dumbbell"></i>

			        <p>Workouts</p>

			    </a>

			</li>

		</div>

	</div>

	<div class="panel panel-default">

        <div class="panel-heading">

			<li class="nav-item">

			    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="nav-link {{ Request::route()->getName() == 'day' ? 'active' : '' }}">

			        <i class="nav-icon fas fa-calendar-alt"></i>

			        <p>Days</p>

			    </a>

			</li>

		</div>

		<div class="panel-collapse collapse {{ Request::route()->getName() == 'day' ? 'show' : '' }}" id="collapseOne">

			<div class="panel-body">

				<ul>

					@foreach ($days as $day)

						<li>

							<a href="{{ '/day/'.$day->id }}">{{ $day->name }}</a>

						</li>

					@endforeach

				</ul>

			</div>

		</div>

		<div class="panel panel-default">

	        <div class="panel-heading">

				<li class="nav-item">

				    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="nav-link {{ Request::route()->getName() == 'muscleGroup' ? 'active' : '' }}">

				        <i class="nav-icon fas fa-male"></i>

				        <p>Muscle Group</p>

				    </a>

				</li>

			</div>

			<div class="panel-collapse collapse {{ Request::route()->getName() == 'muscleGroup' ? 'show' : '' }}" id="collapseTwo">

				<div class="panel-body">

					<ul>

						@foreach ($muscleGroups as $muscleGroup)

							<li>

								<a href="{{ '/muscle-group/'.$muscleGroup->id }}">{{ $muscleGroup->name }}</a>

							</li>

						@endforeach

					</ul>

				</div>

			</div>
			
</div>
