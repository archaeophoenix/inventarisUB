<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header"><h1>Scan</h1></section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header"><h3 class="box-title">Data Scan</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'purchase/file/'.$id;?>">
                  <div class="form-group">
                    <label for="barang" class="col-xs-2 control-label">File<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><input required="required" class="btn btn-default btn-circle" name="file" type="file"></div>
                  </div>
                  <div class="form-group">
                    <label for="barang" class="col-xs-2 control-label">Detail<label style="color:#f00;">*</label></label>
                    <div class="col-xs-10"><textarea required="required" name="keterangan" class="col-xs-2 form-control"></textarea></div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
                  </div>
                </form>
              </div>
              <div class="col-xs-6">
                <div class="box-body table-responsive no-padding">
                  <div class="row">
                      <?php $txt = '' ;
                      foreach ($img as $key => $value){
                        $i = ((($key+1) % 3) == 0) ? '</div><br><div class="row">' : '' ;

                        $txt .= '<div class="col-xs-4 text-center"><a onclick="modal('.$key.')" href="#" data-toggle="modal" data-target="#myModal"><img class="img-responsive img-rounded" style="max-width: 120px; max-heigh: 120px;" src="'.base_url().'images/upload/'.$value['file'].'"></a><input id="keterangan'.$key.'" type="hidden" value="'.$value['keterangan'].'"><input id="file'.$key.'" type="hidden" value="'.base_url().'images/upload/'.$value['file'].'"></div>'.$i;
                      } 
                      echo $txt; 
                      ?>
                  </div>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Scan</h4>
      </div>
      <div class="modal-body">
        <div id="area">
          <div id="keterangan">
            <div class="text-center" style="margin:0 auto; display: inline;">
              <img src="" class="img-responsive img-rounded" id="img">
            </div>
            <p class="text-center" id="txt"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>