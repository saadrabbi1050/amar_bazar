@extends('backend.layouts.master')

@section('main_content')

@include('backend.layouts.includes.message')



    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
              slider List
              <a class="btn btn-sm btn-outline-primary ms-4" href="{{ route('slider.create')}}" > <i class="bi bi-plus"></i> Add New slider</a>
              
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">slider</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @php
                        $sl = 1;
                      @endphp
                      
                      @foreach ($sliders as $slider)
                       
                          <tr>
                            <th scope="row"> {{ $sl++ }} </th>
                            <td>{{ $slider->title ?? '' }}</td>

                            <td>

                              @if(file_exists(storage_path().'/app/public/sliders/'.$slider->image ))

                              <img src="{{ asset('storage/sliders/'.$slider->image) }}" height="100">
  
                              @else
                               Image NAI
                              @endif

                            </td>

                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('slider.edit', $slider->id)}}"><i class="bi bi-pen"></i></a>
                              <form action="{{ route('slider.destroy', $slider->id)}}" method="POST" style="display: inline">
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
