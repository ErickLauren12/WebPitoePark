@extends('navbar.main')
@section('container')

<style>
    * {
      box-sizing: border-box;
      padding: 10px;
    }

    .column {
        justify-content: space-between;
        float: left;
        width: 23%;
        padding: 10px;
        margin: 5px;
        background-color: #F5F5F5;
    }

    /* Clearfix (clear floats) */
    .row::after {

        content: "";
        clear: both;
        display: table;
    }

    @media (max-width: 600px) {
        .label-form {
            text-align: start !important;
            display: block;
        }

    }

</style>
<div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box" id="breadcrumb">
                    <h4 class="page-title">Order</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Menampilkan seluruh data order
                        </li>
                    </ol>

                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-3">
                                <select onclick="filteringData()"  name="tipe" class="form-control" id="tipe">
                                    <option value="">Filter Makanan / Minuman</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Minuman</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id= "search" name="search" class="form-control" placeholder="Cari di sini . . .">
                            </div>
                            <div class="col-md-2">
                                <button onclick="searchData()" class="btn btn-primary">Search</button>
                            </div>


                        </div>


                    </div>

                    <div class="row">
                        @foreach ($cafe as $item)
                        @if($item->action == "true")
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <a href="{{route('order.detail', ['hash' => $hash, 'id'=>$item->id])}}" style="text-decoration: none">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="{{asset('assets/img/'. $item->image)}}" style="width:100%; height: 250px; ">
                                </div>
                                <div class="card-body">
                                    {{ $item['name'] }}<br>
                                    <span class="badge badge-primary">Tersedia</span>
                                    <hr class="featurette-divider">
                                    <p class="text-center mb-0">Rp.{{ $item->price }}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0" style="background: #D3D3D3">
                                <a href="#" style="text-decoration: none">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="{{asset('assets/img/'. $item->image)}}" style="width:100%; height: 250px; ">
                                </div>
                                <div class="card-body">
                                    {{ $item['name'] }}<br>
                                    <span class="badge badge-danger">Tidak Tersedia</span>
                                    <hr class="featurette-divider">
                                    <p class="text-center mb-0">Rp.{{ $item->price }}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="ppppp" style="display:flex; align-items: center; justify-content: center;">
                            {{$cafe->links()}}
                        </div>
                </div>
            </div>
        </div>
</div>
<div class="container-fluid" id="result">
    {{-- <pesan-makanan cafes="{{ $cafe }}" mejas="{{$mejas}}"></pesan-makanan> --}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <a href = "/order/cekpesanan" class="btn btn-primary full-block block">Cek Pesanan</a>
                <form action="{{route('order.process')}}" method="POST">
                @csrf
                    <h4 class="mt-0 header-title">Daftar Order</h4>
                    <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh order</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {!!Session::get('success')!!}
                        </div>
                    @endif
                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}
                        </div>
                    @endif
                    <label style="color:red">*No order harap di catat sebelum menekan tombol pesan</label>
                    <br>
                    <div class="col-md-2 mt-3 mb-3">
                        {{-- <a href="{{route('order.cekPesanan')}}" name="button" class="text-white btn btn-primary form-control">Cek Pesanan Saya</a> --}}
                        
                    </div>
                    <br>
                    <label for="order" class="form-controller col-sm-2 text-end label-form">No Order : </label>
                    <input type="text" name="no_order" class="form-controller" value="{{$random}}" readonly>
                    <br>
                    <label for="name" class="form-controller col-sm-2 text-end label-form"> Name : </label>
                    <input type="text" name="name" class="form-controller">
                    <br>
                    <label for="name" class="form-controller col-sm-2 text-end label-form"> Pembayaran : </label>
                    <select class="form-controller" name="jenis_pembayaran" id="jenis_pembayaran">
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                        <option value="transfer">EDC</option>
                    </select>
                    <br>
                    <label for="name" class="form-controller col-sm-2 text-end label-form">Nomor WA +62 : </label>
                    <input type="text" name="no_wa" class="form-controller" placeholder="Contoh : 87XXXXXXXXX">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Pesanan</th>
                                <th>Meja</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Harga/pcs</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($orders as $detail)
                            <tr>
                                <input type="text" name="id[]" value="{{$detail->id}}" hidden>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$detail->name}}</td>
                                <td>Meja {{$detail->meja_id}}</td>
                                <td>{{$detail->jumlah}}</td>
                                <td>{{$detail->keterangan}}</td>
                                <td>Rp. {{number_format($detail->price)}}</td>
                                <td>Rp. {{number_format($detail->total_price)}}</td>
                                <td><span class="badge badge-{{ $detail->status_order == 'Processing' ? 'primary':'danger'   }}">{{ $detail->status_order }}</span></td>
                                <td><a href="{{route('order.delete', ['id' => $detail->id, 'hash' => $hash])}}" class="btn btn-danger">X</a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><b>Total harga</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp. {{number_format($total_harga)}}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <input type="submit" name="submit" class="col-md-12 btn btn-dark" id="" value="Pesan">
                </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div> <!-- end container-fluid -->
@endsection

<script>
    function filteringData(){
        let tipe = document.getElementById("tipe").value;
        if(tipe != 0)
        {
            location.href = `/order?tipe=`+tipe;
        }
    }
    function searchData(){
        let search = document.getElementById("search").value;
        location.href = `/order?search=`+search;

    }
</script>
