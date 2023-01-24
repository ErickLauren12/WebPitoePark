
@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <div style="margin-bottom: 20px"><h1>Pesanan Masuk</h1></div>
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
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order as $item)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{ date('Y-m-d : H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->meja_id}}</td>
            <td>{{$item->no_order}}</td>
            <td>{{$item->jenis_pembayaran}}</td>
            <td>{{$item->kode_verifikasi}}</td>
            <td><a href="{{route('detail.pesanan.masuk',$item->id)}}" class="btn btn-primary">Detail</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="ppppp" style="display:flex; align-items: center; justify-content: center;">
        {{$order->links()}}
    </div>
  </div>
</div>
  @endsection

  <script>
    function filteringData(){
        let search = document.getElementById("search").value;

        if(search != "")
        {
            location.href = `/cafe/pesanan-masuk?search=`+search;
        }
        else
        {
            location.href = `/cafe/pesanan-masuk`;
        }
    }
</script>
