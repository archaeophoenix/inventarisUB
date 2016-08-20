<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Data Biro</h1>
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
          <div class="box-header"><h3 class="box-title">Data Biro</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'biro/submit/';?>">
                  <div class="form-group">
                    <label for="barang" class="col-xs-3 control-label">Nama Biro<label style="color:#f00;">*</label></label>
                    <div class="col-xs-9">
                    <input value="<?php echo $data['id']; ?>" name="id" type="hidden">
                    <input value="<?php echo $data['nama']; ?>" name="old" type="hidden">
                    <input required="required" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" id="barang" placeholder="Nama Produk" type="text">
                    </div>
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  <?php if(!empty($data['id'])){ ?>
                  <button type="button" onclick="window.location='<?php echo base_url().'biro/form'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
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
                        <th width="80%" class="text-center">Nama Biro</th>
                        <th width="10%" class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){ ?>
                      <tr>
                        <td class="text-center"><?php echo ($key+1); ?></td>
                        <td class=""><?php echo $value['nama']; ?></td>
                        <td>
                          <?php if(empty($_GET['id'])){ ?>
                          <button type="button" onclick="window.location='<?php echo base_url().'biro/form/'.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Revisi"><i class="fa fa-pencil-square-o"></i></button>
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