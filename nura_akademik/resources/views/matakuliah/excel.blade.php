<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Mata Kuliah</th>
        <th>SKS</th>
    </tr>

    @foreach ($matakuliah as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_matakuliah }}</td>
            <td>{{ $item->sks }}</td>
        </tr>
    @endforeach
</table>
