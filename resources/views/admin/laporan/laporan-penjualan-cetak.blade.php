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
    <p style="color: #071C4D ;"> Laporan Penjualan Sampah Kepada Pengepul Periode ({{ $date[0] }} - {{ $date[1] }})</p>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr style="color: gray;font-size: 14px;">
                    <th class="text-center">
                        No.
                    </th>
                    <th>Tanggal Penjualan</th>
                    <th>Saldo Masuk</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($penjualan as $pj)
                <tr style="font-size: 12px;">
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $pj->date_input }}</td>
                    <td>Rp. {{ number_format($pj->saldo_penjualan) }}</td>
                    <td>{{ $pj->description }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot style="font-size: 12px;">
                <td></td>
                <td><b>Total Saldo</b></td>
                <td><b>Rp. {{ number_format($total) }}</b></td>
            </tfoot>
        </table>
    </div>
    <br>
    <h3 style="font-size: 16px; text-align: center; color: #071C4D ;"><b>Hormat Kami,</b></h3>
    <br><br><br><br>
    <h4 style="font-size: 16px; text-align: center; color: #071C4D ;">Bank Sampah Semanding Berseri</h4>
</body>

</html>