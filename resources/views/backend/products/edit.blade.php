@extends('backend.layouts.master') 


@section('main_content')

    @include('backend.layouts.includes.message')

    <div class="container">

            <div class="card">
                <div class="card-header">EDIT Product</div>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id)}}" method="POST">
                        @csrf

                        <div>
                            <select class="form-select" name="category_id">
                                <option>Select Category</option>
                               @foreach ($categories as $cat)
                                    <option value="{{ $cat->id}}">{{ $cat->title ?? ''}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class='form-control' value="{{ $product->title}}"/>

                            @error('title')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror

                        </div>

                        <div>
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class='form-control' value="{{ $product->price }}"/>
                            @error('price')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label>Select Colors </label>

                            @foreach ($colors as $color)
<input type="checkbox" name="color_id[]" value="{{ $color->id }}" {{ (in_array($color->id, $selectedColors))? "checked" : "" }}/>
{{ $color->color_name}}

                            @endforeach

                        </div>

                        <button class="btn btn-sm btn-primary mt-3" type="submit"> <i class="bi bi-check"></i> Save</button>
                        <a class="btn btn-sm btn-danger mt-3" href="{{ route('product.index')}}"> <i class="bi bi-x"></i> cancel</a>

                    </form>
                </div>
            </div>

    </div>


@endsection