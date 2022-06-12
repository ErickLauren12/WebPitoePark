@extends('navbar.main')

@section('container')
<div style="margin-top: 130px" class="container marketing">
  <h1>Dashboard Cafe Manager</h1>
  <div style="margin-top: 30px">
    <p>Cari Nama Makanan:</p>
    <form action="/cafe/search">
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="superadmin">
          <input type="text" class="form-control" placeholder="Cari..." name="search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>  
      </div>
  </form>
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
          <th scope="col">Status</th>
          <th scope="col">Pesan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td style="text-align: center; padding:10px"><img style="width: 300px; height:200px;" src="{{ asset('storage/' . $item['image']) }}"></td>
            <td>{{ $item['price'] }}</td>
            <td>{{ $item->category->name }}</td>
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
              <a href="/cafe/dashboardadmin/confirmation/{{ $item['id'] }}" class="btn btn-sm bg-success" style="color: white">Terima</a>
              <a class="btn btn-sm bg-danger" style="color: white" data-toggle="modal" data-target="#exampleModal">
                Tolak
              </a>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/cafe/dashboardadmin/reject/{{ $item['id'] }}" method="post">
                        @csrf
                        <div style="margin: 10px">
                          <p>Masukan alasan tolak:</p>
                          <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="color: white" class="btn bg-danger">Tolak</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $result->links() }}
  </div>
</div>
  @endsection