@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <div style="margin-bottom: 20px"><h1>Dashboard Cafe</h1></div>

    <a href="/cafe/create" class="btn btn-primary mb-3">Buat Menu Baru</a>
    <a href="{{route('order.pesanan.cafe')}}" class="btn btn-danger mb-3">Order Pesanan</a>
    <a href="{{route('order.pesanan.process')}}" class="btn btn-warning mb-3">Proses Order</a>
    <a href="{{route('order.history')}}" class="btn btn-primary mb-3">History Pesanan</a>
    <div style="margin-top: 30px">
      <p>Cari Nama Makanan:</p>
      <form action="{{ url('/cafe/search') }}">
        <div class="input-group mb-3">
          <input type="hidden" name="type" value="admin">
            <input type="text" class="form-control" placeholder="Cari..." name="search">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    </div>
    <div style="margin: 30px">
    <p>Download</p>
    <a href="{{ url('cafe/extract/1') }}" class="btn btn-info">Excel</a>
    <a href="{{ url('cafe/extract/2') }}" class="btn btn-info">CSV</a>
    <a href="{{ url('cafe/extract/3') }}" class="btn btn-info">PDF</a>
  </div>
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
          <th scope="col">Gambar</th>
          <th scope="col">Harga</th>
          <th scope="col">Kategori</th>
          <th scope="col">Status Makanan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td><img style="width: 150px; height:90px;" src="{{ asset('assets/img/' . $item['image']) }}"></td>
            <td>Rp.{{ $item['price'] }}</td>
            <td>{{ $item->category->name }}</td>
            @if($item->action == "true")
            <td>Tersedia</td>
            @else
            <td>Tidak Tersedia</td>
            @endif
            <td>
              <a href="/cafe/{{ $item['id'] }}/edit" class="btn btn-warning mb-3" style="color: white">Edit</a>

              <form action="/cafe/delete/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mb-3" style="color: white" onclick="return confirm('Apakah kamu yakin menghapus menu ini?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $result->links() }}
  </div>
</div>
  @endsection
