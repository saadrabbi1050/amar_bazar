@extends('backend.layouts.master') 


@section('main_content')

    @include('backend.layouts.includes.message')

    <div class="container">

            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                    <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <select class="form-select" name="category_id"  onchange="getProduct(this)">
                               @foreach ($categories as $cat)
                                    <option value="{{ $cat->id}}">{{ $cat->title ?? ''}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div>
                            <select id="products">

                            </select>
                        </div>


                        <div>
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class='form-control'/>

                            @error('title')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror

                        </div>

                        <div>
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class='form-control'/>
                            @error('price')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class='form-control'/>
                            @error('image')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description"  id="ckeditor" class='form-control'> </textarea>
                            @error('description')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>


                        <div>
                            <label>Select Colors </label>

                            @foreach ($colors as $color)
                                <input type="checkbox" name="color_id[]" value="{{ $color->id}}"/> {{ $color->color_name }}
                            @endforeach
                        </div>
                       

                        <button class="btn btn-sm btn-primary mt-3" type="submit"> <i class="bi bi-check"></i> Save</button>
                        <a class="btn btn-sm btn-danger mt-3" href="{{ route('product.index')}}"> <i class="bi bi-x"></i> cancel</a>

                    </form>
                </div>
            </div>

    </div>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'ckeditor' );

        let productSection = document.getElementById('products');

        function getProduct(obj){

            let catID = obj.value;

            let formattedOptions = '';

            const API = `/api/get-products-with-cat/${catID}`;

            fetch(API)
                .then(res => res.json())
                .then( data => {
                    data.products.forEach(product => {
                        formattedOptions += `<option value="${product.id}">${product.title}</option>`;
                    });

                    productSection.innerHTML = formattedOptions;
                })


        }

    </script>

@endsection