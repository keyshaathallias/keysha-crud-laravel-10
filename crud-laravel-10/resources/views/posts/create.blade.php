@extends('layout.app')

@section('content')
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="card">
        <div class="card-body">
          <h2>Add Post</h2>
          <hr>
          <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
              <label class="font-weight-bold"><b>Gambar</b></label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

              @error('image')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <br>
            <div class="form-group">
              <label class="font-weight-bold"><b>Judul</b></label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}" placeholder="Masukkan Judul Post">

              @error('title')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <br>
            <div class="form-group">
              <label class="font-weight-bold"><b>Konten</b></label>
              <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

              <!-- error message untuk content -->
              @error('content')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-md btn-primary">Submit</button>
            <button type="reset" class="btn btn-md btn-warning">Reset</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
