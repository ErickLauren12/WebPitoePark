<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<h1>Daftar Reservasi</h1>

<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No Telp</th>
        <th scope="col">Pesan Tambahan</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Fasilitas</th>
        <th scope="col">Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($reservation as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['email'] }}</td>
        <td>{{ $item['phone'] }}</td>
        <td>{{ $item['description'] }}</td>
        <td>{{ date('d/m/Y (H:i)', strtotime($item['start_date'])) }}</td>
        <td>{{ date('d/m/Y (H:i)', strtotime($item['end_date'])) }}</td>
        <td>{{ $item->facility->name }}</td>
        <td>{{ $item->category->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>