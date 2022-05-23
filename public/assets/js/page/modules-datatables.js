"use strict";

$("[data-checkboxes]").each(function() {
  var me = $(this),
    group = me.data('checkboxes'),
    role = me.data('checkbox-role');

  me.change(function() {
    var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
      checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
      dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
      total = all.length,
      checked_length = checked.length;

    if(role == 'dad') {
      if(me.is(':checked')) {
        all.prop('checked', true);
      }else{
        all.prop('checked', false);
      }
    }else{
      if(checked_length >= total) {
        dad.prop('checked', true);
      }else{
        dad.prop('checked', false);
      }
    }
  });
});

$("#riwayat-tarik").dataTable();

$("#penarikan-nasabah").dataTable();

$("#detail-nasabah-saldo").dataTable();

$("#table-1").dataTable();

$('#add-sampah').click(function() {
  if ($("#form-sampah")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-sampah"));

    $.ajax({
      type: "POST",
      url: "/add-sampah/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-sampah')[0].reset();
        $('#close-sampah').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-sampah")[0].reportValidity();
  }
});

function edit(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-jenis-sampah",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalSampahUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#nama_jenisSampah_edit').val(response.data.nama_jenisSampah);
      $('#harga_edit').val(response.data.harga);
    },
  });
}
$('#update-sampah').click(function() {
  if ($("#form-sampah-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-sampah-update"));
    $.ajax({
      type: "POST",
      url: "/update-jenis-sampah/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-sampah-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-sampah")[0].reportValidity();
  }
});

function hapus_sampah(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-jenis-sampah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-sampah').attr('onclick', `del_data_sampah(` + response.data + `)`);

          $('#ModalHapusSampah').modal('show');

          // fill data in modal

      },
  });
}

function del_data_sampah(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-jenis-sampah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusSampah').modal('hide');
          // remove card data

      },
  });
}

function edit_setor(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-setor",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalSetorUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#metode_penyetoran_edit').val(response.data.metode_penyetoran);
      $('#tanggal_edit').val(response.data.tanggal);
      $('#waktu_edit').val(response.data.waktu);
      $('#total_berat_edit').val(response.data.total_berat);
    },
  });
}
$('#update-setor').click(function() {
  if ($("#form-setor-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-setor-update"));
    $.ajax({
      type: "POST",
      url: "/update-setor/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-setor-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-setor-update")[0].reportValidity();
  }
});


$("#setor-transaksi").dataTable();

function hapus_setor(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-setor",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-setor').attr('onclick', `del_data_setor(` + response.data + `)`);

          $('#ModalHapusSetor').modal('show');

          // fill data in modal

      },
  });
}

function del_data_setor(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-setor",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusSetor').modal('hide');
          // remove card data

      },
  });
}

$("#transaksi-masuk").dataTable();

function edit_statuss(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-status",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalStatusUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#status_edit').val(response.data.status);
    },
  });
}
$('#update-status-data').click(function() {
  if ($("#form-status-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-status-update"));
    $.ajax({
      type: "POST",
      url: "/update-status/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-status-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-status-update")[0].reportValidity();
  }
});

$("#riwayat").dataTable();

$("#tambah-sampah").dataTable();

$("#nasabah").dataTable();

function hapus_user(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-user",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-user-sampah').attr('onclick', `del_data_user(` + response.data + `)`);

          $('#ModalUserSampah').modal('show');

          // fill data in modal

      },
  });
}

function del_data_user(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-user",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalUserSampah').modal('hide');
          // remove card data

      },
  });
}

$("#detail-sampah").dataTable();

$("#detail").dataTable();

function hapus_sampahtambah(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-tambah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-sampahtambah').attr('onclick', `del_data_sampahtambah(` + response.data + `)`);

          $('#ModalHapusTambah').modal('show');

          // fill data in modal

      },
  });
}

function del_data_sampahtambah(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-tambah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusTambah').modal('hide');
          // remove card data

      },
  });
}

