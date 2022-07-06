@extends('navbar.maindashboard')
@section('container')
<div class="album py-5 bg-light">
    <div class="container">
    <div style="margin-bottom: 30px">
        <h1>Statistik Pemesanan Fasilitas Tahun {{ $tahunDisplay }}</h1>
    </div>

    <p>Cari Bedasarkan Tahun:</p>
    <div class="input-group mb-3">
        <form action="{{ url('/reservation/statistics/search') }}" method="POST">
            @csrf
            <select name="tahun" class="custom-select" style="margin-bottom: 20px" aria-label="Default select example">
                @foreach ($tahun as $item)
                    @if ($item['tahun'] == $tahunDisplay)
                    <option selected>{{ $item['tahun'] }}</option>
                    @else
                    <option>{{ $item['tahun'] }}</option>
                    @endif
                @endforeach
            </select>
            <input class="btn btn-primary" class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
    
    <div class="input-group mb-3" style="margin-bottom: 30px">
        
    </div>
    <div class="container">
        <h1>Data Statistik Pemesanan Fasilitas</h1>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    </div>

    <div class="container">
        <h1>Data Statistik Pemesanan Kategori</h1>
        <div id="columnchart_material2" style="width: 800px; height: 500px;"></div>
    </div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      var result = <?php echo $hasil; ?>;

      var result2 = <?php echo $hasil2; ?>;

      console.log(result2);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
            result
        );
        
        var data2 = google.visualization.arrayToDataTable(
            result2
        );

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        var chart2 = new google.charts.Bar(document.getElementById('columnchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        chart2.draw(data2, google.charts.Bar.convertOptions(options));
      }
    </script>
@endsection