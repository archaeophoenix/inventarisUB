<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header"><h1>Record</h1></section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header"><h3 class="box-title">Record</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="biro" class="col-xs-4 control-label">Periode</label>
                  <div class="col-xs-4">
                    <input type="hidden" id="param" value="record/index">
                    <select class="form-control" onchange="edoirep()" id="bulan" name="bulan">
                    <?php foreach ($bulan as $key => $value){ ?>
                      <option <?php echo ($param['bulan'] == ($key+1)) ? 'selected="selected"' : '' ; ?> value="<?php echo ($key+1); ?>"><?php echo $value; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" onchange="edoirep()" id="tahun" name="tahun">
                    <?php foreach ($tahun as $key => $value){ ?>
                      <option <?php echo ($param['tahun'] == $value['tahun']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['tahun']; ?>"><?php echo $value['tahun']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive" style="padding: 25px;">
              <table border="0" class="list1 table table-hover table-striped">
                <thead>
                  <tr>
                    <th class="text-center" width="5%">#</th>
                    <th class="text-center" width="15%">Tanggal</th>
                    <th class="text-center" width="%">Aktivitas</th>
                    <th class="text-center" width="%">Pengguna</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($record as $key => $value){ ?>
                  <tr class="">
                    <td class="text-center"><?php echo ($key+1); ?></td>
                    <td class="text-center"><?php echo date("d F Y",strtotime($value['tanggal'])); ?></td>
                    <td class=""><?php echo $value['keterangan']; ?></td>
                    <td class="text-center"><?php echo $value['pengguna']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        <!-- /.box-body -->
          <div class="box-footer">
            <div class="box-footer text-right"></div>
          </div>
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