@extends('navbar.main')

@section('container')
<div class="album py-5 bg-light">
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
    <div class="container">
      <form method="post" action="/cafe/filter">
        @csrf
        <div class="mb-3">
          <label for="categoryFood" class="form-label">Food Category: </label>
          <select class="dropdown-toggle btn btn-secondary" name="category_id">
            <option value="all">No Filter</option>
            @foreach ($category as $item)
              @if (old('category_id', $search) == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
              @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endif 
            @endforeach
          </select>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($result as $item)
            <div class="col">
                <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('storage/' . $item['image']) }}">
                  <div class="card-body">
                    <p class="card-text">
                      <span class="badge badge-primary">{{ $item->category->name }}</span><br>
                      {{ $item['name'] }}<br>
                      Harga: Rp.{{ $item['price'] }}<br>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="/cafe/{{ $item['id'] }}/edit"><button type="button" class="btn btn-sm btn-outline-secondary" style="color: black">Edit</button></a>
                        <form action="/cafe/delete/{{ $item['id'] }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </div>
                      <small class="text-muted">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection