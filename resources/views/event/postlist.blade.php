@extends('navbar.main')

@section('container')
<div style="margin-top: 130px" class="container marketing">
  <h1 class="mt-3 mb-3">Halaman Dashboard Event</h1>
    <a href="/event/create" class="btn btn-primary mb-3">Buat Event Baru</a>
    <p>Cari Judul Event:</p>
    <form action="/event/search">
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="admin"><br>
        <input type="text" class="form-control" placeholder="Cari..." name="search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>  
      </div>
  </form>
<div class="table-responsive">
  @if (session()->has('success'))
  <div class="alert alert-success p-3 mb-2 bg-success text-white" role="alert">
    {{ session('success') }}
  </div>
  @elseif(session()->has('fail'))
  <div class="alert p-3 mb-2 bg-danger text-white" role="alert">
    {{ session('fail') }}
  </div>
  @endif
  <div class="border border-primary" style="margin: 10px; padding: 10px">
    <p>Info:</p>
    <p>
      <a class="badge bg-info"><i style="color: white" class="bi bi-eye"></i></a> : Detail 
      <a class="badge bg-warning"><i style="color: white" class="bi bi-pencil"></i></a> : Ubah 
      <a class="badge bg-danger"><i style="color: white" class="bi bi-trash"></i></a> : Hapus
    </p>
  </div>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Status</th>
          <th scope="col">Pesan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($post as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['published_at'] }}</td>
            <td>
              @if ($item['status'] == "Accepted")
              <p class="p-3 mb-2 bg-success" style="color: white">{{ $item['status'] }}</p>
              @elseif($item['status'] == "Pending")
              <p class="p-3 mb-2 bg-warning" style="color: white">{{ $item['status'] }}</p>
              @else
              <p class="p-3 mb-2 bg-danger" style="color: white">{{ $item['status'] }}</p>
              @endif 
            </td>
            <td>
              {{ $item['message'] }}
            </td>
            <td>
              <a href="/detail/{{ $item['id'] }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
              <a href="/detail/{{ $item['id'] }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>

              <form action="/event/post/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
              </form> 
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $post->links() }}
  </div>
</div>
  @endsection