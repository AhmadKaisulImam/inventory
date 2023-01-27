<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Barang Masuk</th>
            <th>Name Barang</th>
            <th>Tanggal Masuk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang_masuk as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->no_barang_masuk }}</td>
            <td>{{ $b->barang->nama_barang }}</td>
            <td>{{ date('d F Y', strtotime($b->tgl_barang_masuk)) }}</td>
            <td>Rp. {{ number_format($b->harga) }}</td>
            <td>{{ $b->jml_barang_masuk }} Unit</td>
            <td>Rp. {{ number_format($b->total) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>