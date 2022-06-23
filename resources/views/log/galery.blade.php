@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
  <h1 class="mt-3 mb-3">Halaman Log Galery</h1>
    <p>Cari Username:</p>
    <form action="/log/galery/search" method="POST">
      @csrf
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="admin"><br>
        <input type="text" class="form-control" placeholder="Cari..." name="search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>  
      </div>
  </form>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Action</th>
          <th scope="col">Gambar</th>
          <th scope="col">Waktu</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($post as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->account->username }}</td>
            <td>{{ $item['action'] }}</td>
            <td>
              @if ($item->galery['format'] == "Gambar")
                <a href="{{ asset('storage/' . $item->galery['image']) }}">
                <img style="width: 300px; height:200px;" src="{{ asset('storage/' . $item->galery['image']) }}"></a>
                @else
                  <video style="width: 300px; height:200px;" controls src="{{ asset('storage/'.$item->galery['image']) }}">
                    Your browser does not support the video tag.
                  </video>
                @endif
            </td>
            <td>
              {{ $item['date'] }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $post->links() }}
  </div>
</div>
@endsection