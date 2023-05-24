@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-seccond">
        <div class="card-header">
          <h3 class="card-title">Edit Lyric</h3>
        </div>
        <form method="post" action="{{ route('lyric.update', $lyric) }}">
            @csrf
            @method('put')
          <div class="card-body">
            <div class="form-group">
                <label for="">Band</label>
                <select class="form-control select2bs4 select2-hidden-accessible" disabled="" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected">{{ $lyric->band->band_name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Album</label>
                <select class="form-control select2bs4 select2-hidden-accessible" disabled="" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected" >{{ $lyric->album->album_name }}</option>
                </select>
            </div>
            <div class="form-group">
              <label for="Title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title', $lyric->title) }}">
              @error('title')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="band_name">Title</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="body">{{ $lyric->lyric_body }}</textarea>
                @error('body')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info btn-sm">Update</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
