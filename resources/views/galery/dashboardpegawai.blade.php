@extends('navbar.maindashboard')

@section('container')
<div class="container marketing" style="margin-top: 30px">
  <h1>Dashboard Galery Pegawai</h1>
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
  <div style="margin-bottom: 40px; padding:20px ;border: 1px solid black">
  <form method="post" action="{{ url('/galery/upload') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">Upload Gambar/ Video</label>
    
        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
        <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
              <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>
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
                <a href="{{ asset('storage/' . $item['image']) }}">
                <img style="width: 300px; height:200px;" src="{{ asset('storage/' . $item['image']) }}"></a>
                @else
                  <video style="width: 300px; height:200px;" controls src="{{ asset('storage/'.$item['image']) }}">
                    Your browser does not support the video tag.
                  </video>
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
                <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Apakah anda yakin untuk menghapus file ini?')">Hapus</button>
                  </form>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $result->links() }}
  </div>
</div>
  @endsection