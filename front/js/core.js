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
    let method = "GET"
        ,url = BASE_URL+"transaksi/kabupaten/"+id
        ,data = "";
    const $ajax = ajaxCall(method,url,data);
    $ajax.done(function (response) { 
      let html = '<option value="">-- Pilih Kabupaten --</option>';
      if (response.status == true) {
        $.map(response.data, function (v) {
          html += '<option value="'+v.id_kabupaten+'">';
          html += v.kabupaten;
          html += '</option>';
        });
      }
      $kabupaten.html(html);
      $kabupaten.parents('.col-sm-12').removeClass('hidden-form');
      $kabupaten.parents('.col-sm-12').addClass('visible-form');
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
    const id = $("input[name='pilih_alamat']:checked").val();
    const url = BASE_URL+"transaksi/getalamatbyid/"+id;
    const courier =$('#ongkir_input').val();
    $.get(url, function (response) {
      let v = response.data;
      $('#alamat_input').val(v.id_alamat);
      $('#nama_alamat').html(v.nama_alamat);
      $('#alamat_lengkap').html(v.alamat_lengkap);
      $('#telp').html(v.telp);
      $('#detail_alamat').html(v.kabupaten+' - '+v.provinsi);
      $('#kode_pos').html(v.kode_pos);
    }, "JSON")
    .then(function (param) {
      let alamat = param.data;
      const url = BASE_URL+`transaksi/getongkir/${alamat.id_kabupaten}/${courier}`;
      $.get(url, function (response) {
        let ongkir = response.rajaongkir.results;
        console.log(ongkir);
        $('#ongkir_input').val(ongkir[0].code);
        $('#total_biaya_kirim').html('Rp. '+ongkir[0].costs[0].cost[0].value);
        let html = `<div class="d-flex flex-column">
        <span class="font-15 weight-500">${ongkir[0].code.toUpperCase()} - ${ongkir[0].costs[0].service.toUpperCase()}</span>
        <span class="font-13">${ongkir[0].costs[0].cost[0].etd} hari kerja</span>
        </div>
        <span class="weight-500 mx-3">Rp. ${ongkir[0].costs[0].cost[0].value}</span>`;
        $('#ongkir_select').html(html);
      })
    })
    .done(function () {
      $('#modal_alamat').modal('hide');
    })
  });

  // Function for modal tambah alamat2 transaksi
  $('#tambah_alamat2').on('click',function (e) { 
    e.preventDefault();
    $("#modal_alamat").modal("hide");
    setTimeout(function () {
      $('#modal_tambah').modal('show');
    }, 500);
  });

  // Change modal Alamat Pengiriman in Transaksi
  $('#req_alamat').on('click', function (e) {
    e.preventDefault();
    const url = BASE_URL+"transaksi/alamatuser/";
    $.get(url,function (response) {
        let html = '';
        $.map(response.data, function (v) {
          html += `<div class="card mt-2">
          <div class="card-body">
              <div class="d-flex flex-column">
                  <div class="form-check">
                      <input type="radio" name="pilih_alamat" class="form-check-input"
                          id="radio${v.id_alamat}" value="${v.id_alamat}"
                          required>
                      <label class="form-check-label"
                          for="radio${v.id_alamat}">${v.nama_alamat}</label>
                  </div>
                  <div class="limit"></div>
                  <p>${v.alamat_lengkap}</p>
                  <strong>${v.telp}</strong>
                  <i>${v.kabupaten+' - '+v.provinsi}</i>
                  <p>Kode Pos${v.kode_pos}</p>
              </div>
          </div>
      </div>`;
        });
        $('.address-user').html(html);
      },
      "JSON"
    ).done(function(){
      $('#modal_alamat').modal('show');
    })
  });

  //Ongkir Select Modal
  $('#ongkir_select').on('click', function (e) {
    e.preventDefault();
    const destination = $("#alamat_input").val()
    const url = BASE_URL+`transaksi/getallongkir/${destination}`;
    $.get(url, function (response) {
      let html = '';
      $.map(response.data, function (v) {
        html += `<option value="${v.code}">${v.code.toUpperCase()} - ${v.costs[0].service} &emsp;Rp.${v.costs[0].cost[0].value}</option>`;
      });
      $('#ongkir_group').html(html);
    })
    .done(function () {
      $('#modal_ongkir').modal('show');
    });
  });

  //Change Ongkir and Save
  $('#form_ongkir').on('submit', function (e) {
    e.preventDefault();
    const destination = $('#alamat_input').val()
    ,courier = $('#ongkir_group').val()
    ,method = "POST"
    ,url = BASE_URL+`transaksi/getongkir/${destination}/${courier}`;
    $.get(url)
    .done(function (response) { 
      $('#modal_ongkir').modal('hide');
      let v =response.rajaongkir.results;
      $('#ongkir_input').val(v[0].code);
      $('#total_biaya_kirim').html('Rp. '+v[0].costs[0].cost[0].value);
      let html = `<div class="d-flex flex-column">
      <span class="font-15 weight-500">${v[0].code.toUpperCase()} - ${v[0].costs[0].service.toUpperCase()}</span>
      <span class="font-13">${v[0].costs[0].cost[0].etd} hari kerja</span>
      </div>
      <span class="weight-500 mx-3">Rp. ${v[0].costs[0].cost[0].value}</span>`;
      $('#ongkir_select').html(html);
    })
  });

  // Close Modal
  $(document).on('click','#close_modal',function (e) {
    e.preventDefault();
    let modal = $('#modal_ongkir');
    $('#transaksi_modal .modal-content').empty();
    modal.modal('hide');
  });
  
  // <-- Transaksi Javascript Akhir -->
});
