<?php //print_r($purchase);die(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"><h1>Purchase</h1></section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Purchase</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-body -->
      <?php $id = (empty($purchase['id'])) ? '' : $purchase['id'] ;?>
    <form role="form" method="post" action="<?php echo base_url().'purchase/submit/'.$id ?>">
      <div class="box-body">

        <div class="row">
          <div class="box-body">
            <div class="row">
              <div class="col-xs-3"></div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="biro" class="col-xs-4 control-label">Nama Purchase</label>
                  <div class="col-xs-8">
                    <input name="purchasing" value="<?php echo (empty($purchase['purchasing'])) ? '' : $purchase['purchasing']; ?>" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">&nbsp;</div>
            </div><br>
            <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="biro" class="col-xs-4 control-label">Bagian/ Biro</label>
                  <div class="col-xs-8">
                    <input type="hidden" name="id" value="<?php echo $id ; ?>">
                    <?php echo $_SESSION['masuk']['biro']; ?>
                    <input value="harga" type="hidden" id="param">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="tanggal" class="col-xs-4 control-label">Tanggal</label>
                  <div class="col-xs-8">
                    <input type="text" class="form-control datepicker" name="tanggal" id="tanggal" placeholder="<?php echo date('d-m-Y'); ?>" value="<?php echo (empty($purchase['tanggal'])) ? date('d-m-Y') : date("d-m-Y",strtotime($purchase['tanggal'])); ?>">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="ref" class="col-xs-4 control-label">No. Ref</label>
                  <div class="col-xs-8">
                    <input type="text" class="form-control" name="ref" id="ref" placeholder="<?php echo uniqid().date('dmY') ?>" value="<?php echo (empty($purchase['ref'])) ? '' : $purchase['ref'] ; ?>">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="biro" class="col-xs-4 control-label">Jenis Purchase</label>
                  <div class="col-xs-8">
                    <?php $purchase['type'] = (empty($purchase['type'])) ? '' : $purchase['type'] ; ?>
                    <input type="radio" value="0" name="type" <?php echo ($purchase['type'] == 0) ? 'checked="checked"' : ''; ?>> Beli
                    <input type="radio" value="1" name="type" <?php echo ($purchase['type'] == 1) ? 'checked="checked"' : ''; ?>> Stok
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="box-header">
            <h3 class="box-title">Barang</h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="22%">Barang</th>
                  <th class="text-center" width="8%">Jumlah</th>
                  <th class="text-center" width="20%">Merk</th>
                  <th class="text-center" width="30%">Spesifikasi</th>
                  <th class="text-center" width="10%">Anggaran Perbarang</th>
                  <th class="text-center" width="10%">Opsi</th>
                </tr>
              </thead>
              <tbody id="purchase">
              <?php if(empty($purchase['id'])){ ?>
                <tr id="baris1">
                  <td>
                    <input required="required" type="text" id="1" value="" placeholder="Mac Book Air" class="form-control autocomplete">
                    <input type="hidden" id="id1" name="id_barang[]" value="" placeholder="Mac Book Air" class="form-control">
                  </td>
                  <td><input required="required" type="number" value="" pattern="[0-9]" name="jumlah[]" placeholder="10" class="form-control"></td>
                  <td><p id="merk1"></p></td>
                  <td><p id="spec1"></p></td>
                  <td><input required="required" type="number" value="" pattern="[0-9]" name="harga[]" placeholder="1000" class="form-control"></td>
                  <td><p id="op1"><button type="button" onclick="minus(1)" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td>
                </tr>
              <?php } else { 
                foreach ($purchase['item'] as $key => $value) { ?>
                <tr id="baris<?php echo $key ?>">
                  <td>
                    <input required="required" type="text" id="<?php echo $key ?>" placeholder="Mac Book Air" class="form-control autocomplete" value="<?php echo $value['nama'] ?>">
                    <input type="hidden" id="id<?php echo $key ?>" name="id_barang[]" placeholder="Mac Book Air" class="form-control" value="<?php echo $value['id_barang'] ?>">
                    <input type="hidden" name="id_[]" value="<?php echo $value['id'] ?>">
                  </td>
                  <td><input required="required" type="number" pattern="[0-9]" name="jumlah[]" placeholder="10" class="form-control" value="<?php echo $value['jumlah'] ?>"></td>
                  <td><p id="merk<?php echo $key ?>"><?php echo $value['merk'] ?></p></td>
                  <td><p id="spec<?php echo $key ?>"><?php echo $value['spesifikasi'] ?></p></td>
                  <td><input required="required" type="number" pattern="[0-9]" name="harga[]" placeholder="10" class="form-control" value="<?php echo $value['harga'] ?>"></td>
                  <td><p id="op<?php echo $key ?>"><button type="button" onclick="minus(<?php echo $key ?>)" class="btn btn-danger btn-xs btn-circle hapus" title="Hapus"><i class="fa fa-trash"></i></button></p></td>
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
          <button type="button" onclick="plus();" class="btn btn-success btn-circle" title="Tambah Baris"><i class="fa fa-plus"></i></button>
          <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
          <button type="reset" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
          <button type="button" onclick="window.location='<?php echo base_url(); ?>purchase'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
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