$('#add-tps3r').click(function() {
  if ($("#form-tps3r")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-tps3r"));

    $.ajax({
      type: "POST",
      url: "/add-tps3r/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-tps3r')[0].reset();
        $('#close-tps3r').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-tps3r")[0].reportValidity();
  }
});

$("#tpsr").dataTable();

function edit_tps3r(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-saldo-tps3r",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalSaldoTPS3RUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#tanggal_input_edit').val(response.data.tanggal_input);
      $('#saldo_tps3r_edit').val(response.data.saldo_tps3r);
      $('#keterangan_edit').val(response.data.keterangan);
    },
  });
}

$('#update-tps3r').click(function() {
  if ($("#form-tps3r-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-tps3r-update"));
    $.ajax({
      type: "POST",
      url: "/update-saldo-tps3r/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-tps3r-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-tps3r")[0].reportValidity();
  }
});

function hapus_tps3r(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-saldo-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-tps3r').attr('onclick', `del_data_tps3r(` + response.data + `)`);

          $('#ModalHapusSaldoTPS3R').modal('show');

          // fill data in modal

      },
  });
}

function del_data_tps3r(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-saldo-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusSaldoTPS3R').modal('hide');
          // remove card data

      },
  });
}

$("#saldo").dataTable();

$("#detail-saldo-transaksi").dataTable();

$("#product").dataTable();
$('#add-product').click(function() {
  if ($("#form-product")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-product"));

    $.ajax({
      type: "POST",
      url: "/add-produk-daur-ulang/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-product')[0].reset();
        $('#close-product').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-product")[0].reportValidity();
  }
});

function edit_product(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-produk-daur-ulang",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalProdukDaurUlangUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#nama_edit').val(response.data.nama);
      $('#deskripsi_edit').val(response.data.deskripsi);
      $('#harga_edit').val(response.data.harga);
      $('#gambar_edit').val(response.data.gambar);
    },
  });
}

$('#update-product').click(function() {
  if ($("#form-product-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-product-update"));
    $.ajax({
      type: "POST",
      url: "/update-produk-daur-ulang/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-product-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-product")[0].reportValidity();
  }
});

function hapus_product(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-produk-daur-ulang",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-product').attr('onclick', `del_data_product(` + response.data + `)`);

          $('#ModalHapusProdukDaurUlang').modal('show');

          // fill data in modal

      },
  });
}

function del_data_product(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-produk-daur-ulang",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusProdukDaurUlang').modal('hide');
          // remove card data

      },
  });
}

$("#artikel").dataTable();
$('#add-artikel').click(function() {
  if ($("#form-artikel")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-artikel"));

    $.ajax({
      type: "POST",
      url: "/add-artikel/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-artikel')[0].reset();
        $('#close-artikel').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-artikel")[0].reportValidity();
  }
});

function edit_artikel(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-artikel",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalArtikelUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#title_edit').val(response.data.title);
      $('#content_edit').val(response.data.content);
      $('#gambar_artikel_edit').val(response.data.gambar_artikel);
    },
  });
}

$('#update-artikel').click(function() {
  if ($("#form-artikel-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-artikel-update"));
    $.ajax({
      type: "POST",
      url: "/update-artikel",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-artikel-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-artikel")[0].reportValidity();
  }
});

function hapus_artikel(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-artikel",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-artikel').attr('onclick', `del_data_artikel(` + response.data + `)`);

          $('#ModalHapusArtikel').modal('show');

          // fill data in modal

      },
  });
}

function del_data_artikel(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-artikel",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusArtikel').modal('hide');
          // remove card data

      },
  });
}

function tarik(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/get-penarikan",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#myModal').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#metode_tarik_saldo_edit').val(response.data.metode_tarik_saldo);
      $('#saldo_user_edit').val(response.data.saldo_user);
      $('#bank_edit').val(response.data.bank);
      $('#norek_edit').val(response.data.norek);
    },
  });
}

function tarik_cash(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/get-penarikanCash",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#myModalCash').modal('show');
      // fill form in modal
      $('#id_editt').val(response.data.id);
      $('#metode_tarik_saldo_editt').val(response.data.metode_tarik_saldo);
      $('#saldo_user_editt').val(response.data.saldo_user);
    },
  });
}

$('#store').click(function() {
  if ($("#tarik")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("tarik"));
    $.ajax({
      type: "POST",
      url: "/post-penarikan",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-form').click();
        window.location.reload();
      }
    });
  } else {
    $("#tarik")[0].reportValidity();
  }
});

$('#store-cash').click(function() {
  if ($("#tarik-cash")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("tarik-cash"));
    $.ajax({
      type: "POST",
      url: "/post-penarikanCash",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-form-cash').click();
        window.location.reload();
      }
    });
  } else {
    $("#tarik-cash")[0].reportValidity();
  }
});

function gambar(id) {
  $("#gambar-src").remove();
  $.ajax({
      type: "GET",
      url: "/saldo/bukti",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#modalBukti').modal('show');

          // fill form in modal
          var html = `<img src="/frontend/images/Bukti-TF/`+ response.data.bukti_pembayaran +`" alt="" width="100%" id="gambar-src">`;
          $('#bukti').append(html);
      },
  });
}

$('#add-usertps3r').click(function() {
  if ($("#form-usertps3r")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-usertps3r"));

    $.ajax({
      type: "POST",
      url: "/add-usertps3r/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-usertps3r')[0].reset();
        $('#close-usertps3r').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-usertps3r")[0].reportValidity();
  }
});

$("#pengguna_tps3r").dataTable();

function edit_usertps3r(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-user-tps3r",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalPenggunaTPS3RUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#name_user_edit').val(response.data.name_user);
      $('#full_address_edit').val(response.data.full_address);
      $('#village_edit').val(response.data.village);
      $('#district_edit').val(response.data.district);
      $('#city_edit').val(response.data.city);
      $('#phone_edit').val(response.data.phone);
    },
  });
}

$('#update-usertps3r').click(function() {
  if ($("#form-usertps3r-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-usertps3r-update"));
    $.ajax({
      type: "POST",
      url: "/update-user-tps3r/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-usertps3r-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-usertps3r")[0].reportValidity();
  }
});

function hapus_usertps3r(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-user-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-usertps3r').attr('onclick', `del_data_usertps3r(` + response.data + `)`);

          $('#ModalHapusPenggunaTPS3R').modal('show');

          // fill data in modal

      },
  });
}

function del_data_usertps3r(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-user-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusPenggunaTPS3R').modal('hide');
          // remove card data

      },
  });
}

$("#penjualansampah").dataTable();
$('#add-jualsampah').click(function() {
  if ($("#form-jualsampah")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-jualsampah"));

    $.ajax({
      type: "POST",
      url: "/add-jualsampah/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-jualsampah')[0].reset();
        $('#close-jualsampah').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-jualsampah")[0].reportValidity();
  }
});

function edit_jualsampah(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-jualsampah",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalPenjualanSampahUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#date_input_edit').val(response.data.date_input);
      $('#saldo_penjualan_edit').val(response.data.saldo_penjualan);
      $('#description_edit').val(response.data.description);
    },
  });
}

$('#update-jualsampah').click(function() {
  if ($("#form-jualsampah-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-jualsampah-update"));
    $.ajax({
      type: "POST",
      url: "/update-jualsampah/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-jualsampah-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-jualsampah")[0].reportValidity();
  }
});

function hapus_jualsampah(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-jualsampah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-jualsampah').attr('onclick', `del_data_jualsampah(` + response.data + `)`);

          $('#ModalHapusPenjualanSampah').modal('show');

          // fill data in modal

      },
  });
}

function del_data_jualsampah(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-jualsampah",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusPenjualanSampah').modal('hide');
          // remove card data

      },
  });
}

function hapus_pesan(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-pesan",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-pesan').attr('onclick', `del_data_pesan(` + response.data + `)`);

          $('#ModalHapusPesan').modal('show');

          // fill data in modal

      },
  });
}

function del_data_pesan(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-pesan",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusPesan').modal('hide');
          // remove card data

      },
  });
}

$("#bayar-tps3r").dataTable();

$("#bulanan-tps3r").dataTable();
var p = "{{ $id }}";
$('#add-pembayarantps3r').click(function() {
  if ($("#form-bulanantps3r")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-bulanantps3r"));

    $.ajax({
      type: "POST",
      url: "/add-pembayarantps3r/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-bulanantps3r')[0].reset();
        $('#close-bulanantps3r').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-bulanantps3r")[0].reportValidity();
  }
});

function edit_bulanantps3r(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-pembayaran-tps3r",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalBulananTPS3RUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#tps3r_user_id_edit').val(response.data.tps3r_user_id);
      $('#month_edit').val(response.data.month);
      $('#year_edit').val(response.data.year);
    },
  });
}

$('#update-bulanantps3r').click(function() {
  if ($("#form-bulanantps3r-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-bulanantps3r-update"));
    $.ajax({
      type: "POST",
      url: "/update-pembayaran-tps3r/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-bulanantps3r-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-bulanantps3r")[0].reportValidity();
  }
});

function hapus_bulanantps3r(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-pembayaran-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-bulanantps3r').attr('onclick', `del_data_bulanantps3r(` + response.data + `)`);

          $('#ModalHapusBulananTPS3R').modal('show');

          // fill data in modal

      },
  });
}

function del_data_bulanantps3r(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-pembayaran-tps3r",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusBulananTPS3R').modal('hide');
          // remove card data

      },
  });
}

$('#add-tps3r_keluar').click(function() {
  if ($("#form-tps3r_keluar")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-tps3r_keluar"));

    $.ajax({
      type: "POST",
      url: "/add-tps3r_keluar/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-tps3r_keluar')[0].reset();
        $('#close-tps3r_keluar').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-tps3r_keluar")[0].reportValidity();
  }
});

$("#tpsr_keluar").dataTable();

function edit_tps3r_keluar(id) {
  //console.log(id);
  $.ajax({
    type: "GET",
    url: "/edit-saldo-tps3r_keluar",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      id: id
    },
    success: function(response) {
      console.log(response);
      // show modal
      $('#ModalPengeluaranTPS3RUpdate').modal('show');
      // fill form in modal
      $('#id_edit').val(response.data.id);
      $('#tgl_masuk_edit').val(response.data.tgl_masuk);
      $('#saldo_tps3r_keluar_edit').val(response.data.saldo_tps3r_keluar);
      $('#ket_edit').val(response.data.ket);
    },
  });
}

$('#update-tps3r_keluar').click(function() {
  if ($("#form-tps3r_keluar-update")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-tps3r_keluar-update"));
    $.ajax({
      type: "POST",
      url: "/update-saldo-tps3r_keluar/",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-tps3r_keluar-edit').click();
        window.location.reload();
      }
    });
  } else {
    $("#form-tps3r_keluar")[0].reportValidity();
  }
});

function hapus_tps3r_keluar(id) {
  console.log(id);
  $.ajax({
      type: "GET",
      url: "/hapus-saldo-tps3r_keluar",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          // show modal
          $('#btn-hapus-tps3r_keluar').attr('onclick', `del_data_tps3r_keluar(` + response.data + `)`);

          $('#ModalHapusPengeluaranTPS3R').modal('show');

          // fill data in modal

      },
  });
}

function del_data_tps3r_keluar(id) {
  console.log(id);
  $.ajax({
      type: "POST",
      url: "/destroy-saldo-tps3r_keluar",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          window.location.reload();
          // show modal
          $('#ModalHapusPengeluaranTPS3R').modal('hide');
          // remove card data

      },
  });
}

$("#laporan-transaksi").dataTable();

$("#trans").dataTable();

$("#laporan-tps3r").dataTable();

$('#add-payment-tps3r').click(function() {
  if ($("#form-paytps3r")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-paytps3r"));

    $.ajax({
      type: "POST",
      url: "/add-payment-tps3r/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#close-paytps3r').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-paytps3r")[0].reportValidity();
  }
});

$('#add-userdaftartps3r').click(function() {
  if ($("#form-userdaftartps3r")[0].checkValidity()) {
    var formdata = new FormData(document.getElementById("form-userdaftartps3r"));

    $.ajax({
      type: "POST",
      url: "/add-userdaftartps3r/save",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $('#form-userdaftartps3r')[0].reset();
        $('#close-userdaftartps3r').click();
        window.location.reload();
      }
    });

  } else {
    $("#form-userdaftartps3r")[0].reportValidity();
  }
});