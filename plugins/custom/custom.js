console.log($("#base").val()+' value dari $("#base").val();');

function cetak(){
  var url = $("#base").val();
  //fungsi print report
  $('.print').printElement({ leaveOpen: true, printMode: 'popup'});
}

function vendor(id){
  //mengambil value dari atribut "rel" di pilihan option
  var id_vendor = $('#hrg'+id+' option:selected').attr("rel");
  //set value yang sudah dipilih
  $('#vendor'+id).val(id_vendor);

  console.log(id_vendor+' $("#hrg"+id+" option:selected").attr("rel");');
}

function periode(){
  var url = $("#base").val();
  //ambil data tahun
  var tahun = $("#tahun").val();
  //ambil data bulan
  //ambil data bulan
  var bulan = $("#bulan").val();
  //ambil data jenis
  var jenis = $("#jenis").val();
  //ambil parameter
  var param = $("#param").val();

  //direct ke halaman sesuai parameter
  window.location = url+''+param+'/'+bulan+'/'+tahun+'/'+jenis; //Relative or absolute path to response.php file
}

function edoirep(){
  var url = $("#base").val();
  //ambil data tahun
  var tahun = $("#tahun").val();
  //ambil data bulan
  var bulan = $("#bulan").val();
  //ambil parameter
  var param = $("#param").val();
  //direct ke halaman sesuai parameter
  window.location = url+''+param+'/'+bulan+'/'+tahun; //Relative or absolute path to response.php file
}

function supplier(){
  var url = $("#base").val();
  //ambil data edit
  var edit = $("#edit").val();
  //ambil data tahun
  var tahun = $("#tahun").val();
  //ambil data bulan
  var bulan = $("#bulan").val();
  //ambil data jenis
  var jenis = $("#jenis").val();
  var param = '';
  
  if (jenis != 0) {param = jenis;}

  //direct ke halaman sesuai parameter
  window.location = url+'report/supplier/'+edit+'/'+tahun+'/'+bulan+'/'+param; //Relative or absolute path to response.php file
}

function id_barang(id){
  //ambil data dari atribut id di field
  var id_barang = $('.id_barang'+id).attr('id');
  //set data dari atribut id di field
  $('#id_barang'+id).val(id_barang);
}

function modal(id){
  //ambil data keterangan
  var keterangan = $('#keterangan'+id).val();
  //ambil data path file
  var file = $('#file'+id).val();
  //set data path file ke <img src>
  $('#img').attr('src',file);
  //set data #txt
  $('#txt').text(keterangan);
}

function kinerja(kategori,bobot,nilai){
  //set value berdasarkan hitungan
  var value = nilai*(bobot/100);
  var total = 0;
  //set value dua angka dibelakang koma
  $('#'+kategori).text(value.toFixed(2));
  //perulangan data array
  $(".total").each(function(index) {
  //penjumblahan data array
    total += parseFloat($( this ).text());
  });
  //set value dua angka dibelakang koma
  $('#hasil').text(total.toFixed(2));
  var grade = '';
  //set grade berdasarkan hasil penjumblahan
  switch(true) {
    case (total <= 1): grade = 'D';
    break;
    case (total <= 2): grade = 'C';
    break;
    case (total <= 3): grade = 'B';
    break;
    case (total <= 4): grade = 'A';
    break;
    default : grade = '';
    break;
  }
  // set grade
  $('#grade').text(grade);
}

