@extends('movie.layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-3">

			<form role="form" id="search" method="POST" action="{{ URL::route('searchpost') }}" data-template="{{ URL::route('parseitem') }}">

				<div class="form-group">

					<div class="input-group">
						<input type="text" name="search" class="form-control" value="toy story 3">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>

				</div>

			</form>

			<div class="results">

			</div>

		</div>
	</div>
</div>

@stop