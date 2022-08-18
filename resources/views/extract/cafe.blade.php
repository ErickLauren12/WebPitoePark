<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<h1>Daftar Cafe</h1>
<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nama</th>
        <th scope="col">Status</th>
        <th scope="col">Harga</th>
        <th scope="col">Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cafe as $item)
        <tr>
        <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->status }}</td>
            <td>Rp.{{ $item->price }}</td>
            <td>{{ $item->category->name }}</td>
          </tr>
        @endforeach
        
      </tbody>
  </table>