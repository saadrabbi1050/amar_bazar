@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
              Product List
              @can('product_create')
                
                <a class="btn btn-sm btn-outline-primary ms-4" href="{{ route('product.create')}}" > <i class="bi bi-plus"></i> Add New Product</a>

              @endcan
              <div class="ps-5">
                <a class="btn btn-sm btn-primary" href="{{ route('product.pdf')}}" target="_blank"> <i class="bi bi-file-earmark-fill"></i> PDF</a>
                <a class="btn btn-sm btn-success" href="{{ route('product.excel')}}"> <i class="bi bi-file-earmark-excel"></i> EXCEL</a>
                <a class="btn btn-sm btn-warning" href="{{ route('product.trashlist')}}"> <i class="bi bi-trash"></i> BIN</a>


              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">Product</th>
                        <th scope="col">Colors</th>

                        <th>Category Name</th>
                        <th scope="col">Image</th>

                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php
                        $sl = 1;
                      @endphp
                      
                      @foreach ($products as $product)
                          <tr>
                            <th scope="row"> {{ $sl++ }} </th>
                            <td>{{ $product->title ?? '' }}</td>

                            <td>
                                @foreach ($product->colors as $color)
                                  <li>{{ $color->color_name ?? '' }}</li>
                                @endforeach
                            </td>

                            <td> {{ $product->category->title ?? ' '}}</td>
                            <td>
                              
                              @if(file_exists(storage_path().'/app/public/products/'.$product->image ))

                              <img src="{{ asset('storage/products/'.$product->image) }}" height="100">
  
                              @else
                               Image NAI
                              @endif

                            </td>
                            <td>{{ $product->price ?? 'No Price Setup' }}</td>
                            <td>
                              <a class="btn btn-sm btn-primary" href="{{ route('product.show', $product->id)}}"><i class="bi bi-eye"></i></a>

                              @can('product_edit')
                                
                                <a class="btn btn-sm btn-warning" href="{{ route('product.edit', $product->id)}}"><i class="bi bi-pen"></i></a>

                              @endcan

                              @can('product_delete')
                              <form action="{{ route('product.destroy', $product->id)}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

                              </form>
                              @endcan
                              
                              



                            </td>
                          </tr>
                      @endforeach

                        
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


@endsection
