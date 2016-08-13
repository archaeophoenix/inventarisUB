<?php extract($purchase); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>PURCHASE REQUEST</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
        	<div class="print">
          	<div class="box-header">
	          	<div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
	          	<div class="col-xs-4">
	            	<h3 class="text-center">PURCHASE REQUEST</h3>
	          	</div>
			</div>
          	<!-- /.box-header -->
          	<form method="post" action="<?php echo url.'?q=submit&form=purchase&values[]='.$id.'&values[]='.$id ?>">
				<div class="box-body">
	          		<div class="row">
	          			<div class="col-xs-12 table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">Ref. Number</th>
										<th width="25%" class="text-center">Tanggal</th>
										<th class="text-center">Bagian/Biro</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="text-center"><?php echo $ref; ?></th>
										<th width="25%" class="text-center"><?php echo date("d F Y",strtotime($tanggal)); ?></th>
										<th class="text-center"><?php echo ucfirst(strtolower($biro)); ?></th>
									</tr>
								</tbody>
							</table>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th width="5%" class="text-center">#</th>
										<th width="20%" class="text-center">Item</th>
										<th width="35%" class="text-center">Spesification</th>
										<th width="5%" class="text-center">Quantity</th>
										<th width="15%" class="text-center">Unit Price</th>
										<th width="20%" class="text-center">Price</th>
									</tr>
								</thead>
								<tbody>
									<?php $qty = 0;$hrg = 0;$ttl = 0;
									foreach ($item as $key => $var) { ?>
									<tr>
										<td class="text-center"><?php echo ($key+1) ?></td>
										<td><?php echo $var['nama']; ?></td>
										<td><?php echo $var['spesifikasi']; ?></td>
										<td class="text-center"><?php echo $var['jumlah']; $qty += $var['jumlah']; ?></td>
										<td class="text-center"><?php echo number_format($var['harga'],2,',','.'); $hrg += $var['harga']; ?></td>
										<td class="text-center"><?php echo number_format($var['harga']*$var['jumlah'],2,',','.'); $ttl += ($var['harga']*$var['jumlah']); ?></td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-right" colspan="3">TOTAL</th>
										<th class="text-center"><?php echo $qty; ?></th>
										<th class="text-center"><?php echo number_format($hrg,2,',','.'); ?></th>
										<th class="text-center"><?php echo number_format($ttl,2,',','.'); ?></th>
									</tr>
								</tfoot>
							</table>
	          			</div>
	          			<div class="col-xs-8">
	          				<div class="col-xs-3"></div>
	          				<div class="col-xs-4">
          					<?php
          						$status = ($purchase['status'] == 0 ) ? 'Belum' : 'Sudah' ;
	          					echo $status.' Dianggarkan';
          					?>
	          				</div>
	          			</div>
	          			<div class="col-xs-6 table-responsive">
							<table class="table table-striped table-hover">
								<tr>
									<th class="text-center">Disiapkan Oleh</th>
									<th class="text-center">Diketahui Oleh</th>
								</tr>
								<tr>
									<th class="text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo ucfirst(strtolower($staff)).'<br>'.$nik_staff; ?>
									</th>
									<th class="text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo ucfirst(strtolower($kabiro)).'<br>'.$nik_kabiro; ?>
									</th>
								</tr>
								<tr>
									<th class="text-center">&nbsp;<br>&nbsp;<br>&nbsp;</th>
									<th class="text-center">&nbsp;<br>&nbsp;<br>&nbsp;</th>
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
						<button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
						<?php if($level > 3){ ?>
							<button type="button" class="btn btn-primary btn-circle" title="Report Order" onclick="window.location='<?php echo base_url().'report/order/'.$id ?>'"><i class="fa fa-angle-right"></i></button>
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