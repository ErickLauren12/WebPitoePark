@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <h1>Dashboard Galery Manager</h1>
<div class="table-responsive">
  @if (session()->has('success'))
  <div class="alert alert-success p-3 mb-2 bg-success text-white" role="alert">
    {{ session('success') }}
  </div>
  @elseif(session()->has('fail'))
  <div class="alert p-3 mb-2 bg-danger text-white" role="alert">
    {{ session('fail') }}
  </div>
  @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Gambar</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td style="text-align: center; padding:10px">
                @if ($item['format'] == "Gambar")
                <a href="{{ asset( $item['image']) }}">
                <img style="width: 300px; height:200px;" src="{{ asset($item['image']) }}"></a>
                @else
                <iframe width="400" height="200px" src="{{ url($item['image']) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                  <!--<video style="width: 300px; height:200px;" controls src="{{ asset('storage/'.$item['image']) }}">
                    Your browser does not support the video tag.
                  </video>-->
                @endif
            </td>
            <td>
                @if ($item['status'] == "Accepted")
                <p class="p-3 mb-2 bg-success text-white">{{ $item['status'] }}</p>
                @else
                <p class="p-3 mb-2 bg-warning text-dark">{{ $item['status'] }}</p>
                @endif 
                
            </td>
            <td>
                @if ($item['status'] == "Accepted")
                <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn bg-danger" style="color: white" onclick="return confirm('Apakah anda yakin untuk menghapus file ini?')">Hapus</button>
                  </form>
                @else
                <a href="/galery/confirmation/{{ $item['id'] }}" class="btn btn-sm bg-info mb-3" style="color: white">Terima</a>
                <form action="/galery/delete/{{ $item['id'] }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn bg-danger" style="color: white" onclick="return confirm('Apakah anda yakin untuk menolak gamabr/ video ini dan menghapusnya?')">Tolak</button>
                </form>
                @endif 
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $result->links() }}
  </div>
</div>
  @endsection