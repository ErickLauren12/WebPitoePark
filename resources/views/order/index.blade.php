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

                    <select onclick="filteringData()"  name="tipe" class="form-control col-md-3" id="tipe">
                        <option value="">Filter Makanan / Minuman</option>
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                    </select>
                    <div class="row">
                        @foreach ($cafe as $item)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <a href="{{route('order.detail',$item->id)}}" style="text-decoration: none">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="{{asset('assets/img/'. $item->image)}}" style="width:100%; height: 250px; ">
                                </div>
                                <div class="card-body">
                                    <span class="badge badge-primary">{{ $item->name }}</span><br>
                                    {{ $item['name'] }}<br>
                                    <hr class="featurette-divider">
                                    <p class="text-center mb-0">Rp.{{ $item->price }}</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
</div>
<div class="container-fluid" id="result">
    <pesan-makanan cafes="{{ $cafe }}" mejas="{{$mejas}}"></pesan-makanan>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <form action="{{route('order.process')}}" method="POST">
                @csrf
                    <h4 class="mt-0 header-title">Daftar Order</h4>
                    <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh order</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{session('failed')}}
                        </div>
                    @endif
                    <label style="color:red">*No order harap di catat sebelum menekan tombol pesan</label>
                    <br>
                    <label for="order" class="form-controller col-md-1 text-end">No Order : </label>
                    <input type="text" name="no_order" class="form-controller" value="{{$random}}" readonly>
                    <br>
                    <label for="name" class="form-controller col-md-1 text-end"> Name : </label>
                    <input type="text" name="name" class="form-controller">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Pesanan</th>
                                <th>Meja</th>
                                <th>jumlah</th>
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
                                <td>Rp. {{number_format($detail->price)}}</td>
                                <td>Rp. {{number_format($detail->total_price)}}</td>
                                <td><span class="badge badge-{{ $detail->status_order == 'Processing' ? 'primary':'danger'   }}">{{ $detail->status_order }}</span></td>
                                <td><a href="{{route('order.delete.cafe', $detail->id)}}" class="btn btn-danger">X</a></td>
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
                        <input type="submit" name="submit" class="col-md-12 btn btn-dark" id="" value="Pesan">
                    </form>
                    </div>
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
</script>
