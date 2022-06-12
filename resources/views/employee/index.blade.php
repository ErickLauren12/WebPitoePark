@extends('navbar.main')

@section('container')
<div class="album py-5 bg-light">
    <div class="container">
      
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <form action={{ url("/register") }} method="post" style="border: 1px solid black; padding: 10px">
        <h1>Membuat Akun Pegawai Baru</h1>
        @csrf
        <div class="input-group mb-3"> 
            <label class="form-label">Username:</label> <input type="text" class="form-control mr-3 ml-3" placeholder="Username" name="username" value="{{ request('username') }}">
            <label class="form-label">Password:</label> <input type="password" class="form-control mr-3 ml-3" placeholder="Password" name="password" value="{{ request('password') }}">
            <label class="form-label">No Telp:</label> <input type="text" class="form-control mr-3 ml-3" placeholder="Phone" name="phone" value="{{ request('phone') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Register</button>
            </div>  
        </div>
    </form>
    <br>
    <h1>Data Akun Pegawai</h1>
      <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($accounts as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['username'] }}</td>
                  <td>{{ $item['phone'] }}</td>
                  <td>
                    <form action="/employee/delete/{{ $item['id'] }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $accounts->links() }}
    </div>
</div>
@endsection