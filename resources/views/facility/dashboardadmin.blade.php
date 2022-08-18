@extends('navbar.maindashboard')

@section('container')

<div class="container marketing">
  <h1>Dashboard Fasilitas Manager</h1>
  <div style="margin-top: 30px">
    <p>Cari Nama Fasilitas:</p>
    <form action="/facility/search">
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
  <div class="alert alert-success p-3 mb-2 bg-success text-white" role="alert">
    {{ session('success') }}
  </div>
  @elseif(session()->has('fail'))
  <div class="alert p-3 mb-2 bg-danger text-white" role="alert">
    {{ session('fail') }}
  </div>
  @endif
  <div style="margin: 30px">
    <p>Donwload</p>
    <a href="{{ url('facility/extract/1') }}" class="btn btn-info">Excle</a>
    <a href="{{ url('facility/extract/2') }}" class="btn btn-info">CSV</a>
    <a href="{{ url('facility/extract/3') }}" class="btn btn-info">PDF</a>
  </div>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Status</th>
          <th scope="col">Privasi</th>
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
            <td>
              @if ($item['status'] == "Accepted")
              <p class="p-3 mb-2 bg-success text-white">Dipublish</p>
              @else
              <p class="p-3 mb-2 bg-danger text-white">Draft</p>   
              @endif
            </td>
            <td>{{ $item['message'] }}</td>
            <td>
              @if ($item['status'] == "Accepted")
              <a href="/facility_detail_dashboard/{{ $item['id'] }}" class="btn bg-info" style="color: white">Detail</a>
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
                      <form action="{{ url('/facility/dashboardadmin/reject/'.$item['id']) }}" method="post">
                        @csrf
                        <div style="margin: 10px">
                          <p>Masukan alasan Sembunyikan:</p>
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
              <a href="/facility_detail_dashboard/{{ $item['id'] }}" class="btn bg-info" style="color: white">Detail</a>
              <a href="/facility/dashboardadmin/confirmation/{{ $item['id'] }}" class="btn bg-success" style="color: white">Terima</a>
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
                      <form action="{{ url('/facility/dashboardadmin/reject/'.$item['id']) }}" method="post">
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
    {{ $facility->links() }}
  </div>
</div>
@endsection