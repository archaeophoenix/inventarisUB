<?php extract($purchase); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>FORM BIRO <?php echo strtoupper($biro); ?></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <form method="post" action="<?php echo base_url().'report/postbir/'.$id ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
                <div class="col-xs-4 text-center"><h3>FORM BIRO <?php echo strtoupper($biro); ?></h3></div>
              </div>
            <!-- /.box-header -->
              <div class="box-body form-horizontal">
                <div class="form-group">
                  <div class="col-xs-4 control-label"><p class="text-center">Diisi oleh Biro <?php echo ucwords(strtolower($biro)); ?></p></div>
                  <div class="col-xs-4 control-label"></div>
                  <div class="col-xs-4 control-label"><p class="text-left">No: PFSI - <?php echo $ref; ?> </p></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12"><h4 class="text-center">Laporan Pengadaan Fasilitas </h4></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Fasilitas <?php echo ucwords(strtolower($biro)); ?></label>
                  <div class="col-sm-9">
                    <!-- <textarea class="form-control" style="width:800px; height:100px;"></textarea> -->
                    <p><?php echo $fasilitas; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi Fasilitas <?php echo ucwords(strtolower($biro)); ?></label>
                  <div class="col-sm-9"><p><?php echo $deskripsi; ?></p></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Permintaan</label>
                  <div class="col-sm-9"><?php echo date("d-m-Y",strtotime($tanggal));?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Waktu Permintaan</label>
                  <div class="col-sm-9"><?php echo date("H:i:s",strtotime($input));?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Perkiraan Waktu Yang Dibutuhkan</label>
                  <div class="col-sm-9"><?php echo $estimasi; ?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Prioritas Pengadaan</label>
                  <div class="col-sm-9"><?php echo ($prioritas == 1) ? 'Segera' : 'Biasa' ; ?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tipe Pengadaan</label>
                  <div class="col-sm-9"><?php echo ($pengadaan == 1) ? ucwords(strtolower($biro)) : 'Kebijakan & Prosedur' ; ?></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Keterangan Tipe Pengadaan</label>
                  <div class="col-sm-9"><?php echo $keterangan; ?></div>
                </div><br><br><br>
                <div class="form-group">
                  <div class="col-xs-4 text-center"><label>Pemohon</label></div>
                  <div class="col-xs-4 control-label"></div>
                  <div class="col-xs-4 text-center"><label>Disetujui Oleh</label></div>
                </div><br/><br/><br/>
                <div class="form-group">
                  <div class="col-xs-4 text-center"><label><?php echo $staff.'<br>'.$nik_staff; ?></label></div>
                  <div class="col-xs-4 control-label"></div>
                  <div class="col-xs-4 text-center"><label><?php echo $kabiro.'<br>'.$nik_kabiro; ?></label></div>
                </div>
              </div>
            </div>
          <!-- /.box-body -->
            <div class="box-footer text-right">
              <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
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