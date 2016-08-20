<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"><h1>Inventaris</h1></section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Inventaris</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-body -->
      <?php if ($jenis == 'keluar'){?>
        <input value="inventaris" type="hidden" id="param">
      <?php } ?>
      <input type="hidden" id="inventaris" value="<?php echo $jenis ?>">
      <form role="form" method="post" action="<?php echo base_url().'inventaris/transaksi/'.$jenis ?>">
        <input type="hidden" name="edit" value="<?php echo $edit ?>">
        <div class="box-body">

          <div class="row">
            <div class="box-header">
              <h3 class="box-title">Barang</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th class="text-center">Barang<label style="color:#f00;">*</label></th>
                    <th class="text-center">Merk</th>
                  <?php if ($jenis == 'masuk'){ ?>
                    <th class="text-center">Harga<label style="color:#f00;">*</label></th>
                    <th class="text-center">Label<label style="color:#f00;">*</label></th>
                  <?php } else { ?>
                    <th class="text-center">Sisa Barang</th>
                  <?php } ?>
                    <th class="text-center">Jumlah<label style="color:#f00;">*</label></th>
                    <th class="text-center">Alokasi</th>
                    <th class="text-center">Keterangan</th>
                    <?php if($edit == 0){ ?>
                      <th class="text-center">Opsi</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody id="purchase">
                <?php if($edit == 0){ ?>
                  <tr id="baris1">
                    <td>
                      <input required="required" type="text" id="1" placeholder="Mac Book Air" class="form-control autocomplete">
                      <input type="hidden" id="id1" name="id_barang[]" class="form-control">
                    </td>
                    <td><p id="merk1">&nbsp;</p></td>
                  <?php if ($jenis == 'masuk'){ ?>
                    <td><input required="required" type="number" pattern="[0-9]" name="harga[]" placeholder="1000" class="form-control"></td>
                    <td><input required="required" type="text" name="reg[]" placeholder="Label" class="form-control"></td>
                  <?php } else { ?>
                    <td><p id="sisa1" class="text-right">&nbsp;</p></td>
                  <?php } ?>
                    <td><input required="required" type="number" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control"></td>
                    <td><input type="text" name="alokasi[]" placeholder="Alokasi" class="form-control"></td>
                    <td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control"></td>
                    <td><p id="op1"><button type="button" onclick="minus(1)" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td>
                  </tr>
                <?php } else { 
                  foreach ($inventaris as $key => $value) { ?>
                  <tr id="baris<?php echo "$key";?>">
                    <td>
                      <input type="hidden" name="id[]" class="form-control" id="id<?php echo $key; ?>" value="<?php echo $value['id']; ?>">
                      <input required="required" type="text" placeholder="Mac Book Air" class="form-control autocomplete" id="<?php echo $key; ?>" value="<?php echo $value['barang']; ?>">
                      <input type="hidden" name="id_barang[]" class="form-control" id="id<?php echo $key; ?>" value="<?php echo $value['id_barang']; ?>">
                    </td>
                    <td><p id="merk<?php echo $key; ?>"><?php echo $value['merk']; ?></p></td>
                    <?php if ($jenis == 'masuk'){ ?>
                    <td><input required="required" type="number" pattern="[0-9]" name="harga[]" placeholder="1000" class="form-control" value="<?php echo $value['harga']; ?>"></td>
                    <td><input required="required" type="text" name="reg[]" placeholder="Label" class="form-control" value="<?php echo $value['reg']; ?>"></td>
                    <?php } else { ?>
                    <td><p class="text-right" id="sisa<?php echo $key; ?>"><?php echo $value['sisa']; ?></p></td>
                    <?php } ?>
                    <td><input required="required" type="number" pattern="[0-9]" name="jumlah[]" placeholder="1000" class="form-control" value="<?php echo $value['jumlah']; ?>"></td>
                    <td><input required="required" type="text" name="alokasi[]" placeholder="Alokasi" class="form-control" value="<?php echo $value['alokasi']; ?>"></td>
                    <td><input required="required" type="text" name="keterangan[]" placeholder="Keterangan" class="form-control" value="<?php echo $value['keterangan']; ?>"></td>
                  </tr>
                <?php }
                } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="box-footer text-right">
            <input type="hidden" id="baris"  value="<?php echo (empty($purchase['id'])) ? 1 : count($purchase['item']) ; ?>">
            <button type="button" onclick="tambah();" class="btn btn-success btn-circle" title="Tambah Baris"><i class="fa fa-plus"></i></button>
            <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
            <button type="reset" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
            <button type="button" onclick="window.location='<?php echo base_url(); ?>report/inventaris'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
          </div>
        </div>
      </form>

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->