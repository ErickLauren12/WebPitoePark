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
                            Menampilkan QR Code
                        </li>
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
    
        <div class="container">
        <div class="row mt-5 text-center">
       ({!! $qrcode !!}) 
            </div>
        </div>
        @endsection