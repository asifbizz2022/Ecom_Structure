@extends('admin.layout._main')
@section('title')Books @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{ route('add') }}">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add Book
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Books</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Title/image</th>
								<th>ISBN</th>
								<th>Genre</th>
								<th>Language</th>
								<th>Format</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
							
						</thead>
						<tbody>
							<?php $sno = 1; ?>
							@foreach($data as $row)
								<tr>
									<td>{{$sno}}</td>
									<td>
									<div>
										 {{$row->title}}
									</div>
									<div>
										<img src="{{ url('/') }}/public/book_images/{{ $row->cover_image }}" width="100">
									</div>
									</td>
									<td>
										<div>{{$row->isbn}}</div>
									</td>
									<td>
										<div>{{$row->genre}}</div>
									</td>
									<td>	
										<div>{{$row->language}}</div> 
									</td>
									<td> 	
									 	<div>{{$row->format}}</div> 
									</td>
									<td>	
										<div>{{$row->price}}</div> 
									</td>
									<td>
										<div>
											<a href="{{ route('book.delete', $row->book_id) }}" class="btn btn-sm  btn-danger rounded-0 "> <i class="fa fa-trash mr-2" onclick="confirm('Are you sure want to delete')"></i>Delete</a>
										</div><br>	
										<div>
											<a href="{{ route('book.edit', $row->book_id) }}" class="btn btn-sm  btn-info rounded-0 "> <i class="fa fa-edit mr-2"></i>Edit</a>
										</div>
									</td> 
								</tr>
							<?php $sno++; ?>
							@endforeach
						</tbody>
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection