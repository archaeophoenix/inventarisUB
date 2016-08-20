function cetak(){
  var url = $("#base").val();
  $('.print').printElement({ leaveOpen: true, printMode: 'popup'});
}

function vendor(id){
  var id_vendor = $('#hrg'+id+' option:selected').attr("rel");
  $('#vendor'+id).val(id_vendor);
}

function periode(){
  var url = $("#base").val();
  var tahun = $("#tahun").val();
  var bulan = $("#bulan").val();
  var jenis = $("#jenis").val();
  var param = $("#param").val();
  window.location = url+''+param+'/'+bulan+'/'+tahun+'/'+jenis; //Relative or absolute path to response.php file
}

function edoirep(){
  var url = $("#base").val();
  var tahun = $("#tahun").val();
  var bulan = $("#bulan").val();
  var param = $("#param").val();
  window.location = url+''+param+'/'+bulan+'/'+tahun; //Relative or absolute path to response.php file
}

function supplier(){
  var url = $("#base").val();
  var edit = $("#edit").val();
  var tahun = $("#tahun").val();
  var bulan = $("#bulan").val();
  var jenis = $("#jenis").val();
  var param = '';
  if (jenis != 0) {param = jenis;}
  window.location = url+'report/supplier/'+edit+'/'+tahun+'/'+bulan+'/'+param; //Relative or absolute path to response.php file
}

function id_barang(id){
  var id_barang = $('.id_barang'+id).attr('id');
  $('#id_barang'+id).val(id_barang);
}

function modal(id){
  var keterangan = $('#keterangan'+id).val();
  var file = $('#file'+id).val();
  $('#img').attr('src',file);
  $('#txt').text(keterangan);
  console.log(keterangan);
}

function kinerja(kategori,bobot,nilai){
  var value = nilai*(bobot/100);
  var total = 0;
  $('#'+kategori).text(value.toFixed(2));
  $(".total").each(function(index) {
    total += parseFloat($( this ).text());
    // console.log( index + ": " + parseFloat($( this ).text()) );
  });
  $('#hasil').text(total.toFixed(2));
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
  $('#grade').text(grade);
}

$(function () {

  $('title').text('UB - '+$('h1').text());
  if($('#param').val() == 'report/inventaris'){
    var masuk = $("#masuk").val();
    var keluar = $("#keluar").val();
    var donut = new Morris.Donut({
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

  var ave = $('.evaluasi:checked').val();
  if(ave == 3){
    $('#syarat').removeAttr('disabled');
  } else {
    $('#syarat').attr('disabled','disabled');
  }

  $(".total").each(function( index ) {
    var kate = $(this).attr('id');
    $("."+kate+":checked").click();
  });

  $('.evaluasi').click(function(){
    var eva = $(this).val();
    if(eva == 3){
      $('#syarat').removeAttr('disabled');
    } else {
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

  $(".list1").DataTable();

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  // $('title').html("Inventaris | "+$('h1').text());

  $(".datepicker").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'DD-MM-YYYY'
    /*},function(start, end, label) {var years = moment().diff(start, 'years'); alert("You are " + years + " years old.");*/
  });

  console.log($("#param").val());

  $(".autocomplete").autocomplete({
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
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
  var baris = $('#baris').val();
  baris++;
  $('#baris').val(baris);
  var d = new Date();
  var gen = d.getDate()+''+d.getHours()+''+d.getMinutes()+''+d.getSeconds()+''+d.getMilliseconds();
  var tag = '';
  if ($("#inventaris").val() == 'masuk') {
    tag = '<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" class="form-control"></td><td><p id="merk'+gen+'">&nbsp;</p></td><td><input required="required" type="number" value="" pattern="[0-9]" name="harga[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="reg[]" placeholder="Label" class="form-control"></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="alokasi[]" placeholder="Alokasi" class="form-control"></td><td><input required="required" type="text" value="" name="keterangan[]" placeholder="Keterangan" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+gen+')" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>';
  } else {
    tag = '<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" class="form-control"></td><td><p id="merk'+gen+'">&nbsp;</p></td><td><p id="sisa'+gen+'" class="text-right">&nbsp;</p></td></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control"></td><td><input required="required" type="text" value="" name="alokasi[]" placeholder="Alokasi" class="form-control"></td><td><input required="required" type="text" value="" name="keterangan[]" placeholder="Keterangan" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+gen+')" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>';
  }
  $('#purchase').append(tag);
  console.log($(".autocomplete"));
  $(".autocomplete").autocomplete({
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
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
  var baris = $('#baris').val();
  baris++;
  $('#baris').val(baris);
  var d = new Date();
  var gen = d.getDate()+''+d.getHours()+''+d.getMinutes()+''+d.getSeconds()+''+d.getMilliseconds();
  $('#purchase').append('<tr id="baris'+gen+'"><td><input required="required" type="text" id="'+gen+'" value="" placeholder="Mac Book Air" class="form-control autocomplete"><input type="hidden" id="id'+gen+'" name="id_barang[]" value="" placeholder="Mac Book Air" class="form-control"></td><td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="10" class="form-control"></td><td><p id="merk'+gen+'"></p></td><td><p id="spec'+gen+'"></p></td><td><input required="required" type="number" value="" pattern="[0-9]" name="harga[]" placeholder="10" class="form-control"></td><td><p id="op'+gen+'"><button type="button" onclick="minus('+"'"+gen+"'"+');" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td></tr>');
  console.log($(".autocomplete"));
  $(".autocomplete").autocomplete({
    source: $("#base").val()+'index/barang/'+$("#param").val(),
    select: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
  },
    focus: function (event, ui) {
      event.preventDefault();
      $(this).val(ui.item.label);
      var c = $(this).attr('id');
      $('#id'+c).val(ui.item.id);
      $('#merk'+c).text(ui.item.merk);
      $('#spec'+c).text(ui.item.spesifikasi);
    }
  });
}

function minus(id){
  var baris = parseInt($('#baris').val());
  console.log(baris);
  if (baris > 1) {
    baris--;
    $('#baris').val(baris);
    $('#baris'+id).remove();
  } else {
    alert('baris anda tinggal satu, anda tidak bisa menghapus baris lagi');
  }
}

function inventaris(jenis){
  var base = $("#base").val();
  var data = $('#inventaris').serializeArray();
  data.push({type: jenis});
  $.post(base+'inventaris/form', data);
}

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