$(function () {

  //set element title dengan value text yang ada di element h1
  $('title').text('UB - '+$('h1').text());

  //perkondisian, jika sesuai, maka keluar chart
  if($('#param').val() == 'report/inventaris'){
    //set bagian chart
    var masuk = $("#masuk").val();
    var keluar = $("#keluar").val();
    
    //ambil object dari chart
    var donut = new Morris.Donut({
      //set properti
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954"],
      data: [
        {label: "Barang Masuk", value: masuk},
        {label: "Barang Keluar", value: keluar}
      ],
      hideHover: 'auto'
    });
  }

  //get atribut dari class evaluasi yang sudah dipilih
  var ave = $('.evaluasi:checked').val();
  //perkondisian
  if(ave == 3){
    //kondidi menghilangkan disable jika sesuai
    $('#syarat').removeAttr('disabled');
  } else {
    //kondidi disable jika tidak sesuai
    $('#syarat').attr('disabled','disabled');
  }

  //perulangan value dari class total
  $(".total").each(function( index ) {
    //set value dari atribut id class tersebut
    var kate = $(this).attr('id');
    //atribut id class dengan kondisi cek akan di klik
    $("."+kate+":checked").click();
  });

  //get atribut dari class evaluasi yang sudah dipilih
  $('.evaluasi').click(function(){
    //perkondisian
    var eva = $(this).val();
    if(eva == 3){
      //kondidi menghilangkan disable jika sesuai
      $('#syarat').removeAttr('disabled');
    } else {
      //kondidi disable jika tidak sesuai
      $('#syarat').attr('disabled','disabled');
    }
  });
  /*$('#hasil').text(total.toFixed(2));
  var grade = '';
  switch(true) {
    case (total <= 1): grade = 'D';
    break;
    case (total <= 2): grade = 'C';
    break;
    case (total <= 3): grade = 'B';
    break;
    case (total <= 4): grade = 'A';
    break;
    default : grade = '';
    break;
  }
  $('#grade').text(grade);*/
  /*$('.list').DataTable( {
      "ajax": $("#base").val()+'?q=data',
      "columns": JSON.parse($("#column").val())
  } );*/

  //boleh dihapus
  $('.ntb').mouseout(function(){
    var text = $(this).attr('title');
    var atr = (text == "Belum Dianggarkan") ? "btn-info" : "btn-danger" ;
    var ico = (text == "Belum Dianggarkan") ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>' ;
    var txt = (text == "Belum Dianggarkan") ? "Sudah Dianggarkan" : "Belum Dianggarkan" ;
    $(this).html(ico);
    $(this).removeAttr('class');
    $(this).attr('class','ntb btn btn-circle '+atr);
    $(this).removeAttr('class');
    $(this).attr('class','ntb btn btn-circle '+atr);
    $(this).removeAttr('title');
    $(this).attr('title',txt);
  });

  //boleh dihapus
  $('.ntb').mouseover(function(){
    var text = $(this).attr('title');
    var atr = (text == "Belum Dianggarkan") ? "btn-info" : "btn-danger" ;
    var ico = (text == "Belum Dianggarkan") ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>' ;
    var txt = (text == "Belum Dianggarkan") ? "Sudah Dianggarkan" : "Belum Dianggarkan" ;
    $(this).html(ico);
    $(this).removeAttr('class');
    $(this).attr('class','ntb btn btn-circle '+atr);
    $(this).removeAttr('class');
    $(this).attr('class','ntb btn btn-circle '+atr);
    $(this).removeAttr('title');
    $(this).attr('title',txt);
  });

  //tambah atribut select2
  $(".select2").select2();

/*  $(".select2").change(function() {
    var b = '';
    var a = $("#Vendor").select2('data')
    for (i in a) {
      b = (a.length == 1 || (a.length-1) == i) ? b + a[i].id :  b + a[i].id + ',';
    }
    $('#id__').val(b);
  });*/

  $(".textarea").wysihtml5();

  
  //tambah atribut datatable
  $(".list1").DataTable();

  //set atribut datatable
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  // $('title').html("Inventaris | "+$('h1').text());

  
  //set atribut datepicker
  $(".datepicker").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'DD-MM-YYYY'
    /*},function(start, end, label) {var years = moment().diff(start, 'years'); alert("You are " + years + " years old.");*/
  });

  console.log($("#param").val()+' value dari $("#param").val()');


  //set atribut autocomplete
  $(".autocomplete").autocomplete({
    //get value berdasarkan parameter
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
      if($("#param").val() == 'inventaris'){
        $('#sisa'+c).text(ui.item.sisa);
      }
    },
    focus: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
      if($("#param").val() == 'inventaris'){
        $('#sisa'+c).text(ui.item.sisa);
      }
    }
 });
});

