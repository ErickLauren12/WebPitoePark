@extends('navbar.main')

@section('container')
<div style="margin-top: 130px" class="container marketing">
  <div style="border: 1px solid black; padding: 20px">
    <h1>Membuat Kategori Makanan Baru</h1>
    <form method="post" action={{ url("/category/create") }}>
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Masukan Nama Kategori Makanan</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
      </div>
    <button type="submit" class="btn btn-primary">Buat Kategori</button>
    </form>
  </div>

    <br>
    <h1>Daftar Kategori Makanan</h1>
<div class="table-responsive">
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['created_at'] }}</td>
            <td>
                <form action="/category/delete/{{ $item['id'] }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>
@endsection