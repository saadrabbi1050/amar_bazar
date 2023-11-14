@extends('backend.layouts.master')

@section('main_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Category Details Informations
            </div>
            <div class="card-body">
                <p>Title : {{ $category->title ?? '' }}</p>
            </div>

            Products : 

            <div class="row">
                    @foreach ($category->products as $product)
                    <div class="col-4">

                    <div class="card"> 
                        {{ $product->title ?? ''}}

                        <p> 

                            @if(file_exists(storage_path().'/app/public/products/'.$product->image ))

                              <img src="{{ asset('storage/products/'.$product->image) }}" height="100">
  
                              @else
                               Image NAI
                              @endif

                        </p>
                    </div>

                </div>

            @endforeach

            </div>
            

            <div class="card-footer m-auto">
                <a class="btn btn-sm btn-primary" href="{{ route('category.index')}}"><i class="bi bi-list"></i></a>
            </div>
        </div>
    </div>


@endsection