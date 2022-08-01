<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<h1>Daftar Event</h1>
<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
        <th scope="col">Isi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($post as $item)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item['title'] }}</td>
          <td>{{ $item['published_at'] }}</td>
          <td>
            {{ $item['status'] }}
          </td>
          <td>
            {{ html_entity_decode(strip_tags($item['body'])) }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>