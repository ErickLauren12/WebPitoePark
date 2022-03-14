@extends('navbar.main')

@section('container')
<div class="album py-5 bg-light">
    <div class="container">
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <form action="/reservation" method="get">
        @csrf
        <div class="input-group mb-3"> 
            <label class="form-label">Name:</label> <input type="text" class="form-control mr-3 ml-3" placeholder="Name" name="name" value="{{ request('name') }}">
            <label class="form-label">Start Date:</label> <input type="text" class="form-control picker2 mr-3 ml-3" placeholder="Start Date" name="startDate" value="{{ request('startDate') }}">
            <label class="form-label">End Date:</label> <input type="text" class="form-control picker2 mr-3 ml-3" placeholder="End Date" name="endDate" value="{{ request('endDate') }}">
            
            <label for="facilty" class="form-label">Facility: </label>
            <select class="dropdown-toggle btn btn-secondary mr-3 ml-3" name="facility_id">
              <option value="">No Filter</option>
              @foreach ($reservation_facility as $item)
                @if (request("facility_id") == $item->id)
                  <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                @else
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif 
              @endforeach
            </select>
            
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>  
        </div>
    </form>

      <a href="/reservation/create"><button class="btn btn-primary mb-3">Create New Reservation</button></a>
      <a href="/facility_reservation"><button class="btn btn-primary mb-3">Create New Facility</button></a>
      <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Facility</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reservation as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ date('d/m/Y (H:i)', strtotime($item['start_date'])) }}</td>
                  <td>{{ date('d/m/Y (H:i)', strtotime($item['end_date'])) }}</td>
                  <td>{{ $item->facility->name }}</td>
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
        {{ $reservation->links() }}
    </div>
</div>
@endsection