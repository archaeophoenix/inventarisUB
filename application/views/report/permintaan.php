<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>PERMINTAAN BARANG</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
			<div class="print">
			<div class="box-header">
				<div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
				<div class="col-xs-4"><h3 class="text-center">PERMINTAAN BARANG</h3></div>
			</div>
          <!-- /.box-header -->
          	<form method="post" action="<?php echo base_url().''.$purchase['id'] ?>">
				<div class="box-body">
	          		<div class="row">
	          			<div class="col-xs-6">
		          			<div class="row">
					          	<div class="col-xs-8 table-responsive">
									<table class="table table-striped table-hover">
										<tr>
											<th width="20%">Bag/Biro</th>
											<th><?php echo $purchase['biro'] ?></th>
										</tr>
										<tr>
											<th>Tanggal</th>
											<th><?php echo strftime( "%d %B %Y", strtotime($purchase['tanggal'])) ?></th>
										</tr>
									</table>
					          	</div>
				          	</div>
			          	</div>
	          			<div class="col-xs-12 table-responsive">
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
									<?php foreach ($purchase['item'] as $key => $value) { ?>
										<tr>
											<td class="text-center"><?php echo ($key+1); ?></td>
											<td><?php echo $value['nama']; ?></td>
											<td><?php echo $value['spesifikasi'];?></td>
											<td class="text-center"><?php echo $value['jumlah'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
	          			</div>
	          			<div class="col-xs-8">
	          				<div class="col-xs-4"></div>
	          				<div class="col-xs-4">
          					<?php
	          					$status = ($purchase['status'] == 0 ) ? 'Belum' : 'Sudah' ;
	          					echo $status.' Dianggarkan';
          					?>
	          				</div>
	          			</div>
	          			<div class="col-xs-8 table-responsive">
							<table class="table table-striped table-hover">
								<tr>
									<th rowspan="2" style="vertical-align:middle;" class="text-center">Diajukan Oleh</th>
									<th colspan="2" class="text-center">Disetujui</th>
								</tr>
								<tr>
									<th class="text-center">Atasan Langsung</th>
									<th class="text-center">Ka. Bag/Ka. Biro</th>
								</tr>
								<tr>
									<th class="text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo ucfirst(strtolower($purchase['pengaju'])).'<br>'.$purchase['nik_pengaju']; ?>
									</th>
									<th class="text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo ucfirst(strtolower($purchase['atasan'])).'<br>'.$purchase['nik_atasan']; ?>
									</th>
									<th class="text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo ucfirst(strtolower($purchase['kabiro'])).'<br>'.$purchase['nik_kabiro']; ?>
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
						<?php if ($purchase['type'] == 1 && $inventaris == 0) { ?>
							<button type="button" class="btn btn-primary btn-circle" title="Tambah ke Inventaris" onclick="window.location='<?php echo base_url()."inventaris/permintaan/".$purchase['id'];?>';"><i class="fa fa-cube"></i></button>
						<?php } ?>
						<button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
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