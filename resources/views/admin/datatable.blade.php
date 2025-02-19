@extends('admin.layout._main')
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<div class="btn btn-primary">
			<i class="fa fa-plus"></i>
			Add Book
		</div>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Books</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm border table-stripped">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Title/image</th>
								<th>isbn/genre/language</th>
								<th>Description</th>
								<th>price/formats</th>
								<th>free chapter</th>
							</tr>
						</thead>
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection