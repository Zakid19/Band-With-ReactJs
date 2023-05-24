@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-seccond">
        <div class="card-header">
          <h3 class="card-title">Add Genre</h3>
        </div>
        <form method="post" action="{{ route('genre.store') }}">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="band_name">Genre Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Genre Name" value="{{ old('name') }}">
              @error('name')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info btn-sm">Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
