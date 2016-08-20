<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Vendor</h1>
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
          <div class="box-header"><h3 class="box-title">Data Vendor</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'vendor/submit/'.$data['id'];?>">
                  <div class="form-group">
                    <label for="nama" class="col-xs-2 control-label">Nama<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10">
                    <input value="<?php echo $data['id']; ?>" name="id" type="hidden">
                    <input required="required" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" id="nama" placeholder="Vendor" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telpon" class="col-xs-2 control-label">Telpon<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><input required="required" class="form-control" value="<?php echo $data['telpon']; ?>" id="telpon" name="telpon" placeholder="+6221xxx" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-xs-2 control-label">Alamat<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><textarea required="required" id="alamat" name="alamat" placeholder="Jalan Aspal Gang Buntu" style="width: 100%; height: 80px; font-size: 13px; line-height: 15px; border: 0.1px solid #dddddd; padding: 10px;"><?php echo $data['alamat']; ?></textarea></div>
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  <button type="button" onclick="window.location='<?php echo base_url().'vendor/form'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
                </div>
                </div>
              </form>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <table class="list1 table table-hover table-striped">
                    <thead>
                      <tr>
                        <th width="10%" class="text-center">#</th>
                        <th width="20%" class="text-center">Nama</th>
                        <th width="20%" class="text-center">Telpon</th>
                        <th width="30%" class="text-center">Alamat</th>
                        <th width="20%" class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){ ?>
                      <tr>
                        <td class=""><?php echo ($key+1); ?></td>
                        <td class=""><?php echo $value['nama']; ?></td>
                        <td class="text-right"><?php echo $value['telpon']; ?></td>
                        <td class=""><?php echo $value['alamat']; ?></td>
                        <td>
                          <?php if(empty($_GET['id'])){ ?>
                            <div class="btn-group">
                              <div class="btn-group">
                                <button aria-expanded="false" type="button" title="Report" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="text-left" onclick="window.location='<?php echo base_url().'report/kinerja/'.$value['id']; ?>'"><i class="fa fa-file"></i>&nbsp;Kinerja&nbsp;Vendor</a></li>
                                    <li><a class="text-left" onclick="window.location='<?php echo base_url().'report/check/'.$value['id']; ?>'"><i class="fa fa-file"></i>&nbsp;Checklist&nbsp;Pemantauan&nbsp;Pembelian</a></li>
                                </ul>
                              </div>
                            </div>
                          <button type="button" onclick="window.location='<?php echo base_url().'vendor/form/'.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Revisi"><i class="fa fa-pencil-square-o"></i></button>
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
<input type="hidden" id="column" value='[{"data" :"id"}, {"data" :"pembaruan"}, {"data" :"harga"}, {"data" :"vendor"}, {"data" :"barang"}]'>