<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header"><h1>Data Pengguna</h1></section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header"><h3 class="box-title">Data Pengguna</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'pengguna/submit/'.$data['id'];?>">
                  <div class="form-group">
                    <label for="Vendor" class="col-xs-3 control-label">Biro<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9">
                      <select required="required" id="Vendor" name="id_biro" class="form-control select2">
                      <option></option>
                      <?php foreach ($biro as $key => $value){ ?>
                      <option <?php echo ($data['id_biro'] == $value['id']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="barang" class="col-xs-3 control-label">Nama<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9">
                      <input value="<?php echo $data['id']; ?>" name="id" type="hidden">
                      <input required="required" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" id="barang" placeholder="Nama" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-xs-3 control-label">Gelar<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9"><input required="required" class="form-control" value="<?php echo $data['gelar']; ?>" id="type" name="gelar" placeholder="gelar" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-xs-3 control-label">NIK<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9"><input required="required" class="form-control" value="<?php echo $data['nik']; ?>" id="type" name="nik" placeholder="NIK" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-xs-3 control-label">Password<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9"><input required="required" class="form-control" value="" id="type" name="password" placeholder="password" type="password"></div>
                  </div>
                  <div class="form-group">
                    <label for="Vendor" class="col-xs-3 control-label">Jabatan<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9">
                      <select required="required" id="Vendor" name="status" class="form-control select2">
                      <option></option>
                      <?php foreach ($jabatan as $key => $value){ ?>
                      <option <?php echo ($data['status'] == ($key + 1)) ? 'selected="selected"' : '' ; ?> value="<?php echo ($key+1); ?>"><?php echo $value; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Vendor" class="col-xs-3 control-label">Hak Akses<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9">
                      <select required="required" id="Vendor" name="izin" class="form-control select2">
                      <option></option>
                      <?php foreach ($izin as $key => $value){ ?>
                      <option <?php echo ($data['izin'] == $key && !empty($data['izin'])) ? 'selected="selected"' : '' ; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                    <?php if(!empty($data['id'])){ ?>
                    <button type="button" onclick="window.location='<?php echo base_url().'pengguna/form'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
                    <?php } ?>
                  </div>
                </div>
              </form>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <table class="list1 table table-hover table-striped">
                    <thead>
                      <tr>
                        <th width="10%" class="text-center">#</th>
                        <th width="30%" class="text-center">Nama</th>
                        <th width="20%" class="text-center">NIK</th>
                        <th width="20%" class="text-center">Biro</th>
                        <th width="10%" class="text-center">Hak Akses</th>
                        <th width="10%" class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){
                        $izin = 'tidak bisa akses';
                        switch ($value['izin']) {
                          case 0:
                            $izin = 'admin';
                          break;
                          case 1:
                            $izin = 'purchaser';
                          break;
                          case 2:
                            $izin = 'penyetuju';
                          break;
                        }
                      ?>
                      <tr>
                        <td class=""><?php echo ($key+1); ?></td>
                        <td class="text-center"><?php echo $value['nama'].'<br>'.$value['gelar']; ?></td>
                        <td class=""><?php echo $value['nik']; ?></td>
                        <td class=""><?php echo $value['biro']; ?></td>
                        <td class=""><?php echo $izin; ?></td>
                        <td>
                          <?php if(empty($data['id'])){ ?>
                          <button type="button" onclick="window.location='<?php echo base_url().'pengguna/form/'.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Revisi"><i class="fa fa-pencil-square-o"></i></button>
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