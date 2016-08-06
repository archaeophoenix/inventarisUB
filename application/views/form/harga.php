<?php
/*echo "<pre>";
print_r($list);die();*/
$ro = (empty($id)) ? '' : 'disabled="disabled"' ;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Harga Barang</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header"><h3 class="box-title">Data Harga Barangs</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'harga/submit';?>">
                  <div class="form-group">
                    <label for="Vendor" class="col-sm-2 control-label">Vendor</label>
                    <div class="col-sm-10">
                      <select id="Vendor" name="id_vendor" class="form-control select2" <?php echo $ro; ?>>
                      <option></option>
                      <?php foreach ($vendor as $key => $value){ ?>
                      <option <?php echo ($data['id_vendor'] == $value['id']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
                      <?php } ?>
                      </select>
                      <?php if (!empty($id)){ ?>
                        <input type="hidden" name="id_vendor" value="<?php echo $data['id_vendor']; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="_barang" class="col-sm-2 control-label">Barang</label>
                    <div class="col-sm-10">
                      <input class="autocomplete form-control" value="<?php echo $data['barang']; ?>" id="_barang" placeholder="Barang" type="text" <?php echo $ro; ?>>
                      <input value="<?php echo $data['id_barang']; ?>" type="hidden" name="id_barang" id="id_barang">
                    </div>
                    <?php if (!empty($id)){ ?>
                      <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="harga" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo $data['harga']; ?>" id="harga" name="harga" placeholder="1000" type="number" pattern="[0-9]"></div>
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  <button type="button" onclick="window.location='<?php echo base_url().'harga/form'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
                </div>
                </div>
              </form>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <table class="list1 table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Barang</th>
                        <th class="text-center">Vendor</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Pembaruan</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){
                        $status = ($value['aktif'] == 0) ? 'danger' : '' ;
                        $title = ($value['aktif'] == 0) ? 'Expired' : '' ;
                      ?>
                      <tr title="<?php echo $title; ?>" class="<?php echo $status; ?>">
                        <td class=""><?php echo ($key+1); ?></td>
                        <td class=""><?php echo $value['barang']; ?></td>
                        <td class=""><?php echo $value['vendor']; ?></td>
                        <td class="text-right"><?php echo $value['harga']; ?></td>
                        <td class=""><?php echo $value['pembaruan']; ?></td>
                        <td>
                          <?php if(empty($id)){
                            if($value['aktif'] == 1){ ?>
                          <button type="button" onclick="window.location='<?php echo base_url().'harga/form/'.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Harga Baru"><i class="fa fa-pencil-square-o"></i></button>
                          <?php }} ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
<input type="hidden" id="column" value='[{"data" :"id"}, {"data" :"pembaruan"}, {"data" :"harga"}, {"data" :"vendor"}, {"data" :"barang"}]'>