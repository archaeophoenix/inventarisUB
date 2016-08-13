<?php extract($evaluasi); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>KINERJA VENDOR</h1>
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
                <div class="col-xs-4 text-center"><h3>KINERJA VENDOR</h3></div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="col-xs-8 form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Tanggal</label>
                    <div class="col-xs-2">
                      <?php if ($edit == 'edit' && empty($tanggal)){ ?>
                      <input type="text" value="<?php echo date("d-m-Y"); ?>" class="text-center form-control datepicker" name="tanggal">
                      <?php } else {
                        echo '<label class="text-center">'.date("d-m-Y",strtotime($tanggal)).'</label>';
                      } ?>
                    </div><div class="col-xs-7"></div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Nama Supplier</label>
                    <div class="col-xs-9"><label class="text-center"><?php echo $vendor ?></label></div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Jenis Barang / Jasa</label>
                    <div class="col-xs-2">
                      <?php if ($edit == 'edit'){ ?>
                      <select name="jenis" class="form-control text-center" >
                        <option></option>
                        <option class="text-center" value="1" <?php echo ($jenis == 1) ? 'selected="selected"' : '' ; ?>>Barang</option>
                        <option class="text-center" value="2" <?php echo ($jenis == 2) ? 'selected="selected"' : '' ; ?>>Jasa</option>
                      </select>
                      <?php } else {
                        $jns = ($jenis == 1) ? 'barang' : 'jasa' ;
                        echo '<label class="text-center">'.$jns.'</label>';
                      } ?>
                    </div><div class="col-xs-7"></div>
                  </div>
                </div>
                <div class="col-xs-12 table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">KRITERIA</th>
                        <th class="text-center">PENILAIAN</th>
                        <th class="text-center">SKOR</th>
                        <th class="text-center">BOBOT</th>
                        <th class="text-center">HASIL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($kinerja as $key => $value){ $skor = 4;
                          foreach ($penilaian[$key] as $k => $val){ ?>
                      <tr>
                        <?php if($k == 0){ ?>
                          <td style="vertical-align: middle;" class="text-center" rowspan="4"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-center" rowspan="4"><?php echo $value; ?></td>
                        <?php } ?>
                        <td><?php echo $val; ?></td>
                        <td class="text-center">
                          <label>
                            <input type="radio" <?php echo ($edit == 'edit') ? '' : 'disabled="disabled"' ;?> <?php echo (($skor-$k) == ${$kategori[$key]}) ? 'checked="checked"' : '' ?> onclick="kinerja('<?php echo $kategori[$key];?>',<?php echo $bobot[$key]; ?>,<?php echo ($skor-$k) ;?>);" name="<?php echo $kategori[$key];?>" value="<?php echo ($skor-$k);?>" class="<?php echo $kategori[$key];?>" ><?php echo ($skor-$k) ;?>
                          </label>
                        </td>
                        <?php if($k == 0){ ?>
                          <td style="vertical-align: middle;" class="text-center" rowspan="4"><?php echo $bobot[$key].'%'; ?></td>
                          <td style="vertical-align: middle;" class="text-center" rowspan="4"><label class="total" id="<?php echo $kategori[$key];?>">0</label></td>
                        <?php } ?>
                      </tr>
                      <?php }
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-right" colspan="5"><label id="grade"></label></th>
                        <th class="text-center"><label id="hasil"></label></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row">
                  <div class="col-xs-4 form-horizontal">
                    <div class="form-group">
                      <label class="col-xs-12">Rekomendasi Berdasarkan Evaluasi</label>
                    </div>
                    <div class="form-group">
                      <?php
                      $cont = ['Putus','Lanjut','Lanjut dengan Syarat'];
                      if ($edit == 'edit') {
                        foreach ($cont as $key => $value){ ?>
                          <label class="col-xs-12"><input type="radio" <?php echo ($key+1 == $evaluasi) ? 'checked="checked"' : '' ; ?> name="evaluasi" class="evaluasi" value="<?php echo ($key+1); ?>"><?php echo $value; ?></label>
                      <?php 
                        } 
                      } else {
                        $eva = (empty($evaluasi)) ? '' : $cont[$evaluasi-1] ;
                        echo ' <label class="col-xs-12">'.$eva.'</label>';
                      }
                      ?>
                      <div class="col-xs-12">
                        <?php if($edit == 'edit'){ ?>
                        <p><textarea id="syarat" name="syarat" placeholder="Syarat" class="form-control" disabled="disabled"><?php echo $syarat; ?></textarea></p>
                        <?php } else {
                          echo ($evaluasi == 3) ? $syarat : '' ;
                        } ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="col-xs-4 text-center"><label>Dievaluasi Oleh</label></div>
                    <div class="col-xs-4 text-center"><label>GA Officer</label></div>
                    <div class="col-xs-4 text-center"><label>Ka. Bag GA</label></div>
                  </div><br><br><br>
                  <div class="col-xs-4"></div>
                  <div class="col-xs-8">
                    <?php
                      $cont = ['eva','gaof','kabaga'];
                      foreach ($cont as $key => $value) {
                        $html = ($edit == 'edit') ? '<div class="col-xs-4 text-center"><input type="text" class="form-control" name="'.$value.'" value="'.${$value}.'"><br><input type="text" class="form-control" name="nik_'.$value.'" value="'.${"nik_$value"}.'"></div>' : '<div class="col-xs-4 text-center"><label>'.${$value}.'<br>'.${"nik_$value"}.'<label></div>' ;
                        echo $html;
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- /.box-body -->
            <div class="box-footer text-right">
            <?php if($edit == 'edit'){ ?>
              <input type="hidden" name="type" value="kinerja">
              <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
              <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
              <button type="button" onclick="window.location='<?php echo url.'/../../'.$id_vendor; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
            <?php } else { ?>
              <button type="button" onclick="window.location='<?php echo url.'/edit'; ?>'" class="btn btn-info btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
              <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
              <?php if(!empty($tanggal)){ ?>
              <button type="button" class="btn btn-primary btn-circle" title="Report Checklist" onclick="window.location='<?php echo base_url().'report/check/'.$id_vendor ?>'"><i class="fa fa-angle-right"></i></button>
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