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
        $('#close-samapah-edit').click();
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


$("#setor-transaksi").dataTable();

