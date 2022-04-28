<!DOCTYPE html>
<html>

<head>
    <title>SEMANDING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css" media="all">
        body {
            width: 100%;
            height: 100%;
            margin: 20px;
            padding: 0;
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin-top: 60px;
            font-family: "HelveticaNeue-CondensedBold", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        }

</style>
</head>

<body>
    <center>
        <p style="color: #071C4D ;"><b style="font-size: 24px;">Bank Sampah Semanding Berseri </b><br> Kecamatan Kanigoro, Kabupaten Blitar <br> Jawa Timur
        </p>
    </center>
    <hr style="color: gray;">
    <p style="color: #071C4D ;"> Laporan Transaksi Periode ({{ $date[0] }} - {{ $date[1] }})</p>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr style="color: gray;">
                    <th class="text-center">
                        No.
                    </th>
                    <th>Nama Jenis Sampah</th>
                    <th>Total Berat</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($sampah_masuk as $sampah_masuks)
                <tr style="color: gray;">
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $sampah_masuks->jenis_sampah }}</td>
                    @php $total_berat = 'App\Models\DetailTransaksi'::where('jenis_sampah', $sampah_masuks->jenis_sampah)->sum('berat');
                    @endphp
                    <td>{{ $total_berat }} kg</td>
                    <td>Rp. {{ number_format($sampah_masuks->harga) }}</td>
                    @php
                    $total_harga = $total_berat * $sampah_masuks->harga;
                    @endphp
                    <td>
                        Rp. {{ number_format($total_harga) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="color: gray;">
                    <th>
                    <th>Total Berat</th>
                    <th>{{ $jumlah_berat }} kg</th>
                    <th>Total Harga</th>
                    <th>Rp. {{ number_format($jumlah_harga) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>
    <h3 style="font-size: 16px; text-align: center; color: #071C4D ;"><b>Hormat Kami,</b></h3>
    <br><br><br><br>
    <h4 style="font-size: 16px; text-align: center; color: #071C4D ;">Bank Sampah Semanding Berseri</h4>
</body>

</html>