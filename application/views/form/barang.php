<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Barang</h1>
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
          <div class="box-header"><h3 class="box-title">Data Barang</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'barang/submit/'.$data['id'];?>">
                  <div class="form-group">
                    <label for="barang" class="col-xs-2 control-label">Produk<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10">
                    <input value="<?php echo $data['id']; ?>" name="id" type="hidden">
                    <input required="required" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" id="barang" placeholder="Nama Produk" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-xs-2 control-label">Type<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><input required="required" class="form-control" value="<?php echo $data['type']; ?>" id="type" name="type" placeholder="type barang" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="merk" class="col-xs-2 control-label">Merk<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><input required="required" class="form-control" value="<?php echo $data['merk']; ?>" id="merk" name="merk" placeholder="merk barang" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="kategori" class="col-xs-2 control-label">Kategori<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10">
                      <select style="width:250px;" required="required" name="kategori" class="select2">
                        <option></option>
                        <?php foreach ($kategori as $key => $value){ ?>
                          <option <?php echo ($data['kategori'] == $value)? 'selected="selected"' : '' ;?> value="<?php echo $value;?>"><?php echo $value;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="spesifikasi" class="col-xs-2 control-label">Spesifikasi<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><textarea class="form-control" required="required" id="spesifikasi" name="spesifikasi" placeholder="spesifikasi" style="width: 100%; height: 80px; font-size: 13px; line-height: 15px; border: 0.1px solid #dddddd; padding: 10px;"><?php echo $data['spesifikasi']; ?></textarea></div>
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  <button type="button" onclick="window.location='<?php echo base_url().'barang/form'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
                </div>
                </div>
              </form>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <table class="list1 table table-hover table-striped">
                    <thead>
                      <tr>
                        <th width="10%" class="text-center">#</th>
                        <th width="10%" class="text-center">Produk</th>
                        <th width="10%" class="text-center">Type</th>
                        <th width="10%" class="text-center">Merk</th>
                        <th width="10%" class="text-center">Kategori</th>
                        <th width="40%" class="text-center">Spesifikasi</th>
                        <th width="10%" class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){ ?>
                      <tr>
                        <td class=""><?php echo ($key+1); ?></td>
                        <td class=""><?php echo $value['nama']; ?></td>
                        <td class=""><?php echo $value['type']; ?></td>
                        <td class=""><?php echo $value['merk']; ?></td>
                        <td class=""><?php echo $value['kategori']; ?></td>
                        <td class=""><?php echo $value['spesifikasi']; ?></td>
                        <td>
                          <?php if(empty($_GET['id'])){ ?>
                          <button type="button" onclick="window.location='<?php echo base_url().'barang/form/'.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Revisi"><i class="fa fa-pencil-square-o"></i></button>
                          <?php } ?>
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