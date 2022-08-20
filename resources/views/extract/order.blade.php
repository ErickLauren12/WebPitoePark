<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<h1>Daftar Order</h1>
<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Status</th>
        <th scope="col">Nomor Meja</th>
        <th scope="col">Total Harga</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Nomor Order</th>
        <th scope="col">Nama</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($order as $item)
        <tr>
        <td>{{ $loop->iteration }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->status_order }}</td>
            <td>{{ $item->meja->no_meja }}</td>
            <td>Rp.{{ $item->total_price }}</td>
            <td>Rp.{{ $item->jumlah }}</td>
            <td>Rp.{{ $item->no_order }}</td>
            <td>Rp.{{ $item->name }}</td>
          </tr>
        @endforeach
        
      </tbody>
  </table>