function ajaxCall(method,url,data) {
  return $.ajax({
    type: method,
    url: url,
    data: data,
    dataType: "JSON"
  });
}
$(function () {
// <++ Transaksi Javascript Awal ++> 

  // Provinsi Change in Modal Transaksi
  $('.provinsi').on('change', function(e) {
    e.preventDefault();
    const id = $(this).val();
    const $kabupaten = $('.kabupaten');
    let method = "POST"
        ,url = BASE_URL+"transaksi/kabupaten/"+id
        ,data = "";
    const $ajax = ajaxCall(method,url,data);
    $ajax.done(function (response) { 
      let html = '<option value="">-- Pilih Kabupaten --</option>';
      if (response.status == true) {
        $.each(response.data, function (i,v) {
          html += '<option value="'+v.id_kabupaten+'">';
          html += v.nama
          html += '</option>';
        });
      }
      $kabupaten.html(html);
      $kabupaten.parents('.col-sm-12').removeClass('hidden-form');
      $kabupaten.parents('.col-sm-12').addClass('visible-form');
    });
  });

  // Kabupaten Change in Modal Transaksi
  $('.kabupaten').on('change', function(e) {
    e.preventDefault();
    const id = $(this).val();
    const $kecamatan = $('.kecamatan');
    let method = "POST"
        ,url = BASE_URL+"transaksi/kecamatan/"+id
        ,data = "";
    const $ajax = ajaxCall(method,url,data);
    $ajax.done(function (response) {
      let html = '<option value="">-- Pilih Kecamatan --</option>';
      if (response.status == true) {
        $.each(response.data, function (i,v) {
          html += '<option value="'+v.id_kecamatan+'">';
          html += v.nama
          html += '</option>';
        });
      }
      $kecamatan.html(html);
      $kecamatan.parents('.col-sm-12').removeClass('hidden-form');
      $kecamatan.parents('.col-sm-12').addClass('visible-form');
    });
  });

  // Insert Alamat in Transaksi
  $("#form_alamat_transaksi").on("submit", function (e) {
    e.preventDefault();
    const $this = $(this);
    let form = $(this).serialize();
    let method = "POST";
    let url = BASE_URL+"transaksi/corealamat/";
    let data = form;
    const $ajax = ajaxCall(method,url,data);
    $ajax.done(function (response) { 
      if (response.status == false) {
        $.map(response.data, function (v, i) {
          let element = $("[name='"+i+"']");
          element.removeClass('is-invalid')
          .addClass(v.length > 0 ? 'is-invalid' : 'is-valid')
          .next()
          .remove();
          element.after(v);
        });
      } else {
        $this.trigger("reset");
        $this.find('.form-control').removeClass('is-invalid');
        $this.find('.form-control').removeClass('is-valid');
        $(".modal").modal("hide");
      }
    })
  });

  // Save and Replace Alamat Pengiriman Selected From Modal
  $(document).on('submit','#pilih_alamat', function (e) {
    e.preventDefault();
    let id = $("input[name='pilih_alamat']:checked").val();
    let url = BASE_URL+"transaksi/getalamatbyid/"+id;
    
    $.get(url, function (response) {
      let v = response.data;
      $('#nama_alamat').html(v.nama_alamat);
      $('#alamat_lengkap').html(v.alamat_lengkap);
      $('#telp').html(v.telp);
      $('#detail_alamat').html(v.kecamatan+' - '+v.kabupaten+' - '+v.provinsi);
      $('#kode_pos').html(v.kode_pos);
    }, "JSON")
    .done(function () {
      $('#transaksi_modal').modal('hide');
    })
  });

  // Function for modal tambah alamat2 transaksi
  $(document).on('click','#tambah_alamat2',function (e) { 
    e.preventDefault();
    $("#transaksi_modal").modal("hide");
    setTimeout(function () {
      $('#modal_tambah').modal('show');
    }, 500);
  });

  // Change modal Alamat Pengiriman in Transaksi
  $('#req_alamat').on('click', function (e) {
    e.preventDefault();
    const url = BASE_URL+"transaksi/modalalamat/";
    const $div = $('#transaksi_modal .modal-content');
    $div.load(url, function () {
      $('#transaksi_modal').modal('show');
    });
  });

  //Ongkir Select Modal
  $('#ongkir_select').on('click', function (e) {
    e.preventDefault();
    const url = BASE_URL+"transaksi/modalongkir/";
    const $div = $('#modal_transaksi .modal-body');
    $div.load(url, function () {
      $('#modal_transaksi').modal('show');
    });
  });

  // Close Modal
  $(document).on('click','#close_modal',function (e) {
    e.preventDefault();
    let modal = $('#transaksi_modal');
    $('#transaksi_modal .modal-content').empty();
    modal.modal('hide');
  });

// <-- Transaksi Javascript Akhir -->
});