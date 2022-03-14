@extends('navbar.main')

@section('container')
<div class="container marketing">
    <h1>Facility Editor Menu</h1>
    <form method="post" action="/facility_reservation/create">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Create Facility Name</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
      </div>
    <button type="submit" class="btn btn-primary">Create New Facility</button>
    </form>
    <br>

<div class="table-responsive">
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($facility as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['created_at'] }}</td>
            <td>
                <form action="/facility_reservation/delete/{{ $item['id'] }}" method="post" class="d-inline">
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
</div>
@endsection