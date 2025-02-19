<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .product-card {
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
     @include('comp.navbar')
    <!-- Product Grid -->
    <div class="container mt-4">
        <div class="row">
            <!-- Product Card 1 -->
            @foreach($books as $row)
           
           		<div class="col-md-3 mx-auto">
           			<a href="{{ url('/') }}/item/details/{{$row->book_id}}">
	                <div class="card product-card">
	                    <img src="{{ url('/') }}/public/book_images/{{$row->cover_image}}" class="card-img-top"    alt="Product 1">
	                    <div class="card-body">
	                        <h5 class="card-title">{{$row->title}}</h5>
	                        
	                        <p class="card-text"><strong class="text-danger">Price : {{$row->price}}</strong></p>
	                        <div class="row mt-3">
	                        	<div class="col">
	                        		 <?php $userid; ?>
					                    @if(auth()->guard('client')->check())
					                    <?php   @$userid = auth()->guard('client')->user()->id; ?>  
					                    @else
					                    <?php $userid = 00; ?> 
					                    @endif
					                   <form method="post" action="{{ route('add.to.cart') }}"> @csrf
					                    <div class="mb-3">
					                        <input type="hidden" name="userid" value="{{ $userid }}">
					                        <input type="hidden" name="prod_id" value="{{$row->book_id}}">
					                         
					                        <input type="hidden" name="qty" class="form-control" id="quantity" value="1" min="1" style="width: 100px;">
					                    </div>
					                    <button type="submit" class="btn btn-info rounded-0">
					                        <i class="fas fa-cart-plus"></i> Add to Cart
					                    </button>  
					                    </form> 
	                        		  	
	                        	</div>
	                        	<div class="col"> 
			                     <?php  
			                        @$check = DB::table('orders')
			                        ->where('user_id', $userid)
			                        ->where('order_status', 'cart')
			                        ->where('product_id', $row->book_id)
			                        ->get();
			                    ?>
		                        @if(count($check))
		                        <div class="mt-3">
		                              <a href="" class="btn btn-secondary btn-add-to-cart rounded-0">Checkout</a>
		                        </div>  
		                        @endif 
	                        	</div>
	                        </div>
	                      
	                    </div>
	                </div>
	                </a>
	            </div>
           	
            @endforeach

            

            <!-- Add more product cards as needed -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2023 E-Commerce. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>