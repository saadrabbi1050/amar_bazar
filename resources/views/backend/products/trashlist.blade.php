@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
              Product Trashlist  

              <a  href="{{ route('product.restore_all')}}" class="btn btn-sm btn-outline-danger ms-5" >Restore ALL</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">Product</th>
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
                            <td>{{ $product->price ?? 'No Price Setup' }}</td>
                            <td>
                              <a class="btn btn-sm btn-primary" href="{{ route('product.restore', $product->id) }}"> <i class="bi bi-arrow-repeat"></i> Restore</a>

                              <form action="{{ route('product.delete', $product->id)}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Parmanent Delete</button>

                              </form>

                            </td>
                          </tr>
                      @endforeach

                        
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


@endsection