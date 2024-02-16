@extends('layout.app')

@section('content')
  <div class="row">
    <div class="row justify-content-center">
      <div class="col-md-8 mt-5">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <img src="{{ asset('storage/posts/' . $post->image) }}" class="w-100 rounded mx-auto d-block">
            <hr>
            <h4>{{ $post->title }}</h4>
            <p class="tmt-3">
              {!! $post->content !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
