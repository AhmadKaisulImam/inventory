<!doctype html>
<html lang="en">
  <head>
    <title>Cetak Laporan User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color: white;" onload="window.print()">
    <style>
        .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #0000;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height: 1.6; font-weight: bold;">
                                    SISTEM INVENTORY BARANG
                                    <br>WEBANE
                                </span>
                            </td>
                        </tr>
                    </table>

                    <hr class="line-title">
                    <p align="center">
                        LAPORAN DATA BARANG KELUAR
                    </p>
                    <p class="text-center">
                        Periode {{ date('d F Y', strtotime($tgl_mulai)) }} s/d {{ date('d F Y', strtotime($tgl_selesai)) }}
                    </p>

                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No Barang Keluar</th>
                            <th>Name Barang</th>
                            <th>Kategori</th>
                            <th>Tanggal Keluar</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>

                        @if($sum_total == 8)

                            <tr>
                                <td colspan="8"><center><b>Data Tidak Ada Pada Periode Tanggal {{ date('d F Y', strtotime($tgl_mulai)) }} s/d {{ date('d F Y', strtotime($tgl_selesai)) }}</b></center></td>
                            </tr>

                        @else

                        @foreach ($barang_keluar as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->no_barang_keluar }}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->nama_kategori }}</td>
                            <td>{{ date('d F Y', strtotime($b->tgl_barang_keluar)) }}</td>
                            <td>Rp. {{ number_format($b->harga) }}</td>
                            <td>{{ $b->jml_barang_keluar }} Unit</td>
                            <td>Rp. {{ number_format($b->total) }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="7">Total Harga</td>
                            <td>RP. {{ number_format($sum_total) }}</td>
                        </tr>

                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>