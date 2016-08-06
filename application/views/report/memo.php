<!-- Content Wrapper. Contains page content -->
<?php extract($purchase); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"><h1>Internal Memo</h1></section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box"> 
          <form method="post" action="<?php echo base_url().'report/postmem/' . $id; ?>">
            <div class="print">
              <div class="box-header">
                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-hover">
                          <tr>
                            <th>Date</th>
                            <th><strong><?php echo date("d F Y", strtotime($tanggal)); ?></strong></th>
                          <tr>
                            <th><strong>No</strong></th>
                            <th>
                            <?php if ($edit == 'edit') {?>
                              <div class="col-xs-4"><input type="text" name="nomemo" class="form-control" value="<?php echo $nomemo;?>"></div>
                            <?php } else {?>
                              <strong><?php echo $nomemo; ?></strong>
                            <?php } ?>
                            </th>
                          </tr>
                          <tr>
                            <th><strong>From</strong></th>
                            <th><strong><?php echo ucfirst(strtolower($pengaju)).' '.$glr_pengaju; ?> (<?php echo $biro; ?>)</strong></th>
                          </tr>
                          <tr>
                            <th><strong>To</strong></th>
                            <th><strong><?php echo ucfirst(strtolower($kabag)).' '.$glr_kabag; ?> (Kabag General Affair)</strong></th>
                          </tr>
                          <tr>
                            <th><strong>CC</strong></th>
                            <th>
                              <p>
                                <strong>
                                  1. <?php echo ucfirst(strtolower($rektor)).' '.$glr_rektor; ?> (Rektor Universitas Bakrie)<br /> 
                                  2. <?php echo ucfirst(strtolower($wareknonakademik)).' '.$glr_wareknonakademik; ?> (Wakil Rektor Bid. Non Akademik)<br />
                                  3. <?php echo ucfirst(strtolower($kakeuangan)).' '.$glr_kakeuangan; ?>(Ketua Administrasi Keuangan)<br />
                                  4. <?php echo ucfirst(strtolower($kabag)).' '.$glr_kabag; ?> (Kabag General Affair)
                                </strong>
                              </p>
                            </th>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12"><h4><b>Permohonan permintaan barang <?php echo $purchasing; ?></b></h4><br/></div>
                  <div class="col-xs-12 table-responsive">
                  <p>Dengan hormat,Bersama ini kami mengajukan permohonan permintaan barang <?php echo $purchasing; ?> sebagai berikut:<br /></p>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="25%" class="text-center">Jenis Barang</th>
                        <th class="text-center">Spesifikasi</th>
                        <th width="5%" class="text-center">Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($item as $key => $value){ ?>
                      <tr>
                      <td class="text-center"><?php echo ($key + 1); ?></td>
                      <td><?php echo $value['nama']; ?></td>
                      <td><?php echo $value['spesifikasi']; ?></td>
                      <td class="text-center"><?php echo $value['jumlah']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table><br/>
              <p>Sebagai informasi, permintaan barang ini ditujukan untuk:</p>
              <fieldset>
                <?php if ($edit == 'edit') {?>
                  <textarea class="" name="memo" placeholder="Place some text here" style="width: 100%; height: 80px; font-size: 13px; line-height: 15px; border: 0.1px solid #dddddd; padding: 10px;"><?php echo $memo; ?></textarea>
                <?php } else {?>
                  <samp><p><?php echo ucfirst($memo); ?></p></samp>
                <?php } ?>
              </fieldset>
              <p>Demikian permohonan ini kami ajukan, atas persetujuannya kami ucapkan terima kasih.</p>
            </div>
            <div class="col-xs-12">
              <div class="col-xs-5"></div>
              <div class="col-xs-4">
                <b><?php $status = ($status == 0) ? 'Belum' : 'Sudah'; echo $status . ' Dianggarkan'; echo '<br>'; ?></b><br  /> 
              </div>
            </div>
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped table-hover">
                <tr>
                  <th width="97" colspan="2"  class="text-center" >Diajukan Oleh</th>
                  <th colspan="2" class="text-center">Mengetahui</th>
                </tr>
                <tr>
                  <th width="116" class="text-center">Pemohon</th>
                  <th width="116" class="text-center">Atasan Langsung</th>
                  <th width="160" class="text-center">Wakil Rektor</th>
                  <th width="160" class="text-center">Rektor</th>
                </tr>
                <tr>
                  <th class="text-center">
                    <br>&nbsp;<br>&nbsp;<br>
                    <?php echo ucfirst(strtolower($pengaju)) . '<br>' . $nik_pengaju; ?>
                  </th>
                  <th class="text-center">
                    <br>&nbsp;<br>&nbsp;<br>
                    <?php echo ucfirst(strtolower($atasan)) . '<br>' . $nik_atasan; ?>
                  </th>
                  <th class="text-center">
                    <br>&nbsp;<br>&nbsp;<br>
                    <?php echo ucfirst(strtolower($wareknonakademik)) . '<br>' . $nik_wareknonakademik; ?>
                  </th>
                  <th width="98" class="text-center">
                    <br>&nbsp;<br>&nbsp;<br>
                    <?php echo ucfirst(strtolower($rektor)) . '<br>' . $nik_rektor; ?>
                  </th>
                </tr>
              </table>
            </div>
          </div>
        </div>
        </div>

        <!-- /.box-body -->
        <!-- .box-footer -->
        <div class="box-footer">
          <div class="box-footer text-right">
          <?php if ($edit == 'edit') { ?>
            <button type="submit"  class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
            <button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
            <button type="button" onclick="window.location='<?php echo url . '/../../'.$id; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
          <?php } else { ?>
            <button type="button" onclick="window.location='<?php echo url . '/edit'; ?>'" class="btn btn-info btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
            <button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
          <?php } ?>
          </div>
        </div>
      </form>
          <!-- /.box-footer -->
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