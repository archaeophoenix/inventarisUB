<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header"><h1>INVENTARIS</h1></section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
				<div class="box-header">
	                <div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
				</div>
				<!-- /.box-header -->
					<form role="form" method="post" action="<?php echo base_url().'inventaris/form/'.$param['jenis'] ?>">
						<div class="box-body">

							<div class="print">
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="biro" class="col-xs-2 control-label">Periode</label>
											<div class="col-xs-3">
												<input type="hidden" id="param" value="report/inventaris">
												<select class="form-control" onchange="periode()" id="bulan" name="bulan">
												<?php foreach ($bulan as $key => $value){ ?>
												<option <?php echo ($param['bulan'] == ($key+1)) ? 'selected="selected"' : '' ; ?> value="<?php echo ($key+1); ?>"><?php echo $value; ?></option>
												<?php }  ?>
												</select>
											</div>
											<div class="col-xs-3">
												<select class="form-control" onchange="periode()" id="tahun" name="tahun">
												<?php foreach ($tahun as $key => $value){ ?>
												<option <?php echo ($param['tahun'] == $value['tahun']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['tahun']; ?>"><?php echo $value['tahun']; ?></option>
												<?php }  ?>
												</select>
											</div>
											<div class="col-xs-4">
												<select class="form-control" onchange="periode()" id="jenis" name="jenis">
												<?php foreach ($jenis as $key => $value){ ?>
												<option <?php echo ($param['jenis'] == $value['value']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['value']; ?>"><?php echo $value['label']; ?></option>
												<?php }  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-xs-6"></div>
								</div>

								<div class="row">
									<div class="col-xs-9">
										<div class="box-body table-responsive" style="padding: 25px;">
											<table border="0" class="list1 table table-hover table-striped">
												<thead>
													<tr>
														<td></td>
														<th>#</th>
														<th>Biro</th>
														<th>Barang</th>
														<th>Tanggal</th>
														<th>Jumlah</th>
														<th>Pengguna</th>
														<th>Keterangan</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($inventaris as $key => $value) { ?>
													<tr>
														<td class="text-center">
														<?php if ($value['sisa'] > 0 && $value['id_purchase'] == 0 && $param['jenis'] != 'sisa') { ?>
															<input type="checkbox" name="id[]" class="id_barang<?php echo $key;?>" id="<?php echo $value['id_barang'];?>" onclick="id_barang(<?php echo $key;?>)" value="<?php echo $value['id'];?>">
															<input type="hidden" name="id_barang[]" id="id_barang<?php echo $key;?>">
														<?php } ?>
														</td>
														<td class="text-center">
															<?php echo ($key + 1); ?>
														</td>
														<td class="text-center"><?php echo $value['biro']; ?></td>
														<td class="text-center"><?php echo $value['barang']; ?></td>
														<td class="text-center"><?php echo date("d F Y",strtotime($value['tanggal'])); ?></td>
														<td class="text-center"><?php echo $value['sisa']; ?></td>
														<td class="text-center"><?php echo $value['pengguna']; ?></td>
														<td><?php echo $value['keterangan']; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-xs-3">
										<input type="hidden" id="masuk" value="<?php echo $chart['masuk'];?>">
										<input type="hidden" id="keluar" value="<?php echo $chart['keluar'];?>">
										<div class="chart-responsive"><div class="chart" id="sales-chart" style="position: relative;"></div>
									</div>
								</div>
							</div>

						</div>
						<!-- /.box-body -->
						<!-- box-footer -->
						<div class="box-footer text-right">
						<?php if($_SESSION['masuk']['izin'] != 2){ ?>
							<button type="button" onclick="window.location='<?php echo base_url().'inventaris/form/masuk'; ?>'" class="btn btn-primary btn-circle" title="Barang Masuk"><i class="fa fa-download"></i></button>
							<button type="button" onclick="window.location='<?php echo base_url().'inventaris/form/keluar'; ?>'" class="btn btn-info btn-circle batal" title="Barang Keluar"><i class="fa fa-upload"></i></button>
							<button type="submit" class="btn btn-warning btn-circle" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
						<?php }?>
							<button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
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