@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
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
                    <a href="{{ route('genre.create') }}" type="button" class="btn btn-success btn-sm">Create</a>
                </span>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Genre</th>
                  <th>Slug</th>
                  <th style="width: 40px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($genres as $number => $genre)
                <tr>
                    <td>{{ $number + 1 }}</td>
                    <td>{{ $genre->genre_name }}</td>
                    <td>{{ $genre->slug }}</td>
                    <td class="d-flex" style="column-gap: 5px">
                        <a href="{{ route('genre.detail', $genre) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                        <a href="{{ route('genre.edit', $genre) }}" type="button" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('genre.delete', $genre) }}" method="post">
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
