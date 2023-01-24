@extends('navbar.maindashboard')

@section('container')

<style>
    td{
        padding: 2%;
    }
</style>
<div class="container marketing">
    <div style="margin-bottom: 20px"><h1>Order Pesanan Cafe</h1></div>
    <div style="margin: 30px">
    
  </div>
  <form action="{{route('order.pesanan.processOrder')}}" method="POST">

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    @if (session()->has('order_complete'))
    <div class="alert alert-success" role="alert">
    Pesanan Berhasil di proses dengan nomor order : {{ session('order_complete')['no_order'] }} <br> Lihat dilaman <a href="{{ route('order.viewnota', session('order_complete')['no_order']) }}" target="_blank">ini</a>
      {{ session('success') }}
    </div>
    @endif
    @if (session()->has('failed'))
    <div class="alert alert-danger" role="alert">
      {{ session('failed') }}
    </div>
    @endif
        @csrf
    <div class="row">
        <div class="col-md-2 mt-3 mb-3">
            <a href="{{route('pesanan.masuk')}}" name="button" class="text-white btn btn-primary form-control">Pesanan Masuk</a>
        </div>
        <label for="cari">Cari Nomor Order</label>
        <div class="col-md-3">
            <input type="text" name="search" id="search" class="form-control" value="{{old('search')}}" placeholder="Nomor Order">
        </div>
        <div class="col-md-2">
            <a  onclick="filteringData()" name="button" class="text-white btn btn-primary form-control">Search</a>
        </div>
    </div>

    <div class="row">
        <input type="text" name="result" id="result" value="{{$order ? $order[0]->no_order : ""}}" hidden>
        <div class="col-md-12 text-center">
        <h4 class="mt-5">Nomor Order {{$order ? $order[0]->no_order : ""}}</h4>
        <label class="mb-4">a/n <span><b>{{$order ? $order[0]->name : ""}}</b> </span></label>
        <div class="table-responsive">
            <table class="text-center mb-2 table table-sm table-bordered" >
                <tr class="bg-dark text-white">
                    <td>No.</td>
                    <td>Menu</td>
                    <td>Jumlah</td>
                    <td>Harga/pcs</td>
                    <td>Total</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($order as $data)
                <input type="text" name="id[]" value="{{$data->id}}" hidden>
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td class="text-left">{{$data->pesanan}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>Rp. {{$data->price}}</td>
                    <td>Rp. {{$data->total_price}}</td>
                    <td rowspan="2"><a href="{{route('order.delete.index', $data->id)}}" class="btn btn-danger">X</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right" >Keterangan:</td>
                    <td colspan="2" class="text-left">{{$data->keterangan}}</td>
                </tr>
                @endforeach

                <tr>
                    <td>Total Harga</td>
                    <td colspan="3"></td>
                    <td>Rp. {{$total_harga}}</td>
                </tr>
            </table>
        </div>
        </div>
        {{-- <div class="col-md-12 mt-4 mb-3">
            <div class="row">
                <label for="">Jenis Pembayaran : </label>
                <div class="col-md-6">
                    <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12 mb-5">
            <div class="row">
                <label for="">Nomor WA +62 : </label>
                <div class="col-md-6">
                    <input type="text" name="no_wa" class="form-control" placeholder="Contoh : 87XXXXXXXXX">
                </div>
            </div>
        </div>

        <input href="{{ URL::to('/order/pdf') }}" type="submit" class="btn btn-dark" name="submit" value="Process">
    </div>
    </form>


</div>
@endsection

<script>
    function filteringData(){
        let search = document.getElementById("search").value;
        console.log(search)
        if(search != "")
        {
            location.href = `/cafe/order/pesanan?search=`+search;
        }
        else
        {
            location.href = `/cafe/order/pesanan`;
        }
    }
</script>
