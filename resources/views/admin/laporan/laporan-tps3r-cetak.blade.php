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
    <p style="color: #071C4D ;"> Laporan Saldo TPS3R Periode ({{ $date[0] }} - {{ $date[1] }})</p>
    <div class="table-responsive">
        @php
        $saldo_sebelum = $saldo_masuk_sebelum - $saldo_keluar_sebelum;
        @endphp
        <h6>
            Saldo Sebelumnya Rp. {{ number_format($saldo_sebelum) }}
        </h6>
        <table class="table table-striped">
            <thead>
                <tr style="color: gray;  font-size: 14px;">
                    <th class="text-center">No</th>
                    <th>Keterangan</th>
                    <th>Saldo Masuk</th>
                    <th>Saldo keluar</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($ket_masuk as $ket_masuks)
                </tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $ket_masuks->keterangan }}</td>
                <td style="text-align:right">Rp. {{ number_format($ket_masuks->saldo_tps3r) }}</td>
                <td style="text-align:right">Rp. 0</td>
                </tr>
                @endforeach
                @foreach($ket_keluar as $ket_keluars)
                </tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $ket_keluars->ket }}</td>
                <td style="text-align:right">Rp. 0</td>
                <td style="text-align:right">Rp. {{ number_format($ket_keluars->saldo_tps3r_keluar) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <td style="text-align:right">Rp. {{ number_format($saldo_masuk) }}</td>
                    <td style="text-align:right">Rp. {{ number_format($saldo_keluar) }}</td>
                </tr>
                @php
                $total_saldo_masuk = $saldo_sebelum + $saldo_masuk;
                $sisa_saldo = $total_saldo_masuk - $saldo_keluar;
                @endphp
                <tr>
                    <th colspan="2">Total Saldo</th>
                    <td colspan="2" style="text-align:right">Rp. {{ number_format($sisa_saldo) }}</td>
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