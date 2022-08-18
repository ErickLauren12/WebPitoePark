@extends('navbar.maindashboard')
{{-- Data Tables --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@section('container')
<div class="container marketing">
  <div style="margin-bottom: 20px"><h1>Order Pesanan Cefe Done</h1></div>
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif

<div class="">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">No Order</th>
            <th scope="col">A/Nama</th>
            <th scope="col">Pesanan</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            <th scope="col">Meja</th>
        </tr>
      </thead>
        @foreach ($orders as $data)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$data->no_order}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->pesanan}}</td>
            <td>{{$data->keterangan}}</td>
            <td>{{$data->jumlah}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->meja_id}}</td>
        </tr>
        @endforeach
      <tbody>

      </tbody>
    </table>
  </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
