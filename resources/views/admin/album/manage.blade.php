@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layouts.message')
        <div class="card">
          <div class="card-header">
            <div class="card-title">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </div>
            </div>

            <div class="card-tools">
                <span class="badge">
                    <a href="{{ route('album.create') }}" type="button" class="btn btn-success btn-sm">Create</a>
                </span>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Album Name</th>
                  <th>Band</th>
                  <th>Year</th>
                  <th style="width: 40px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($albums as $number => $album)
                <tr>
                    <td>{{ $number + 1 }}</td>
                    <td>{{ $album->album_name }}</td>
                    <td>{{ $album->band->band_name }}</td>
                    <td>{{ $album->album_year }}</td>
                    <td class="d-flex" style="column-gap: 5px">
                        <a href="{{ route('album.detail', $album) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                        <a href="{{ route('album.edit', $album) }}" type="button" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('album.delete', $album) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
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
