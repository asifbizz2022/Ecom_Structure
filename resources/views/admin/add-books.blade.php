@extends('admin.layout._main')
@section('title')
Add Book	
@endsection
@section('content')	
<div class="row">
	<div class="col-md-12">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{Session::get('message')}}</strong>  <a href="#" class="alert-link"> </a>  
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif


		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Book</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('add.book') }}" method="post" enctype="multipart/form-data">@csrf
					 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" value="{{ old('title') }}" class="form-control">
								<small class="text-danger">
									@error('title')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>Author</label>
								<input type="text" name="author" value="{{ old('author') }}" class="form-control">
								<small class="text-danger">
									@error('author')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>ISBN</label>
								<input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control">
								<small class="text-danger">
									@error('isbn')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>Formats</label>
								<select class="select" name="format">
									 
									<option value="1">Html</option>
									<option value="2">Pdf</option>
									<option value="3">Audio</option>
									<option value="4">ePub</option>
									<option value="4">Mobi</option>
								</select>
							</div> 
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" value="{{ old('description') }}" name="description">
									
								</textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Language</label>
								<input type="text" name="language" value="{{ old('language') }}" class="form-control">
								<small class="text-danger">
									@error('language')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>Genre</label>
								<input type="text" name="genre" value="{{ old('genre') }}" class="form-control">
								<small class="text-danger">
									@error('genre')
									{{$message}}
									@enderror
								</small>
							</div>

							<div class="form-group">
								<label>Price</label>
								<input type="text" name="price" value="{{ old('price') }}" class="form-control">
								<small class="text-danger">
									@error('price')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>Free Sampler</label>
								<input type="text" name="freechapter" value="{{ old('freechapter') }}" class="form-control">
								<small class="text-danger">
									@error('freechapter')
									{{$message}}
									@enderror
								</small>
							</div>
							<div class="form-group">
								<label>Upload Image</label>
								<input type="file" class="form-control" name="image" accept='image/*'  onchange="readURL(this)">
								<small class="text-danger">
									@error('image')
									{{$message}}
									@enderror
								</small>
							</div>
							<div>
								<img   alt="No Image" id="img" style='height:150px; width: 150px;'>
							</div>
						</div>
					</div>
					 
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	function readURL(input) {
    if (input.files && input.files[0]) {
    
      var reader = new FileReader();
      reader.onload = function (e) { 
        document.querySelector("#img").setAttribute("src",e.target.result);
      };

      reader.readAsDataURL(input.files[0]); 
    }
  }
</script>
@endsection