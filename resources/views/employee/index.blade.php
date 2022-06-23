@extends('navbar.maindashboard')

@section('container')
    <div style="margin-top: 20px" class="container marketing">
      
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @elseif(session()->has('fail'))
      <div class="alert alert-danger" role="alert">
        {{ session('fail') }}
      </div>
      @endif
      <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
        Daftarkan Pegawai Baru
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" style="text-align: center" id="exampleModalLabel">Mendaftarkan Akun Pegawai Baru</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action={{ url("/register") }} method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="form-group mb-3">
                      <label class="form-label">Username:</label><input type="text" class="form-control mr-3 ml-3" placeholder="Username" name="username" value="{{ request('username') }}">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Password:</label><input type="password" class="form-control mr-3 ml-3" placeholder="Password" name="password" value="{{ request('password') }}">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Nama:</label><input type="text" class="form-control mr-3 ml-3" placeholder="Nama" name="name" value="{{ request('name') }}"><br>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Alamat:</label><input type="text" class="form-control mr-3 ml-3" placeholder="Alamat" name="address" value="{{ request('address') }}"><br>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">No Telepon:</label><input type="text" class="form-control mr-3 ml-3" placeholder="Nomor Telepon" name="phone" value="{{ request('phone') }}"><br>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Register</button>
            </div>
          </form>
          </div>
        </div>
      </div>

    <br>
    <h1 style="margin-bottom: 40px">Data Akun Pegawai</h1>
    <p>Cari Pegawai:</p>  
    <form action="{{ url('/employee/search') }}" method="GET">
      @csrf
      <div class="input-group mb-3"> 
        <input type="hidden" name="type" value="admin"><br>
        <input type="text" class="form-control" placeholder="Masukan Nama Pegawai..." name="search">
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
                <th scope="col">Nama</th>
                <th scope="col">No Telp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($accounts as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['username'] }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['phone'] }}</td>
                  <td>{{ $item['address'] }}</td>
                  <td>
                    @if ($item['is_admin'] === 1)
                      <p>Pegawai</p>
                    @else
                      <p>Manager</p>
                    @endif
                  </td>
                  <td>
                    <form action="/employee/delete/{{ $item['id'] }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button style="color: white" class="btn bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                 <!-- <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2">
                      Ganti Password
                    </button>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Masukan password baru</p>
                            <form action={{ url("/employee/editStore") }} method="post">
                              @csrf
                            <div class="form-group mb-3" style="padding: 30px">
                              <input type="hidden" name="id" value="{{ $item['id'] }}">
                              <label class="form-label">Password:</label><input type="password" class="form-control mr-3 ml-3" placeholder="Password" name="password" value="{{ request('password') }}">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </td>-->
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $accounts->links() }}
    </div>
@endsection