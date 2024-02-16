@extends('layout.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div>
        <h3 class="text-center my-4"><b>Tutorial Laravel 10 untuk Pemula</b></h3>
        <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5>
        <hr>
      </div>
      <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
          <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3"><i class="bi bi-plus-circle"></i> TAMBAH
            POST</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">GAMBAR</th>
                <th scope="col">JUDUL</th>
                <th scope="col">CONTENT</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)
                <tr>
                  <td class="text-center">
                    <img src="{{ asset('storage/app/public/posts/' . $post->image) }}" class="rounded"
                      style="width: 150px">
                  </td>
                  <td>{{ $post->title }}</td>
                  <td style="width: 400px">{!! $post->content !!}</td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                      action="{{ route('posts.destroy', $post->id) }}" method="POST">
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-warning mt-2"><i
                          class="bi bi-eye"></i> SHOW</a>
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary mt-2"><i
                          class="bi bi-pencil-square"></i> EDIT</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger mt-2"><i class="bi bi-trash3"></i>
                        HAPUS</button>
                    </form>
                  </td>
                </tr>
              @empty
                <div class="alert alert-danger">
                  Data Post belum Tersedia.
                </div>
              @endforelse
            </tbody>
          </table>
          {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
  </script>
@endsection
