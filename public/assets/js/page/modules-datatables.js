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
         top.location.href="/riwayat";
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
