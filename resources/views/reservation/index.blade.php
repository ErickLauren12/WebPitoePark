@extends('navbar.maindashboard')
@section('container')
<div class="album py-5 bg-light">
    <div class="container">
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <h1>Menu Reservasi</h1>
  
      <div style="border: 1px solid black; padding:10px">
        <p  >Info: Jika pilihan fasilitas kosong maka buat fasilitas dulu dengan menekan tombol "Buat Fasilitas Baru"</p>
        <a href="{{ url('/facility_reservation') }}"><button class="btn btn-primary mb-3">Buat Fasilitas Baru</button></a>
        
      </div>

      <div style="border: 1px solid black; padding:10px">
        <p  >Info: Jika pilihan kategori kosong maka buat kategori dulu dengan menekan tombol "Buat Kategori Baru"</p>
        <a href="{{ url('/reservation/category') }}"><button class="btn btn-primary mb-3">Buat Kategori Baru</button></a>   
      </div>

      <div style="margin-bottom: 20px">
        <p  style="margin-top: 30px">Info: Gunakan tombol "Buat Reservasi baru" untuk membuat reservasi baru</p>
        <a href="/reservation/create"><button class="btn btn-primary">Buat Reservasi baru</button></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Cari Rerservasi
      </button>
      </div>
    
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/reservation') }}" method="get">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pemesan:</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" value="{{ request('name') }}">
                </div>
                <div class="form-group">
                  <label class="form-label">Tanggal mulai pemesanan:</label> <input type="text" class="form-control picker2" placeholder="Start Date" name="startDate" value="{{ request('startDate') }}">
              <label class="form-label">Tanggal akhir pemesanan:</label> <input type="text" class="form-control picker2" placeholder="End Date" name="endDate" value="{{ request('endDate') }}">
                </div>
                <div class="form-group">
                  <label for="facilty" class="form-label">Fasilitas: </label>
              <select class="dropdown-toggle btn btn-secondary mr-3 ml-3" name="facility_id">
                <option value="">No Filter</option>
                @foreach ($reservation_facility as $item)
                  @if (request("facility_id") == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                  @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endif 
                @endforeach
              </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>
          </div>
        </div>
      </div>
<!--
      <form action="{{ url('/reservation') }}" method="get" style="margin-top: 40px; border: 1px solid black; padding: 10px">
        @csrf
        <h2>Cari Reservasi</h2>
        <div class="mb-3">
            <div>
              <label class="form-label">Nama Pemesan:</label><input type="text" class="form-control" placeholder="Name" name="name" value="{{ request('name') }}">
            </div><br> 
            <div class="input-group">
              <label class="form-label">Tanggal mulai pemesanan:</label> <input type="text" class="form-control picker2" placeholder="Start Date" name="startDate" value="{{ request('startDate') }}">
              <label class="form-label">Tanggal akhir pemesanan:</label> <input type="text" class="form-control picker2" placeholder="End Date" name="endDate" value="{{ request('endDate') }}">
            </div><br>
            <div>
              <label for="facilty" class="form-label">Fasilitas: </label>
              <select class="dropdown-toggle btn btn-secondary mr-3 ml-3" name="facility_id">
                <option value="">No Filter</option>
                @foreach ($reservation_facility as $item)
                  @if (request("facility_id") == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                  @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endif 
                @endforeach
              </select>
            </div><br>
            <div>
              <button class="btn btn-primary" type="submit">Search</button>
            </div>  
        </div>
    </form>-->

      <br>
      <h1>Daftar Reservasi</h1>
      <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Pesan Tambahan</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reservation as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['email'] }}</td>
                  <td>{{ $item['phone'] }}</td>
                  <td>{{ $item['description'] }}</td>
                  <td>{{ date('d/m/Y (H:i)', strtotime($item['start_date'])) }}</td>
                  <td>{{ date('d/m/Y (H:i)', strtotime($item['end_date'])) }}</td>
                  <td>{{ $item->facility->name }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>
                      <form action="/reservation/delete/{{ $item['id'] }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn bg-danger" style="color: white" onclick="return confirm('Apakah anda yakin ingin menghapus reservasi ini?')">Hapus</button>
                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $reservation->links() }}
    </div>
</div>
@endsection