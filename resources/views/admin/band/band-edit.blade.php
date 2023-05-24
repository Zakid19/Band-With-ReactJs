@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-seccond">
        <div class="card-header">
          <h3 class="card-title">Update Band</h3>
        </div>
        <form method="post" action="{{ route('band.update', $band) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="card-body">
            <div class="form-group">
              <label for="band_name">Band Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Band Name" value="{{ old('name', $band->band_name) }}">
              @error('name')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="band_poster">Band Poster</label>
              <div class="mb-3">
                <img src="{{ Storage::url($band->band_poster) }}" alt="" style="width: 170px;" height="120px" class="img-rounded">
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
              @error('image')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Band Genre</label>
                <select class="select2 select2-hidden-accessible" name="genres[]" multiple="" style="width: 100%;">
                  @foreach($genres as $genre)
                    <option {{ $band->genres()->find($genre->id) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                  @endforeach
                </select>
                @error('genres')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info btn-sm">Submit</button>
            <a href="{{ route('band.manage') }}" type="button" class="btn btn-danger btn-sm">Cancel</a>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
