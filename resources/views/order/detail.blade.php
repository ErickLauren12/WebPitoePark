@extends('navbar.main')
@section('container')
<style>
    * {
      box-sizing: border-box;
      padding: 10px;
    }

    .column {
        width: 50%;
        padding: 10px;
        margin: 5px;
        background-color: #F5F5F5;
        margin-left: auto;
        margin-right: auto;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .detail-image {
        width: 100%;
        max-width: 400px;
        max-height: 600px;
    }
</style>

<div class="row">
    @foreach ( $data as $ca)
    <div class="column">
        <form action="{{route('order.store', ['id' => $data[0]->id, 'hash' => $hash])}}" method="POST">
        @csrf
        <center>
            <img src="{{ asset('assets/img/' . $ca['image']) }}" alt="Snow" class="detail-image">
            <div class="text-center mt-0">
                <label for="name" class="text-center"><b>{{$ca->name}} <br> Rp.{{$ca->price}}/pcs</b></label><br>
                <input type="number" name="jumlah" style="width: 100%;">
                @if (session()->has('failed'))
                <p style="color: red;">{{ session('failed') }}</p>
                @endif
                <p>Keterangan :</p>
                <textarea name="keterangan" id="keterangan" cols="21" rows="3" style="width: 100%"></textarea>
                <input type="submit" class="btn text-white" name="submit" value="Pesan" style="width: 100%; background-color: #343a40;">
            </div>
        </center>
        </form>
    </div>

    @endforeach
</div>


@endsection


