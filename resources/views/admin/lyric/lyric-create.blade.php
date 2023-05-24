@extends('layouts.admin')
@push('scripts')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('layouts.message')
      <div class="card card-seccond">
        <div class="card-header">
          <h3 class="card-title">Create Lyric</h3>
        </div>
        <div id="create-lyric" endpoint="{{ route('lyric.store') }}"></div>
      </div>
    </div>
</div>
@endsection
