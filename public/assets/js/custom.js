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
    $('#exportpdf').attr('href', '#' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#created_at').daterangepicker({
        startDate: start,
        endDate: end
    }, function(first, last) {
        //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
        $('#exportpdf').attr('href', '#' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    })
})
