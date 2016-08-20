<?php extract($buat); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>LAPORAN KINERJA SUPPLIER</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <form method="post" action="<?php echo base_url().'report/postsup/'.$param['tahun'].'/'.$param['bulan']; ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
                <div class="col-xs-4 text-center"><h3 class="content-header">LAPORAN KINERJA SUPPLIER</h3></div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="col-xs-8 form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Tanggal</label>
                    <div class="col-xs-2">
                      <input type="hidden" id="edit" value="<?php echo $param['edit']; ?>">
                      <select class="form-control" onchange="supplier()" id="bulan" name="bulan">
                        <?php foreach ($bulan as $key => $value){ ?>
                          <option <?php echo ($param['bulan'] == ($key+1)) ? 'selected="selected"' : '' ; ?> value="<?php echo ($key+1); ?>"><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <select class="form-control" onchange="supplier()" id="tahun" name="tahun">
                        <?php foreach ($tahun as $key => $value){ ?>
                          <option <?php echo ($param['tahun'] == $value['tahun']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['tahun']; ?>"><?php echo $value['tahun']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-xs-5"></div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Jenis Barang / Jasa</label>
                    <div class="col-xs-3">
                      <select class="form-control text-center" id="jenis" onchange="supplier()">
                        <?php foreach ($jenis as $key => $value){ ?>
                          <option <?php echo ($param['jenis'] == $key) ? 'selected="selected"' : '' ; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div><div class="col-xs-6"></div>
                  </div>
                </div>
                <div class="col-xs-12table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Supplier</th>
                        <th class="text-center">Contact Person</th>
                        <th class="text-center">Hasil Penilaian</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($evaluasi as $key => $value){
                        $total = ($value['mutu'] / 4) + ($value['waktu'] / 5) + ($value['harga'] / 4) + ($value['bayar'] * (15/100)) + ($value['respon'] * (15/100));
                        $grade = '';
                        $eva = '';
                        switch(true) {
                          case ($total <= 1): $grade = 'D';
                          break;
                          case ($total <= 2): $grade = 'C';
                          break;
                          case ($total <= 3): $grade = 'B';
                          break;
                          case ($total <= 4): $grade = 'A';
                          break;
                          default : $grade = '';
                          break;
                        }
                        switch($value['evaluasi']) {
                          case 1: $eva = 'Putus';
                          break;
                          case 2: $eva = 'Lanjut';
                          break;
                          case 3: $eva = 'Lanjut dengan Syarat';
                          break;
                        }
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $key+1;?></td>
                        <td><?php echo $value['nama'];?></td>
                        <td><?php echo $value['kontak'].' ('.$value['hp'].')';?></td>
                        <td class="text-center"><?php echo $total.' ('.$grade.')';?></td>
                        <td>
                          <?php echo $eva;?>
                          <?php echo ($value['evaluasi'] == 3) ? '('.$value['syarat'].')' : '' ;?>
                        </td>
                        <td>
                          <div class="btn-group">
                            <div class="btn-group">
                              <button aria-expanded="false" type="button" title="Report" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="text-left" onclick="window.location='<?php echo base_url().'report/kinerja/'.$value['id']; ?>'"><i class="fa fa-file"></i>&nbsp;Kinerja</a></li>
                                <li><a class="text-left" onclick="window.location='<?php echo base_url().'report/check/'.$value['id']; ?>'"><i class="fa fa-file"></i>&nbsp;Checklist</a></li>
                              </ul>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-xs-4 form-horizontal">
                    <div class="form-group">
                      <label class="col-xs-12 text-center">KETERANGAN GRADE</label>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">A : 3.01 - 4.00 Sangat Baik</label>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">B : 2.01 - 3.00 Baik</label>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">C : 1.01 - 2.00 Cukup Baik</label>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-12">D : 0.00 - 1.00 Buruk</label>
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="col-xs-6 text-center"><label>Dibuat</label></div>
                    <div class="col-xs-6 text-center"><label>Disetujui  </label></div>
                    <br><br><br>
                    <?php
                      $cont = ['buat','setuju'];
                      foreach ($cont as $key => $value) {
                        $html = ($edit == 'edit') ? '<div class="col-xs-6 text-center"><input required="required" type="text" class="form-control" name="'.$value.'" value="'.${$value}.'"><br><input required="required" type="text" class="form-control" name="nik_'.$value.'" value="'.${"nik_$value"}.'"></div>' : '<div class="col-xs-4 text-center"><label>'.${$value}.'<br>'.${"nik_$value"}.'<label></div>' ;
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
              <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
              <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
              <button type="button" onclick="window.location='<?php echo base_url().'Report/supplier/list/'.$param['tahun'].'/'.$param['bulan']; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
            <?php } else { ?>
              <?php if($_SESSION['masuk']['izin'] != 2){ ?>
                <button type="button" onclick="window.location='<?php echo base_url().'Report/supplier/edit/'.$param['tahun'].'/'.$param['bulan']; ?>'" class="btn btn-info btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
              <?php }?>
              <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
            <?php } ?>
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