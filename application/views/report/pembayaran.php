
<?php extract($purchase); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>PERMOHONAN PEMBAYARAN</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
        	<div class="print">
          	<div class="box-header">
          		<div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
	          	<div class="col-xs-8">
	            	<h3 class="text-left">PERMOHONAN PEMBAYARAN</h3>
	          	</div>
          	</div>
          	<!-- /.box-header -->
          	<form method="post" action="<?php echo base_url().'report/postpem/'.$id ?>">
	          	<div class="box-body">
	          		<div class="row">
	          			<div class="col-xs-12">
							<table class="table table-striped table-hover">
								<tr>
									<th width="20%">Kepada</th>
									<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="hidden" name="id"  value="<?php echo $id ; ?>">
											<input type="text" class="form-control" style="border:none;" name="kepada" placeholder="Kepada" value="<?php echo $kepada ; ?>">
										<?php } else {
											echo ucfirst(strtolower($kepada));
										} ?>
									</th>
								</tr>
								<tr>
									<th>Dari</th>
									<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="dari" placeholder="Dari" value="<?php echo $dari ; ?>">
										<?php } else {
											echo ucfirst(strtolower($dari));
										} ?>
									</th>
								</tr>
								<tr>
									<th>Nomor</th>
									<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="nomor" placeholder="Nomor" value="<?php echo $nomor ; ?>">
										<?php } else {
											echo $nomor;
										} ?>
									</th>
								</tr>
								<tr>
									<th>Tanggal</th>
									<th class="text-left">
										<?php if ($edit == 'edit') { $tanggalbayar = (empty($tanggalbayar)) ? date('d-m-Y') : $tanggalbayar ;?>
											<input type="text" class="form-control datepicker" style="border:none;" name="tanggalbayar" placeholder="<?php echo date('d-m-Y'); ?>" value="<?php echo date("d-m-Y",strtotime($tanggalbayar)); ?>">
										<?php } else {
											echo (empty($tanggalbayar)) ? '' : date("d-m-Y",strtotime($tanggalbayar));
										} ?>
									</th>
								</tr>
								<tr>
									<th>Perihal</th>
									<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="perihal" placeholder="Perihal" value="<?php echo $perihal ; ?>">
										<?php } else {
											echo ucfirst(strtolower($perihal));
										} ?>
									</th>
								</tr>
							</table>
			          	</div>
	          			<div class="col-xs-12 table-responsive">
	          				<samp>Bersama ini kami mengajukan permohonan pembayaran atas pembelian barang dan/atau jasa dengan perincian sebagai berikut:</samp>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th width="10%" class="text-center">#</th>
										<th width="45%" class="text-center">Jenis Barang/Jasa</th>
										<th width="15%" class="text-center">Jumlah</th>
										<th width="15%" class="text-center">Harga Satuan</th>
										<th width="15%" class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$jum = null;
									$har = null;
									$tot = null;
									foreach ($item as $key => $val){ ?>
									<tr>
										<td class="text-center"><?php echo ($key+1) ?></td>
										<td><?php echo $val['nama']; ?></td>
										<td class="text-center"><?php echo $val['jumlah']; $jum += $val['jumlah']; ?></td>
										<td class="text-center"><?php echo $val['harga']; $har += $val['harga']; ?></td>
										<td class="text-center"><?php echo ($val['harga'] * $val['jumlah']); $tot += ($val['harga'] * $val['jumlah']); ?></td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center" colspan="2">Total</th>
										<th class="text-center"><?php echo $jum ?></th>
										<th class="text-center"><?php echo $har ?></th>
										<th class="text-center"><?php echo $tot ?></th>
									</tr>
								</tfoot>
							</table>
	          			</div>
	          			<div class="col-xs-12 table-responsive">
	          				<table class="table table-striped table-hover">
	          					<thead>
	          						<tr>
	          							<th colspan="2" class="text-center">Catatan</th>
	          						</tr>
	          					</thead>
	          					<tbody>
	          						<tr>
	          							<th class="text-center" width="25%">Pembayaran ditransfer ke</th>
	          							<th class="text-left">&nbsp;</th>
	          						</tr>
	          						<tr>
	          							<th class="text-center">Nama</th>
	          							<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="nama" placeholder="Nama" value="<?php echo $nama ; ?>">
										<?php } else {
											echo ucfirst(strtolower($nama));
										} ?>
										</th>
	          						</tr>
	          						<tr>
	          							<th class="text-center">Bank</th>
	          							<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="bank" placeholder="Bank" value="<?php echo $bank ; ?>">
										<?php } else {
											echo strtoupper($bank);
										} ?>
										</th>
	          						</tr>
	          						<tr>
	          							<th class="text-center">No. Rek</th>
	          							<th class="text-left">
										<?php if ($edit == 'edit') { ?>
											<input type="text" class="form-control" style="border:none;" name="rekening" placeholder="Nomor Rekening" value="<?php echo $rekening ; ?>">
										<?php } else {
											echo $rekening;
										} ?>
										</th>
	          						</tr>
	          					</tbody>
	          				</table>
	          			</div>
	          			<div class="col-xs-12 table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th width="25%" class="text-center">Pemohon</th>
										<th width="25%" class="text-center">Mengetahui Atasan</th>
										<th width="25%" class="text-center">WaRek Bid. Nonakademik</th>
										<th width="25%" class="text-center">Rektor</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($pengaju)).'<br>'.$nik_pengaju; ?>
										</th>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($atasan)).'<br>'.$nik_atasan; ?>
										</th>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($wareknonakademik)).'<br>'.$nik_wareknonakademik; ?>
										</th>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($rektor)).'<br>'.$nik_rektor; ?>
										</th>
									</tr>
								</tbody>
							</table>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th width="25%" class="text-center">No Akun Pemohon</th>
										<th width="25%" class="text-center">Pemeriksa Keuangan</th>
										<th width="25%" class="text-center">Ka.Biro Keuangan</th>
										<th width="25%" class="text-center">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="text-center">
											<?php if ($edit == 'edit') { ?>
												<input type="text" class="form-control" style="border:none;" name="akun" placeholder="Akun Pemohon" value="<?php echo $akun ; ?>">
											<?php } else {
												echo $akun; ?>
												<br>&nbsp;<br>&nbsp;<br>
										<?php } ?>
										</th>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($keuangan)).'<br>'.$nik_keuangan; ?>
										</th>
										<th class="text-center">
											<br>&nbsp;<br>&nbsp;<br>
											<?php echo ucfirst(strtolower($kakeuangan)).'<br>'.$nik_kakeuangan; ?>
										</th>
										<th class="text-center">&nbsp;<br>&nbsp;<br>&nbsp;</th>
									</tr>
								</tbody>
							</table>
	          			</div>
	          		</div>
				</div>
			</div>
	          	<!-- /.box-body -->
	          	<!-- .box-footer -->
				<div class="box-footer">
					<div class="box-footer text-right">
					<?php if($edit == 'edit'){ ?>
						<button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
						<button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
						<button type="button" onclick="window.location='<?php echo url.'/..'; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
					<?php } else { ?>
						<button type="button" onclick="window.location='<?php echo url.'/edit'; ?>'" class="btn btn-info btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
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