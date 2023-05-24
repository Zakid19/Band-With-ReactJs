@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class=" img-fluid img-circle" src="{{ Storage::url($album->album_poster) }}" alt="Band poster" width="25%">
            </div>

            <h3 class="profile-username text-center">{{ $album->album_name }}</h3>

            <p class="text-muted text-center">{{ $album->band->band_name }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              @foreach($album->lyrics() as $lyric)
              <li class="list-group-item">
                <b></b> <a class="float-right">1,322</a>
              </li>
              @endforeach
            </ul>
            <a href="{{ route('band.detail', $band) }}" class="btn btn-primary btn-block"><b>Show Band</b></a>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
</div>
@endsection
