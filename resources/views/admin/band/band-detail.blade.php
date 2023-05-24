@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class=" img-fluid img-circle" src="{{ Storage::url($band->band_poster) }}" alt="Band poster" width="40%">
            </div>

            <h3 class="profile-username text-center">{{ $band->band_name }}</h3>

            <p class="text-muted text-center"> {{ $band->genres()->get()->implode('genre_name', ' | ') }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b></b> <a href="" class="float-right">
                </a>
              </li>
            </ul>
            {{-- <h3 class="profile-username text-center">Album Band</h3> --}}
          </div>

          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Album Name</th>
                  <th>Year</th>
                  <th style="width: 40px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($albums as $number => $album)
                <tr>
                    <td>{{ $number + 1 }}</td>
                    <td>{{ $album->album_name }}</td>
                    <td>{{ $album->album_year }}</td>
                    <td class="d-flex" style="column-gap: 5px">
                        <a href="{{ route('album.detail', $album) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                        <a href="{{ route('band.detail', $band) }}" type="button" class="btn btn-info btn-sm">Lyric</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
</div>
@endsection
