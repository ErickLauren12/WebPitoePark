@extends('navbar.main')
@section('container')
<div class="container marketing">
    
    <div style="margin-bottom: 20px"><h1>Cek Pesanan Saya</h1></div>
    <div class="row mb-3">
      <label for="cari">Cari Nomor WhatsApp</label>
      <div class="col-md-3">
          <input type="text" name="search" id="search" class="form-control" value="{{old('search')}}" placeholder="Contoh : 8123456789 tanpa 0">
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
            <th scope="col" >Tgl Pembayaran</th>
            <th scope="col">Nama</th>
            <th scope="col">Nomor Meja</th>
            <th scope="col">Nomor Order</th>
            <th scope="col">Jenis Pembayaran</th>
            <th scope="col">Status Order</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order as $item)
          @if($item->status_order == "Processing")
          <tr class="text-warning" style="!important">
          @elseif($item->status_order == "Success")
          <tr class="text-primary" style="!important">
           @elseif($item->status_order == "Done")
          <tr class="text-success" style="!important">  
          @endif
              <td>{{$loop->index+1}}</td>
              <td>{{ date('Y-m-d : H:i:s', strtotime($item->created_at)) }}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->meja_id}}</td>
              <td>{{$item->no_order}}</td>
              <td>{{$item->jenis_pembayaran}}</td>
              @if($item->status_order == "Pending")
              <td>Pesanan Belum Dipesan, Segera Selesaikan Pesanan</td>
              @elseif($item->status_order == "Processing")
              <td>Pesanan Sedang Diproses, Silahkan Ke Kasir untuk pembayaran</td>
              @elseif($item->status_order == "Success")
              <td>Pesanan Akan Segera Diantar</td>
              @elseif($item->status_order == "Done")
              <td>Pesanan Telah Selesai, Terima Kasih</td>
              @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      @if(count($order) != null )
      {{-- <div class="ppppp" style="display:flex; align-items: center; justify-content: center;">
          {{$order->links()}}
      </div> --}}
      @endif
    </div>
  </div>
@endsection

<script>
    function filteringData(){
        let search = document.getElementById("search").value;

        if(search != "")
        {
            location.href = `/order/cekpesanan?search=`+search;
        }
        else
        {
            location.href = `/order/cekpesanan`;
        }
    }
</script>