function tambah(){
  //get value dengan id baris
  var baris = $('#baris').val();
  //menjumlahkan baris
  baris++;
  //set value dengan id baris
  $('#baris').val(baris);
  // get object Date()
  var d = new Date();
  // set date
  var gen = d.getDate()+''+d.getHours()+''+d.getMinutes()+''+d.getSeconds()+''+d.getMilliseconds();
  var tag = '';
  //set value tag jika kondisi sesuai
  if ($("#inventaris").val() == 'masuk') {
    tag = '<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" class="form-control"></td><td><p id="merk'+gen+'">&nbsp;</p></td><td><input required="required" type="number" value="" pattern="[0-9]" name="harga[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="reg[]" placeholder="Label" class="form-control"></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="alokasi[]" placeholder="Alokasi" class="form-control"></td><td><input required="required" type="text" value="" name="keterangan[]" placeholder="Keterangan" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+gen+')" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>';
  } else {
    tag = '<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" class="form-control"></td><td><p id="merk'+gen+'">&nbsp;</p></td><td><p id="sisa'+gen+'" class="text-right">&nbsp;</p></td></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="alokasi[]" placeholder="Alokasi" class="form-control"></td><td><input required="required" type="text" value="" name="keterangan[]" placeholder="Keterangan" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+gen+')" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>';
  }
  //menambahkan value tag di id purchase
  $('#purchase').append(tag);
  console.log($(".autocomplete"));
  //set atribut autocomplete
  $(".autocomplete").autocomplete({
    //get value berdasarkan parameter
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
      if($("#param").val() == 'inventaris'){
        $('#sisa'+c).text(ui.item.sisa);
      }
  },
    focus: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
      if($("#param").val() == 'inventaris'){
        $('#sisa'+c).text(ui.item.sisa);
      }
    }
  });
}

function plus() {
  //get value dengan id baris
  var baris = $('#baris').val();
  //menjumlahkan baris
  baris++;
  //set value dengan id baris
  $('#baris').val(baris);
  // get object Date()
  var d = new Date();
  // set date
  var gen = d.getDate()+''+d.getHours()+''+d.getMinutes()+''+d.getSeconds()+''+d.getMilliseconds();
  //menambahkan value di id purchase
  $('#purchase').append('<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" placeholder="Mac Book Air" class="form-control"></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="10" class="form-control"></td><td><p id="merk'+gen+'"></p></td><td><p id="spec'+gen+'"></p></td><td><input required="required" type="number" value="" pattern="[0-9]" name="harga[]" placeholder="10" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+"'"+gen+"'"+');" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>');
  console.log($(".autocomplete"));
  //set atribut autocomplete
  $(".autocomplete").autocomplete({
    //get value berdasarkan parameter
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
  },
    focus: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      //set value berdasarkan parameter
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
    }
  });
}

function minus(id){
  //get value dengan id baris
  var baris = parseInt($('#baris').val());
  console.log(baris);
  //perkondisian
  if (baris > 1) {
    //jika sesuai maka dikurangi
    baris--;
    //set value baris
    $('#baris').val(baris);
    //menghapus baris
    $('#baris'+id).remove();
  } else {
    alert('baris anda tinggal satu, anda tidak bisa menghapus baris lagi');
  }
}

function inventaris(jenis){
  var base = $("#base").val();
  //format data yang dipush
  var data = $('#inventaris').serializeArray();
  data.push({type: jenis});
  //post data yang sudah di format
  $.post(base+'inventaris/form', data);
}

//boleh dihapus
function status(id){
  $.ajax({
    type: "POST",
    // dataType: "json",
    url: $("#base").val()+'index/status/'+id,
    // data: data,
    success: function(data) {
      var atad = jQuery.parseJSON(data);
      console.log(atad.status);
      var txt = (atad.status == 1) ? "Sudah Dianggarkan" : "Belum Dianggarkan" ;
      $('#ntb'+id).remove();
      $('#edit'+id).remove();
      $('button[rel=ntb'+id+']').remove();
      $('#'+id+'ntb').append(txt);
     /*
      $('#ntb'+id).removeAttr('class');
      $('#ntb'+id).attr('class','ntb btn btn-circle '+atr);*/
      /*$(".the-return").html(
      "Favorite beverage: " + data["favorite_beverage"] + "<br />Favorite restaurant: " + data["favorite_restaurant"] + "<br />Gender: " + data["gender"] + "<br />JSON: " + data["json"]
      );*/
      // alert("Form submitted successfully.\nReturned json: " + data["json"]);
    }
  });
}