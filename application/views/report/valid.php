<?php
extract($purchase);
$tek = $ket;
$ket = json_decode($ket,true);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>VALIDASI PERMOHONAN PEMBELIAN BUKU/BARANG CETAKAN PERPUSTAKAAN</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <form method="post" action="<?php echo base_url().'report/postval/'.$id ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
                <div class="col-xs-4 text-center"><h3 class="box-title">VALIDASI PERMOHONAN PEMBELIAN BUKU/BARANG CETAKAN PERPUSTAKAAN</h3></div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Nomer</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Jenis Buku dan/atau Barang Cetakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center"><?php echo $ref; ?></td>
                        <td class="text-center"><?php echo date("d-m-Y",strtotime($tanggal));?></td>
                        <td class="text-center"><?php echo $biro; ?></td>
                        <td class="text-center">Buku Teks / Pendukung / Pengayaan / Referensi</td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Jenis Buku / Barang Cetakan</th>
                        <th class="text-center">Spesifikasi</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga Satuan</th>
                        <th class="text-center">Harga Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tot = 0 ;
                    $jumlah = 0 ;
                    $harga = 0 ;
                    $total = 0 ;
                    foreach ($item as $key => $value){
                      $tot = $value['jumlah'] * $value['harga'];
                      $jumlah += $value['jumlah'];
                      $harga += $value['harga'];
                      $total += $tot;
                    ?>
                      <tr>
                        <td class="text-center"><?php echo (1+$key);?></td>
                        <td><?php echo $value['nama'];?></td>
                        <td><?php echo $value['spesifikasi'];?></td>
                        <td class="text-center"><?php echo $value['jumlah'];?></td>
                        <td class="text-center"><?php echo $value['harga'];?></td>
                        <td class="text-center"><?php echo $tot;?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">Total</th>
                        <th class="text-center"><?php echo $jumlah;?></th>
                        <th class="text-center"><?php echo $harga;?></th>
                        <th class="text-center"><?php echo $total;?></th>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="row">
                    <div class="col-xs-12 text-center"><h4>Verifikasi Perpustakaan</h4></div>
                    <div class="col-xs-4">
                      <div class="col-xs-12 text-center">
                      <?php if($edit == 'edit'){ ?>
                        <div class="form-group">
                          <label for="ref" class="col-xs-4 control-label">Belum ada</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control" name="ket[ba]" id="ref" placeholder="0" value="<?php echo (empty($ket['ba'])) ? '' : $ket['ba'] ; ?>">
                          </div>
                        </div>
                      <?php } else {
                        $ket['ba'] = (empty($ket['ba'])) ? '-' : $ket['ba'] ;
                        echo '<label class="text-center">Belum ada '.$ket['ba'].'</label>';
                      } ?>
                      </div><br><br>
                      <div class="col-xs-12 text-center">
                      <?php if($edit == 'edit'){ ?>
                        <div class="form-group">
                          <label for="r" class="col-xs-4 control-label">Kurang</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control" name="ket[ku]" id="r" placeholder="0" value="<?php echo (empty($ket['ku'])) ? '' : $ket['ku'] ; ?>">
                          </div>
                        </div>
                      <?php } else {
                        $ket['ku'] = (empty($ket['ku'])) ? '-' : $ket['ku'] ;
                        echo '<label class="text-center">Kurang '.$ket['ku'].'</label>';
                      } ?>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="col-xs-12 text-center">
                      <?php if($edit == 'edit'){ ?>
                        <div class="form-group">
                          <label for="r" class="col-xs-4 control-label">Edisi</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control" name="ket[ed]" id="r" placeholder="0" value="<?php echo (empty($ket['ed'])) ? '' : $ket['ed'] ; ?>">
                          </div>
                        </div>
                      <?php } else {
                        $ket['ed'] = (empty($ket['ed'])) ? '-' : $ket['ed'] ;                        
                        echo '<label class="text-center">Edisi '.$ket['ed'].'</label>';
                      } ?>
                      </div>
                      <div class="col-xs-12 text-center">
                      <?php if($edit == 'edit'){ ?>
                        <div class="form-group">
                          <label for="r" class="col-xs-4 control-label">Kurikulum</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control" name="ket[km]" id="r" placeholder="0" value="<?php echo (empty($ket['km'])) ? '' : $ket['km'] ; ?>">
                          </div>
                        </div>
                      <?php } else {
                        $ket['km'] = (empty($ket['km'])) ? '-' : $ket['km'] ;                        
                        echo '<label class="text-center">Kurikulum '.$ket['km'].'</label>';
                      } ?>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="col-xs-12 text-center"><?php echo ($status == 1) ? 'Sudah Dianggarkan' : 'Belum Dianggarkan' ; ?></div>
                    </div>
                  </div>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th rowspan="2" style="vertical-align: middle;" class="text-center">Diajukan Oleh</th>
                        <th class="text-center">Mengetahui</th>
                        <th class="text-center" colspan="2">Menyetujui</th>
                      </tr>
                      <tr>
                        <th class="text-center">Ka. Prodi / Dekan</th>
                        <th class="text-center">Ka. UPT Perpustakaan</th>
                        <th class="text-center">Ka. Biro Keuangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class=" text-center"><br><br><br><?php echo $staff.'<br>'.$nik_staff; ?></th>
                        <?php $cons = ['dekan','pustaka'];
                          foreach ($cons as $key => $value){
                            $field = ($edit == 'edit') ? '<td><input required="required" type="text" class="form-control" style="border:none;" name="'.$value.'" placeholder="'.$value.'" value="'.${$value}.'"><br><input required="required" type="text" class="form-control" style="border:none;" name="nik_'.$value.'" placeholder="NIK" value="'.${"nik_$value"}.'"></td>' : '<td class="text-center"><br>&nbsp;<br>&nbsp;<br>&nbsp;'.${$value}.'<br>'.${"nik_$value"}.'</td>';
                            echo $field;
                          } ?>
                        <th class=" text-center"><input type="hidden" name="ket[]" value='<?php echo $tek; ?>'><br><br><br><?php echo $keuangan.'<br>'.$nik_keuangan; ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <!-- /.box-body -->
            <div class="box-footer text-right">
            <?php if($edit == 'edit'){ ?>
              <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
              <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
              <button type="button" onclick="window.location='<?php echo url.'/../../'.$id; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
            <?php } else { ?>
              <?php if($_SESSION['masuk']['izin'] != 2){ ?>
                <button type="button" class="btn btn-info btn-circle" title="Edit" onclick="window.location='<?php echo url.'/edit'; ?>'"><i class="fa fa-pencil-square-o"></i></button>
              <?php }?>
              <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
              <?php if($level > 7){ ?>
                <button type="button" class="btn btn-primary btn-circle" title="Form Biro" onclick="window.location='<?php echo base_url().'report/biro/'.$id ?>'"><i class="fa fa-angle-right"></i></button>
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