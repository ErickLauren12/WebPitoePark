@extends('navbar.maindashboard')

@section('container')

<div class="container marketing">
  <h1>Dashboard Fasilitas</h1>
  <div style="margin-top: 30px">
    <p>Cari Nama Fasilitas:</p>
    <form action="{{ url('/facility/search') }}">
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="admin">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>  
      </div>
  </form>
  </div>
  <a href="/facility/create" class="btn btn-primary mb-3 mt-3">Buat Fasilitas Baru</a>
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
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Status</th>
          <th scope="col">Pesan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($facility as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['created_at'] }}</td>
            <td>
              @if ($item['status'] == "Accepted")
              <p class="p-3 mb-2 bg-success" style="color: white">{{ $item['status'] }}</p>
              @elseif($item['status'] == "Pending")
              <p class="p-3 mb-2 bg-warning" style="color: white">{{ $item['status'] }}</p>
              @else
              <p class="p-3 mb-2 bg-danger" style="color: white">{{ $item['status'] }}</p>
              @endif 
            </td>
            <td>{{ $item['message'] }}</td>
            <td>
              <a href="/facility_detail_dashboard/{{ $item['id'] }}" class="btn bg-info">Detail</a>
              <a href="/facilty/{{ $item['id'] }}/edit" class="btn bg-warning">Ubah</a>
                <form action="{{ url('/facility/delete/'.$item['id']) }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn bg-danger" onclick="return confirm('Apakah anda ingin menghapus fasilitas ini?')">Hapus</button>
                </form>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $facility->links() }}
  </div>
</div>
@endsection