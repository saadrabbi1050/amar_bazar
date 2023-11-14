
<x-frontend.master>


    <div class="container">
        <div class="row">
            <div class="col-md-3 p-2">
                <h4>Category List</h4>
            <ul class="list-group">

                @foreach ($categories as $cat)
                <li class="list-group-item" aria-disabled="true"> {{ $cat->title }}</li>

                @endforeach
                
              </ul>

            </div>
            <div class="col-md-9">
                <div class="card p-2 mt-4">
                    <h4>{{ $category->title }}</h4>

                </div>

                <h5 class="mt-2">All Products</h5>
                <hr>

                <div class="row">

                    @foreach ($category->products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 product-card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('storage/products/'.$product->image) }}" height="230px"  width="100%">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $product->title }}</h5>
                                  <p class="card-text">{{ $product->description }}</p>
                                  <p>Price : <del>{{ $product->price + 50 }}</del> {{ $product->price }} BDT</p>
                                  <a href="#" class="btn btn-primary">Details</a>
                                  <a href="#" class="btn btn-success">Add Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


</x-frontend.master>