<!DOCTYPE html>
<html>

<head>
    <title>Semanding Berseri</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <center>
        <p style="color: #071C4D ;"><b style="font-size: 24px;">Bank Sampah Semanding Berseri </b><br> Kecamatan Kanigoro, Kabupaten Blitar <br> Jawa Timur
        </p>
    </center>
    <h6 style="color: #6777ef;"> Detail Nasabah</h6>
    <table class="table">
        <tbody style="font-size: 12px;">
            @foreach($transaksis as $transaksi)
            <tr>
                <td>Nama</td>
                <td width="10">:</td>
                <td>{{ $transaksi->name }}</td>
            </tr>
            <tr>
                <td>Metode Penyetoran</td>
                <td>:</td>
                <td>{{ $transaksi->metode_penyetoran }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $transaksi->alamat_lengkap }}, {{ $transaksi->desa }}, {{ $transaksi->kecamatan }}, {{ $transaksi->kabupaten }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{ $transaksi->no_hp }}</td>
            </tr>
            @if($transaksi->metode_penyetoran == 'Setor Sampah')
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $transaksi->tanggal }}</td>
            </tr>
            @else
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td style="color: red;">Setiap tanggal 20/bulan</td>
            </tr>
            @endif
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $transaksi->waktu }} WIB</td>
            </tr>
            <tr>
                <td>Total Berat</td>
                <td>:</td>
                <td>{{ $transaksi->total_berat }} kg</td>
            </tr>
            @endforeach
        </tbody>
    </table><br>
    <h6 style="color: #6777ef;"> Detail Transaksi</h6>
    <table class='table table-striped'>
        <thead>
            <tr style=" color: gray; font-size: 12px;">
                <th>No.</th>
                <th>Sparepart Name</th>
                <th>Total Sparepart</th>
                <th>Price</th>
                <th style=" text-align: right;">Total Price</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
            <?php $no = 1; ?>
            @foreach($detail_transaksi as $detail_transaksis)
            <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $detail_transaksis->jenis_sampah }}</td>
                <td>Rp {{ number_format($detail_transaksis->harga) }}</td>
                <td>{{ $detail_transaksis->berat }} kg</td>
                <td>Rp {{ number_format($detail_transaksis->total_harga) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot style="background-color: #6777ef; font-size: 12px;">
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold; font-size:larger; color: white;">Total</td>
                <td style="font-weight: bold; font-size:larger; color: white;">{{ $transaksi->total_berat }} kg</td>
                @foreach($saldos as $saldo)
                <td style="font-weight: bold; font-size:larger; color: white;">Rp. {{number_format($saldo->saldo)}}</td>
                @endforeach
            </tr>
        </tfoot>
    </table><br>
    <h3 style="font-size: 16px; text-align: center; color: #071C4D ;"><b>Hormat Kami,</b></h3>
    <br><br><br><br>
    <h4 style="font-size: 16px; text-align: center; color: #071C4D ;">Bank Sampah Semanding Berseri</h4>
</body>

</html>