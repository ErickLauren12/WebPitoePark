<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Invoice</title>
    <style>
        .container {
            width: 75%;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }

        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }

        /* .flex-container > div {
            -ms-flex: 1;  /* IE 10 
            flex: 1;
        } */
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>Kendhi Pitoe Park</h2>
            <small> Kali Jaten, Selotapak, Kec. Trawas, Kabupaten Mojokerto, Jawa Timur
            </small>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table no-wrap user-table mb-0">
                <thead>
                <tr>
                    <th scope="col" class="border-0 text-uppercase font-medium">Nomor Order</th>
                    <th scope="col" class="border-0 text-uppercase font-medium">Tanggal</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pl-4">{{ $data[0]->no_order }}</td>
                        <td class="pl-4">{{ date('Y-m-d : H:i:s', strtotime($data[0]->created_at)) }}</td>
                    </tr>
               
                
                </tbody>
                </thead>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table no-wrap user-table mb-0">
                <thead>
                <tr>
                    <th scope="col" class="border-0 text-uppercase font-medium">Nama Product</th>
                    <th scope="col" class="border-0 text-uppercase font-medium">Jumlah</th>
                    <th scope="col" class="border-0 text-uppercase font-medium">Harga/Qty</th>
                    <th scope="col" class="border-0 text-uppercase font-medium">Total Harga</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="pl-4">{{ $item->pesanan }}</td>
                        <td class="pl-4">{{ $item->jumlah }}</td>
                        <td class="pl-4">Rp {{ number_format($item->price) }}</td>
                        <td class="pl-4">Rp {{ number_format($item->total_price) }}</td>
                    </tr>
                    @endforeach
               
                
                </tbody>
                </thead>
            </table>
        </div>

        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Grand Total</li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp {{ number_format($total_harga) }} </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
</body>
</html>