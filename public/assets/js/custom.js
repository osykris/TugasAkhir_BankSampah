/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
//KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
$(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf').attr('href', '/laporan-transaksi/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#created_at').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf').attr('href', '/laporan-transaksi/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})

$(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf_trans').attr('href', '/laporan-transaksi-nasabah/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#created_at_trans').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf_trans').attr('href', '/laporan-transaksi-nasabah/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})

$(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf_penj').attr('href', '/laporan-penjualan/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#penjualan').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf_penj').attr('href', '/laporan-penjualan/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})

$(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf_nas').attr('href', '/laporan-nasabah/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#nas_date').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf_nas').attr('href', '/laporan-nasabah/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})

$(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf_tps3r').attr('href', '/laporan-tps3r/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#tps3r_date').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf_tps3r').attr('href', '/laporan-tps3r/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})