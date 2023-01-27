<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
</tr>
    </thead>
    <tbody>
        @foreach ($barang as $u)
        <tr>
            <td>{{ $loop->iteration }}</td>
            @if (empty($u->category->seri))
                <td>-</td>
            @else
                <td>{{ $u->category->seri }}-{{ str_pad($u->no_seri, 5, '0', STR_PAD_LEFT) }}</td>
            @endif
            <td>{{ $u->nama_barang }}</td>
            @if (empty($u->category->nama_kategori))
                <td>-</td>
            @else
                <td>{{ $u->category->nama_kategori }}</td>
            @endif
            <td>Rp. {{ $u->harga_beli }}</td>
            <td>Rp. {{ $u->harga_jual }}</td>
            <td>{{ $u->stok }} Unit</td>
        </tr>
        @endforeach
    </tbody>
</table>