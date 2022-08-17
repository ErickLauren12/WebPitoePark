@extends('navbar.maindashboard')

@section('container')
<div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box" id="breadcrumb">
                    <h4 class="page-title">Qr Code</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Menampilkan seluruh QR Code
                        </li>
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row mt-5">
                <form class="form-inline" action="{{ route('meja.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="no_meja" placeholder="Masukkan No Meja">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="text" class="form-control" name="link" placeholder="Masukkan Link">
                      </div>
                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                  </form>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No.Meja</th>
                        <th scope="col">Link</th>
                        <th scope="col">QR code</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($meja as $meja)
                     <tr>
                        <td>{{ $meja->no_meja }}</td>
                        <td>{{ $meja->link }}</td>
                        <td>
                            <a href="{{ route('meja.generate',$meja->id) }}" class="btn btn-primary">Generate</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        @endsection