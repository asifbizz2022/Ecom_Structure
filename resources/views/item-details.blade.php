<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - E-Commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-details {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .product-price {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: bold;
        }
        .product-rating {
            color: #ffc107;
        }
        .product-description {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .btn-add-to-cart {
            width: 100%;
            padding: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body> 
    <!-- Navigation Bar -->
  @include('comp.navbar') 
    <!-- Product Details Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Product Image -->
            @foreach($books as $row)
            <div class="col-md-6"> 
                <img src="{{ url('/') }}/public/book_images/{{$row->cover_image}}" class="product-image w-100" alt="Product Image">
            </div>
            <!-- Product Information -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title">{{$row->title}}</h1> 
                    <div class="product-price">Rs {{$row->price}}</div>
                    <div><strong>Author : </strong>{{$row->author}}</div>
                    <div><strong>ISBN : </strong>{{$row->isbn}}</div>
                    <div><strong>Language : </strong>{{$row->language}}</div>
                    <div><strong>Genre : </strong>{{$row->genre}}</div> 
                    <div><strong>Format : </strong>{{$row->format}}</div> 
                    <div><strong>Free Chapter : </strong>{{$row->free_chapter}}</div>
                    <div class="product-description">
                        {{$row->description}}
                    </div>
                    
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
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" name="qty" class="form-control" id="quantity" value="1" min="1" style="width: 100px;">
                    </div>
                    <button type="submit" class="btn btn-primary btn-add-to-cart rounded-0">
                        <i class="fas fa-cart-plus"></i> Add to Cart
                    </button> 

                    </form> 
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
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-light text-center py-4">
        <div class="container">
            <p>&copy; 2023 E-Commerce. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>