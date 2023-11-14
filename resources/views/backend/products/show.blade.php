@extends('backend.layouts.master')

@section('main_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Product Details Informations
            </div>
            <div class="card-body">
                <p>Title : {{ $product->title ?? '' }}</p>
                <p>Price : {{ $product->price ?? '' }}</p>
            </div>
            <div class="card-footer m-auto">
                <a class="btn btn-sm btn-primary" href="{{ route('product.index')}}"><i class="bi bi-list"></i></a>
            </div>
        </div>
    </div>


@endsection