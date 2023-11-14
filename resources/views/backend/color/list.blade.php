@extends('backend.layouts.master')

@section('main_content')
    {{-- success message --}}






    @include('backend.layouts.includes.message')

    <a href="{{ route('color.create') }}" class="btn btn-sm btn-outline-primary my-2">Add color</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">SN</th>
                    <th class="col-md-2">Color Name</th>
                    <th class="col-md-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sn = 1
                @endphp
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td class="d-flex">
                            <a class="btn btn-sm btn-warning me-3" href="{{ route('color.edit', $color->id) }}">Edit</a>
                            <form action="{{ route('color.destroy', $color->id) }}" method="POST">
                                @method('DELETE')
                                @csrf                            
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach                    
                    
            </tbody>
        </table>
    </div>
    
@endsection