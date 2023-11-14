@extends('backend.layouts.master')

@section('main_content')
    {{-- error message --}}
    @include('backend.layouts.includes.message')


    <form action="{{ route('color.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="" class="form-label">Color Name</label>
          <input type="text" name="color_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
          @error('color_name')
              <p class="text-danger">{{ $message; }}</p>
          @enderror
        </div>
        
        <button class="btn btn-primary mt-2" type="submit">Save</button>
        <button class="btn btn-danger mt-2" type="reset">Cancel</button>
    </form>
@endsection