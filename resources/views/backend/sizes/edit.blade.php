@extends('backend.layouts.master') 


@section('main_content')

    @include('backend.layouts.includes.message')

    <div class="container">

            <div class="card">
                <div class="card-header">EDIT Size</div>
                <div class="card-body">
                    <form action="{{ route('size.update', $size->id)}}" method="POST">
                        @csrf
                        <div>
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class='form-control' value="{{ $size->title}}"/>

                            @error('title')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror

                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description"  id="ckeditor" class='form-control' >{!!$size->description !!}</textarea>
                            @error('description')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-sm btn-primary mt-3" type="submit"> <i class="bi bi-check"></i> Save</button>
                        <a class="btn btn-sm btn-danger mt-3" href="{{ route('size.index')}}"> <i class="bi bi-x"></i> cancel</a>

                    </form>
                </div>
            </div>

    </div>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>


@endsection
