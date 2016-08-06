<!--modal-->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="label">Detail Pegawai</h4>
      </div>
      <div class="modal-body form-horizontal">
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">staff</label>
          <div class="col-sm-4"><strong id="staff"></strong>&nbsp;<small id="nik_staff"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">purchaser</label>
          <div class="col-sm-4"><strong><p id="purchaser"></p></strong>&nbsp;<small id="nik_purchaser"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">pemeriksa keuangan</label>
          <div class="col-sm-4"><strong><p id="keuangan"></p></strong>&nbsp;<small id="nik_keuangan"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">ka. biro</label>
          <div class="col-sm-4"><strong><p id="kabiro"></p></strong>&nbsp;<small id="nik_kabiro"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">ka. keuangan</label>
          <div class="col-sm-4"><strong><p id="kakeuangan"></p></strong>&nbsp;<small id="nik_kakeuangan"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">ka. biro umum</label>
          <div class="col-sm-4"><strong><p id="kabiroumum"></p></strong>&nbsp;<small id="nik_kabiroumum"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">warek non akademik</label>
          <div class="col-sm-4"><strong><p id="wareknonakademik"></p></strong>&nbsp;<small id="nik_wareknonakademik"></small></div>
        </div>
        <div class="form-group text-capitalize">
          <label for="" class="col-sm-4 control-label">rektor</label>
          <div class="col-sm-4"><strong><p id="rektor"></p></strong>&nbsp;<small id="nik_rektor"></small></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--/modal-->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>Penyetuju</h1>
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
          <div class="box-header"><h3 class="box-title">Data Penyetuju</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" method="post" action="<?php echo base_url().'?q=submit&form=penyetuju&values[]='.$data['id'];?>">
                  <div class="form-group">
                    <label for="staff" class="col-sm-2 control-label">Staff Umum</label>
                    <div class="col-sm-5">
                      <input value="<?php echo $data['id']; ?>" name="id" type="hidden">
                      <input class="form-control" value="<?php echo $data['staff']; ?>" name="staff" id="staff" placeholder="Nama Staff" type="text">
                    </div>
                    <div class="col-sm-5"><input class="form-control" value="<?php echo $data['nik_staff']; ?>" name="nik_staff" placeholder="NIK Staff Umum" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="purchaser" class="col-sm-2 control-label text-capitalize">purchaser</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['purchaser']; ?>" id="purchaser" name="purchaser" placeholder="nama purchaser" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_purchaser']; ?>" name="nik_purchaser" placeholder="NIK purchaser" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="keuangan" class="col-sm-2 control-label text-capitalize">Pemeriksa keuangan</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['keuangan']; ?>" id="keuangan" name="keuangan" placeholder="nama Pemeriksa keuangan" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_keuangan']; ?>" name="nik_keuangan" placeholder="NIK Pemeriksa keuangan" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="kabiro" class="col-sm-2 control-label text-capitalize">ka. biro</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['kabiro']; ?>" id="kabiro" name="kabiro" placeholder="nama kabiro" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_kabiro']; ?>" name="nik_kabiro" placeholder="NIK kabiro" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="kakeuangan" class="col-sm-2 control-label text-capitalize">ka. keuangan</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['kakeuangan']; ?>" id="kakeuangan" name="kakeuangan" placeholder="nama kakeuangan" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_kakeuangan']; ?>" name="nik_kakeuangan" placeholder="NIK kakeuangan" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="kabiroumum" class="col-sm-2 control-label text-capitalize">ka. biro umum</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['kabiroumum']; ?>" id="kabiroumum" name="kabiroumum" placeholder="nama kabiroumum" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_kabiroumum']; ?>" name="nik_kabiroumum" placeholder="NIK kabiroumum" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="wareknonakademik" class="col-sm-2 control-label text-capitalize">warek non akademik</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['wareknonakademik']; ?>" id="wareknonakademik" name="wareknonakademik" placeholder="nama wareknonakademik" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_wareknonakademik']; ?>" name="nik_wareknonakademik" placeholder="NIK wareknonakademik" type="text"></div>
                  </div>
                  <div class="form-group">
                    <label for="rektor" class="col-sm-2 control-label text-capitalize">rektor</label>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['rektor']; ?>" id="rektor" name="rektor" placeholder="nama rektor" type="text"></div>
                    <div class="col-sm-5"><input class="form-control text-capitalize" value="<?php echo $data['nik_rektor']; ?>" name="nik_rektor" placeholder="NIK rektor" type="text"></div>
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  <button type="button" onclick="window.location='<?php echo base_url().'?q=list&list=penyetuju'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
                </div>
                </div>
              </form>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <table class="list1 table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center text-capitalize">staff umum</th>
                        <th class="text-center text-capitalize">purchaser</th>
                        <th class="text-center text-capitalize">Pemeriksa keuangan</th>
                        <th class="text-center text-capitalize">ka. biro</th>
                        <th class="text-center text-capitalize">ka. keuangan</th>
                        <th class="text-center text-capitalize">ka. biro umum</th>
                        <th class="text-center text-capitalize">warek non akademik</th>
                        <th class="text-center text-capitalize">rektor</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list as $key => $value){
                        $status = ($key != 0) ? 'danger' : '' ;
                        $title = ($key != 0) ? 'Expired' : '' ;
                      ?>
                      <tr title="<?php echo $title; ?>" class="<?php echo $status; ?>">
                        <td class="text-center"><?php echo ($key+1); ?></td>
                        <td class="text-center text-capitalize">
                          <strong><p id="staff<?php echo $key; ?>"><?php echo $value['staff']; ?></p></strong>
                          <small id="nik_staff<?php echo $key; ?>"><?php echo $value['nik_staff']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="purchaser<?php echo $key; ?>"><?php echo $value['purchaser']; ?></p></strong>
                          <small id="nik_purchaser<?php echo $key; ?>"><?php echo $value['nik_purchaser']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="keuangan<?php echo $key; ?>"><?php echo $value['keuangan']; ?></p></strong>
                          <small id="nik_keuangan<?php echo $key; ?>"><?php echo $value['nik_keuangan']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="kabiro<?php echo $key; ?>"><?php echo $value['kabiro']; ?></p></strong>
                          <small id="nik_kabiro<?php echo $key; ?>"><?php echo $value['nik_kabiro']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="kakeuangan<?php echo $key; ?>"><?php echo $value['kakeuangan']; ?></p></strong>
                          <small id="nik_kakeuangan<?php echo $key; ?>"><?php echo $value['nik_kakeuangan']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="kabiroumum<?php echo $key; ?>"><?php echo $value['kabiroumum']; ?></p></strong>
                          <small id="nik_kabiroumum<?php echo $key; ?>"><?php echo $value['nik_kabiroumum']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="wareknonakademik<?php echo $key; ?>"><?php echo $value['wareknonakademik']; ?></p></strong>
                          <small id="nik_wareknonakademik<?php echo $key; ?>"><?php echo $value['nik_wareknonakademik']; ?></small>
                        </td>
                        <td class="text-center text-capitalize">
                          <strong><p id="rektor<?php echo $key; ?>"><?php echo $value['rektor']; ?></p></strong>
                          <small id="nik_rektor<?php echo $key; ?>"><?php echo $value['nik_rektor']; ?></small>
                        </td>
                        <td>
                          <?php if(empty($_GET['id'])){ ?>
                          <button type="button" onclick="window.location='<?php echo base_url().'?q=list&list=penyetuju&id='.$value['id']; ?>'" class="btn btn-xs btn-info btn-circle" title="Revisi"><i class="fa fa-pencil-square-o"></i></button>
                          <button type="button" data-toggle="modal" data-target="#detail" onclick="detail(<?php echo $key; ?>);" class="btn btn-xs btn-success btn-circle" title="Detail"><i class="fa fa-newspaper-o"></i></button>
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