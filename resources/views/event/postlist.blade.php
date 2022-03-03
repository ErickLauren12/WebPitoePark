@extends('navbar.main')

@section('container')
<div class="container marketing">
    <p></p>
    <a href="/event/create" class="btn btn-primary mb-3">Create new event</a>
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
          <th scope="col">Title</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($post as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['title'] }}</td>
            <td>{{ $item['published_at'] }}</td>
            <td>
                <a href="/detail/{{ $item['id'] }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/detail/{{ $item['id'] }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>

                <form action="/event/post/{{ $item['id'] }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>
  @endsection