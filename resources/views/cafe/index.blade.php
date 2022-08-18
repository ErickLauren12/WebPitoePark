@extends('navbar.main')

@section('container')
<div style="margin-top: 40px" class="container marketing">
<h1 style="margin: 20px" class="display-4">Menu di Cafe Kendhi Pitoe Park</h1>
<div class="album py-5 bg-light">
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Filter</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Cari Menu
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                      <form action="{{ url('/cafe') }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan Nama Menu" name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                              <button class="btn btn-danger" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Cari Kategori
                      <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                      <form method="get" action="{{ url('/cafe') }}">
                        @csrf
                        <div class="mb-3">
                          <select class="dropdown-toggle btn btn-secondary" name="category_id">
                            <option value="">No Filter</option>
                            @foreach ($category as $item)
                              @if (request("category_id") == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                              @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endif
                            @endforeach
                          </select>
                          <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                      </form>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
              @foreach ($result as $item)
              <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0" height="170px" src="{{ asset('assets/img/' . $item['image']) }}">
                    </div>
                    <div class="card-body">
                        <span class="badge badge-primary">{{ $item->category->name }}</span><br>
                        {{ $item['name'] }}<br>
                        <hr class="featurette-divider">
                        <p class="text-center mb-0">Rp.{{ $item['price'] }}</p>
                    </div>
                </div>
            </div>
                @endforeach
            </div>
            <div div="row">
              {{ $result->links() }}
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection
