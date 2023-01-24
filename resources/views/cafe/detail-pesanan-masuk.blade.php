
@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <div style="margin-bottom: 20px"><h1>Detail Pesanan Masuk {{$order[0]->name}}</h1></div>
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
          <th scope="col">Pesanan</th>
          <th scope="col">Price</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Total Price</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order as $item)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$item->pesanan}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->jumlah}}</td>
            <td>{{$item->total_price}}</td>
            <td>{{$item->keterangan}}</td>
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
