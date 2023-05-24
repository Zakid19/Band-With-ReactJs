@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-seccond">
        <div class="card-header">
          <h3 class="card-title">Create Album</h3>
        </div>
        <form method="post" action="{{ route('album.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label>Band</label>
                <select class="form-control" name="band" id="band_id" style="width: 100%;">
                  @foreach($bands as $band)
                  <option value="{{ $band->id }}">{{ $band->band_name }}</option>
                  @endforeach
                </select>
                @error('band')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="name">Album Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Album Name" value="{{ old('name') }}">
              @error('name')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="band_poster">Album Poster</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image" value="{{ old('image') }}">
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
                <label>Album Year</label>
                <select class="form-control" name="year" style="width: 100%;"  value="{{ old('year') }}">
                @for ($year = 1980; $year <= 2023; $year ++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
                </select>
                @error('year')
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
