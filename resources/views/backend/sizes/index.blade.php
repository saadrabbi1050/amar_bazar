@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
              Size List
              <a class="btn btn-sm btn-outline-primary ms-4" href="{{ route('size.create')}}" > <i class="bi bi-plus"></i> Add New Size</a>
              
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">Size</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php
                        $sl = 1;
                      @endphp
                      
                      @foreach ($sizes as $size)
                       
                          <tr>
                            <th scope="row"> {{ $sl++ }} </th>
                            <td>{{ $size->title ?? '' }}</td>
                            <td>{!!$size->description !!}{{ $size->description ? "": 'No Description Setup' }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('size.edit', $size->id)}}"><i class="bi bi-pen"></i></a>
                              <form action="{{ route('size.destroy', $size->id)}}" method="POST" style="display: inline">
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
