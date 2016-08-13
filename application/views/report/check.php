<?php extract($checkx); ?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>CHECKLIST PEMANTAUAN PEMBELIAN</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <form method="post"  action="<?php echo base_url().'report/postkin/'. $id_vendor; ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
                <div class="col-xs-4 text-center"><h3 class="content-header">CHECKLIST PEMANTAUAN PEMBELIAN</h3></div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-xs-8 form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                    <div class="col-sm-3">
                    <?php if ($edit == 'edit' && empty($ctanggal)){ ?>
                      <input type="text" class="text-center form-control datepicker" name="ctanggal" value="<?php echo date("d-m-Y"); ?>">
                    <?php } else {
                      echo '<label class="text-center">'.date("d-m-Y",strtotime($ctanggal)).'</label>';
                    } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Supplier</label>
                    <div class="col-sm-9"><label class="text-center"><?php echo $vendor; ?></label></div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail4" class="col-sm-3 control-label">Jenis Barang</label>
                    <div class="col-sm-3">
                      <?php if ($edit == 'edit'){ ?>
                        <select name="jenis" class="form-control text-center" >
                          <option></option>
                          <option class="text-center" <?php echo ($jenis == 1) ? 'selected="selected"' : '' ; ?> value="1">Barang</option>
                          <option class="text-center" <?php echo ($jenis == 2) ? 'selected="selected"' : '' ; ?> value="2">Jasa</option>
                        </select>
                      <?php } else {
                        $jns = ($jenis == 1) ? 'barang' : 'jasa' ;
                        echo '<label class="text-center">'.$jns.'</label>';
                      } ?>
                    </div>
                  </div>
                  <div class="form-group"></div>
                  </div>
                </div>
                <div class="col-xs-12table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Checklist</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($check as $key => $value){ ?>
                      <tr>
                        <td><?php echo ($key + 1);?></td>
                        <td><?php echo $value;?></td>
                        <td>
                          <input type="radio" <?php echo ($edit == 'edit') ? '' : 'disabled="disabled"' ;?> <?php echo (1 == ${$kategori[$key]}) ? 'checked="checked"' : '' ?> name="<?php echo $kategori[$key];?>" value="1">Ya

                          <input type="radio" <?php echo ($edit == 'edit') ? '' : 'disabled="disabled"' ;?> <?php echo (0 == ${$kategori[$key]}) ? 'checked="checked"' : '' ?> name="<?php echo $kategori[$key];?>" value="0">Tidak
                        </td>
                        <td>
                          <?php if($edit == 'edit') {?>
                            <input type="text" class="form-control" name="ket_<?php echo "$kategori[$key]";?>" value="<?php echo ${"ket_$kategori[$key]"};?>">
                          <?php } else {?>
                            <?php echo ${"ket_$kategori[$key]"};?>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-xs-4"></div>
                  <div class="col-xs-8">
                  <br /><br />
                    <div class="col-xs-4 text-center"><label>GA Officer</label></div>
                    <div class="col-xs-4 text-center"><label>Ka Bag Umum</label></div>
                    <br><br><br>
                     </div><br><br><br>
                  <div class="col-xs-4"></div>
                  <div class="col-xs-8">
                    <?php $cont = ['gaof', 'kabaga']; 
                    foreach ($cont as $key => $value) {
                      $html = ($edit == 'edit') ? '<div class="col-xs-4 text-center"><input type="text" class="form-control" name="' . $value . '" value="' . ${$value} . '"><br><input type="text" class="form-control" name="nik_' . $value . '" value="' . ${"nik_$value"} . '"></div>' : '<div class="col-xs-4 text-center"><label>' . ${$value} . '<br>' . ${"nik_$value"} . '<label></div>'; 
                      echo $html; 
                    } ?>
                  </div>
                </div>
              </div>
          <!-- /.box-body -->
            <div class="box-footer text-right">
            <?php if ($edit == 'edit') { ?>
              <input type="hidden" name="type" value="check">
              <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
              <button type="reset" class="btn btn-warning btn-circle" title="ReSet" onclick="window.location='<?php echo url; ?>'"><i class="fa fa-undo"></i></button>
              <button type="button" class="btn btn-danger btn-circle batal" title="Batal" onclick="window.location='<?php echo url . '/../../' . $id_vendor; ?>'"><i class="fa fa-close"></i></button>
            <?php } else { ?>
              <button type="button" class="btn btn-info btn-circle" title="Edit" onclick="window.location='<?php echo url . '/edit'; ?>'"><i class="fa fa-pencil-square-o"></i></button>
              <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
            <?php if(!empty($ctanggal)){ ?>
              <button type="button" class="btn btn-primary btn-circle" title="Kinerja Vendor" onclick="window.location='<?php echo base_url().'report/kinerja/'.$id_vendor ?>'"><i class="fa fa-angle-right"></i></button>
              <?php }
            } ?>
            </div>
          </form>
        </div>
      <!-- /.box -->
      </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->