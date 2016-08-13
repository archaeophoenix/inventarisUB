<?php extract($purchase); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>SERAH TERIMA BARANG</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="print">
            <div class="box-header">
              <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
              <div class="col-xs-8"><h3>BERITA ACARA SERAH TERIMA BARANG</h3></div>
            </div>
          <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="<?php echo base_url().'report/postter/'.$id; ?>">
                <?php
                  $tgl = (empty($tanggal_terima)) ? date('d-m-Y') : date("d-m-Y",strtotime($tanggal_terima)) ;
                  $tanggal = ($edit == 'edit') ? '<div class="row"><div class="col-xs-2"><input type="text" class="text-center datepicker form-control" name="terima[tanggal_terima]" placeholder="'.date('d-m-Y').'" value="'.$tgl.'"></div></div>' : '<p>Tanggal : '.$tgl.'</p>';
                  echo $tanggal;
                ?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Merk / Type</th>
                        <th class="text-center">Jumlah (Unit)</th>
                        <th class="text-center">Label</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Alokasi</th>
                        <th class="text-center">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($item as $key => $value) {  ?>
                      <tr>
                        <td>
                          <?php echo ($key+1); ?>
                          <input class="form-control" type="hidden" name="harga[<?php echo $value['id']; ?>]" value="<?php echo $value['harga']; ?>">
                          <input class="form-control" type="hidden" name="masuk[<?php echo $value['id']; ?>]" value="<?php echo $value['jumlah']; ?>">
                          <input class="form-control" type="hidden" name="id_barang[<?php echo $value['id']; ?>]" value="<?php echo $value['id_barang']; ?>">
                          <input class="form-control" type="hidden" name="id_purchase[<?php echo $value['id']; ?>]" value="<?php echo $id; ?>">
                        </td>
                        <td><?php echo $value['nama']; ?></td>
                        <td><?php echo $value['merk']; ?></td>
                        <td class="text-center"><?php echo $value['jumlah']; ?></td>
                        <td class="text-center">
                          <?php echo ($edit == 'edit') ? '<input type="text" class="form-control" style="border:none;" name="reg['.$value['id'].']" value="'.$value['reg'].'">' : $value['reg']; ?>
                        </td>
                        <td><?php echo $value['harga']; ?></td>
                        <td class="text-center">
                          <?php echo ($edit == 'edit') ? '<input type="text" class="form-control" style="border:none;" name="alokasi['.$value['id'].']" value="'.$value['alokasi'].'">' : $value['alokasi']; ?>
                        </td>
                        <td>
                          <?php echo ($edit == 'edit') ? '<input type="text" class="form-control" style="border:none;" name="keterangan['.$value['id'].']" value="'.$value['keterangan'].'">' : $value['keterangan']; ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="col-xs-8">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th width="50%" class="text-center">Diserahkan Oleh</th>
                          <th width="50%" class="text-center">Penerima</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php $cons = ['serah','terima'];
                          foreach ($cons as $key => $value){
                            $field = ($edit == 'edit') ? '<td><input type="text" class="form-control" style="border:none;" name="terima['.$value.']" placeholder="'.$value.'" value="'.${$value}.'"><br><input type="text" class="form-control" style="border:none;" name="terima[nik_'.$value.']" placeholder="NIK" value="'.${"nik_$value"}.'"></td>' : '<td class="text-center"><br>&nbsp;<br>&nbsp;<br>&nbsp;'.${$value}.'<br>'.${"nik_$value"}.'</td>';
                            echo $field;
                          } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              <div class="box-footer text-right">
              <?php if($edit == 'edit'){ ?>
                <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
                <button type="button" onclick="window.location='<?php echo url.'/..'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
              <?php } else { ?>
                <?php if($_SESSION['masuk']['izin'] != 2){ ?>
                  <button type="button" class="btn btn-info btn-circle" title="Edit" onclick="window.location='<?php echo url.'/edit'; ?>'"><i class="fa fa-pencil-square-o"></i></button>
                <?php }?>
                <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
                <?php if($level > 6){ ?>
                <button type="button" class="btn btn-primary btn-circle" title="Report Validasi" onclick="window.location='<?php echo base_url().'report/valid/'.$id ?>'"><i class="fa fa-angle-right"></i></button>
                <?php }
              } ?>
              </div>
            </form>
          </div>
        <!-- /.box-body -->
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