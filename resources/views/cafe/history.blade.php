@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <div style="margin-bottom: 20px"><h1>History Pesanan</h1></div>
  <div class="row mb-3">
    <label for="cari">Cari Nama Pemesan</label>
    <div class="col-md-3">
        <input type="text" name="search" id="search" class="form-control" value="{{old('search')}}" placeholder="Search . . .">
    </div>
    <div class="col-md-2">
        <a  onclick="filteringData()" name="button" class="text-white btn btn-primary form-control">Search</a>
    </div>

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
          <th scope="col">Tgl Pembayaran</th>
          <th scope="col">Nama</th>
          <th scope="col">Nomor Meja</th>
          <th scope="col">Nomor Order</th>
          <th scope="col">Jenis Pembayaran</th>
          <th scope="col">Kode Verifikasi</th>
          <th scope="col">Total Price</th>
          <th scope="col">Status</th>
          <th scope="col">Verifikasi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($history as $item)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{ date('Y-m-d : H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->meja_id}}</td>
            <td>{{$item->no_order}}</td>
            <td>{{$item->jenis_pembayaran}}</td>
            <td>{{$item->kode_verifikasi}}</td>
            <td>Rp.{{$item->total_price}}</td>
            <td>{{$item->status_order}}</td>
            <td><a href="{{$item->wa_verif}}" target="_blank" class="btn btn-primary">Send</a></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="7"><b>Jumlah</b></td>
            <td><b>Rp.{{$jumlah}}</b></td>
        </tr>
      </tbody>
    </table>
    <div class="ppppp" style="display:flex; align-items: center; justify-content: center;">
        {{$history->links()}}
    </div>
  </div>
</div>
  @endsection

  <script>
    function filteringData(){
        let search = document.getElementById("search").value;

        if(search != "")
        {
            location.href = `/cafe/history?search=`+search;
        }
        else
        {
            location.href = `/cafe/history`;
        }
    }
</script>
