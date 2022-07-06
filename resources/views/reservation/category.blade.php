@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
    <h1>Menu Tambah Kategori Reservasi</h1>
    <form method="post" action="{{ url('/reservation/category/create') }}">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Masukan Nama Kategori</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
      </div>
    <button type="submit" class="btn btn-primary">Buat Kategori Baru</button>
    </form>
    <br>

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
          <th scope="col">Name</th>
          <th scope="col">Date</th>
          @if (auth()->user()->is_admin === 2)
          <th scope="col">Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($category as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['created_at'] }}</td>
            @if (auth()->user()->is_admin === 2)
            <td>
                <form action="{{ url('/facility_reservation/delete/'.$item['id']) }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">Delete</button>
                </form>
            </td>
            @endif
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  {{ $category->links() }}
</div>
@endsection