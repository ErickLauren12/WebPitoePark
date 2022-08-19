@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <h1>Dashboard Cafe Manager</h1>
  <div style="margin-top: 30px">
    <p>Cari Nama Makanan:</p>
    <form action="{{ url('/cafe/search') }}">
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="superadmin">
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
          <th scope="col">Status</th>
          <th scope="col">Privasi</th>
          <th scope="col">Pesan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td style="text-align: center; padding:10px">
              <a href="{{ asset('storage/' . $item['image']) }}"><img style="width: 150px; height:90px;" src="{{ asset('storage/' . $item['image']) }}"></a></td>
            <td>Rp.{{ $item['price'] }}</td>
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
              @if ($item['status'] == "Accepted")
              <p class="p-3 mb-2 bg-success text-white">Dipublish</p>
              @else
              <p class="p-3 mb-2 bg-danger text-white">Draft</p>   
              @endif
            </td>
            <td>
              {{ $item['message'] }}
            </td>
            <td>
              @if ($item['status'] == "Accepted")
              <a class="btn bg-danger" style="color: white" data-toggle="modal" data-target="#exampleModal1">
                Sembunyikan
              </a>
              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Sembunyikan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ url('/cafe/dashboardadmin/reject/'.$item['id']) }}" method="post">
                        @csrf
                        <div style="margin: 10px">
                          <p>Masukan Alasan Sembunyikan:</p>
                          <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="color: white" class="btn bg-danger">Sembunyikan</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
              @else
              <a href="/cafe/dashboardadmin/confirmation/{{ $item['id'] }}" class="btn bg-success" style="color: white">Terima</a>
              <a class="btn bg-danger" style="color: white" data-toggle="modal" data-target="#exampleModal">
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
                      <form action="{{ url('/cafe/dashboardadmin/reject/'.$item['id']) }}" method="post">
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
              @endif

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $result->links() }}
  </div>
</div>
  @endsection