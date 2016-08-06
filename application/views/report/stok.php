<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>KARTU STOK</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <form method="post" action="<?php echo base_url().'report/poststo/'.$id ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
                <div class="col-xs-4 text-center"><h3 class="content-header">KARTU STOK</h3></div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="col-xs-4 form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Barang</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Barang</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4 form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Satuan Barang</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tempat Barang</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 table-responsive no-padding">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;" rowspan="2">Tanggal</th>
                        <th class="text-center" colspan="3">Pembelian</th>
                        <th class="text-center" colspan="3">Pengeluaran</th>
                        <th class="text-center" colspan="3">Persedian</th>
                      </tr>
                      <tr>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          <!-- /.box-body -->
            <div class="box-footer text-right">
            <?php if($edit == 'edit'){ ?>
              <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
              <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
              <button type="button" onclick="window.location='<?php echo url.'/..'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
            <?php } else { ?>
              <button type="button" onclick="window.location='<?php echo url.'/edit'; ?>'" class="btn btn-info btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
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