@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')



    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
              Category List
              <a class="btn btn-sm btn-outline-primary ms-4" href="{{ route('category.create')}}" > <i class="bi bi-plus"></i> Add New Catagory</a>
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
                        <th scope="col">Catagory Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php
                        $sl = 1;
                      @endphp
                      
                      @foreach ($categories as $category)
                       
                          <tr>
                            <th scope="row"> {{ $sl++ }} </th>
                            <td>{{ $category->title ?? '' }}</td>
                            <td>{!!$category->description !!}{{ $category->description ? "": 'No Description Setup' }}</td>
                            <td>
                              <a class="btn btn-sm btn-primary" href="{{ route('category.show', $category->id)}}"><i class="bi bi-eye"></i></a>

                                <a class="btn btn-sm btn-warning" href="{{ route('category.edit', $category->id)}}"><i class="bi bi-pen"></i></a>
                              <form action="{{ route('category.destroy', $category->id)}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

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
