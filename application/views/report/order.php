<?php extract($purchase); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h1>PURCHASE ORDER</h1>
 	</section>

  <!-- Main content -->
	<section class="content">
		<div class="row">
		  	<div class="col-xs-12">
			    <div class="box">
		      		<!-- print -->
			    	<div class="print">
			      		<!-- box-header -->
					<div class="box-header">
						<div class="col-xs-4"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
						<div class="col-xs-4"><h3 class="text-center">PURCHASE ORDER</h3></div>
					</div>
			      	<!-- /.box-header -->
			      	<form method="post" action="<?php echo base_url().'report/postord/'.$id ?>">
				      	<div class="box-body">
				      		<div class="row">
				      			<div class="col-xs-12 table-responsive">
				      				<div class="row">
				      					<div class="col-xs-6 table-responsive">
											<table class="table table-striped table-hover">
												<tr>
													<th width="20%">To<label style="color:#f00;">*</label></th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input required="required" type="text" class="form-control" style="border:none;" name="to" placeholder="John" value="<?php echo $to ; ?>">
														<?php } else {
															echo ucfirst(strtolower($to));
														} ?>
													</td>
												</tr>
												<tr>
													<th>Phone<label style="color:#f00;">*</label></th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input required="required" type="text" class="form-control" style="border:none;" name="phone" placeholder="+6281****" value="<?php echo $phone ; ?>">
														<?php } else {
															echo $phone;
														} ?>
													</td>
												</tr>
												<tr>
													<th>Fax</th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input type="text" class="form-control" style="border:none;" name="fax" placeholder="+6221****" value="<?php echo $fax ; ?>">
														<?php } else {
															echo $fax;
														} ?>
													</td>
												</tr>
												<tr>
													<th>Attn</th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input type="text" class="form-control" style="border:none;" name="attn" placeholder="Attention" value="<?php echo $attn ; ?>">
														<?php } else {
															echo ucfirst(strtolower($attn));
														} ?>
													</td>
												</tr>
											</table>
				      					</div>
				      					<div class="col-xs-6 table-responsive">
											<table class="table table-striped table-hover">
												<tr>
													<th width="35%">Date<label style="color:#f00;">*</label></th>
													<td>
														<?php if ($edit == 'edit') { $dates = (empty($dates)) ? date('d-m-Y') : $dates ; ?>
															<input required="required" type="text" class="form-control datepicker" style="border:none;" name="dates" placeholder="<?php echo date('d-m-Y'); ?>" value="<?php echo date("d-m-Y",strtotime($dates)); ?>">
														<?php } else {
															echo (empty($dates)) ? '' : date("d-m-Y",strtotime($dates));
														} ?>
													</td>
												</tr>
												<tr>
													<th>P.O. No.</th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input type="text" class="form-control" style="border:none;" name="po" placeholder="9237" value="<?php echo $po ; ?>">
														<?php } else {
															echo $po;
														} ?>
													</td>
												</tr>
												<tr>
													<th>Rev. Internal Memo</th>
													<td>
														<?php if ($edit == 'edit') { ?>
															<input type="text" class="form-control" style="border:none;" name="ref" placeholder="ref" value="<?php echo $ref ; ?>">
														<?php } else {
															echo $ref;
														} ?>
													</td>
												</tr>
											</table>
				      					</div>
				      				</div>
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
											foreach ($item as $key => $value) { ?>
											<tr>
												<td class="text-center"><?php echo ($key + 1); ?></td>
												<td><?php echo $value['nama']; ?></td>
												<td><?php echo $value['spesifikasi']; ?></td>
												<td class="text-center"><?php echo $value['jumlah']; $qty += $value['jumlah']; ?></td>
												<td class="text-center"><?php echo number_format($value['harga'],2,',','.'); $hrg += $value['harga']; ?></td>
												<td class="text-center"><?php echo number_format($value['harga']*$value['jumlah'],2,',','.'); $ttl += ($value['harga']*$value['jumlah']); ?></td>
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
				      			<div class="col-xs-12 table-responsive">
				      				<table class="table table-striped table-hover">
				      					<tr>
				      						<th width="20%">1) DELIVERY</th>
				      						<td>
												<?php if ($edit == 'edit') { ?>
													<select class="select2" name="delivery">
														<option></option>
														<?php foreach ($deliver as $key => $value) {?>
															<option <?php echo ($value == $delivery) ? 'selected="selected"' : '' ;?> value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php } ?>
													</select>
												<?php } else {
													echo ucfirst(strtolower($delivery));
												} ?>
											</td>
				      					</tr>
				      					<tr>
				      						<th>2) PAYMENT</th>
				      						<td>
												<?php if ($edit == 'edit') { ?>
													<select class="select2" name="payment">
														<option></option>
														<?php foreach ($pay as $key => $value) {?>
															<option <?php echo ($value == $payment) ? 'selected="selected"' : '' ;?> value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php } ?>
													</select>
												<?php } else {
													echo ucfirst(strtolower($payment));
												} ?>
											</td>
				      					</tr>
				      					<tr>
				      						<th>3) OTHERS</th>
				      						<td>
												<?php if ($edit == 'edit') { ?>
													<input type="text" class="form-control" style="border:none;" name="other" placeholder="OTHERS" value="<?php echo $other ; ?>">
												<?php } else {
													echo ucfirst(strtolower($other));
												} ?>
											</td>
				      					</tr>
				      				</table>
				      			</div>
				      			<div class="col-xs-4">&nbsp;</div>
				      			<div class="col-xs-8" style="height: 100px;">
				      				<div class="col-xs-6 text-center">&nbsp;</div>
				      				<div class="col-xs-6 text-center"><b>UNIVERSITAS BAKRIE</b></div>
				      			</div>
				      			<div class="col-xs-4">&nbsp;</div>
				      			<div class="col-xs-8">
				      				<div class="col-xs-6 text-center">&nbsp;</div>
				      				<div class="col-xs-6 text-center">&nbsp;</div>
				      			</div>
				      			<div class="col-xs-4">&nbsp;</div>
				      			<div class="col-xs-8">
				      				<div class="col-xs-6 text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo '<b>'.ucfirst(strtolower($kakeuangan)).'<br>'.$nik_kakeuangan.'</b>'; ?>
				      				</div>
				      				<div class="col-xs-6 text-center">
										<br>&nbsp;<br>&nbsp;<br>
										<?php echo '<b>'.ucfirst(strtolower($kabiro)).'<br>'.$nik_kabiro.'</b>'; ?>
				      				</div>
				      			</div>
				      			<div class="col-xs-12"><samp>Please confirm your acceptance of this Purchaser Order under the above conditions by signing the copy of this Purchaser Order & returningit to us</samp></div>
				      			<div class="col-xs-6">
				          			<div class="col-xs-12 table-responsive">
									<table class="table table-hover">
										<tr>
											<th width="20%">Signature<label style="color:#f00;">*</label></th>
											<td>
												<?php if ($edit == 'edit') { ?>
													<input required="required" type="text" class="form-control" style="border:none;" name="signature" placeholder="signature" value="<?php echo $signature ; ?>">
												<?php } else {
													echo ucfirst(strtolower($signature));
												} ?>
											</td>
										</tr>
										<tr>
											<th>Name<label style="color:#f00;">*</label></th>
											<td>
												<?php if ($edit == 'edit') { ?>
													<input required="required" type="text" class="form-control" style="border:none;" name="sname" placeholder="Name" value="<?php echo $sname ; ?>">
												<?php } else {
													echo ucfirst(strtolower($sname));
												} ?>
											</td>
										</tr>
										<tr>
											<th>Date</th>
											<td>
												<?php if ($edit == 'edit') { $sdate = (empty($sdate)) ? date('d-m-Y') : $sdate ; ?>
													<input required="required" type="text" class="form-control datepicker" style="border:none;" name="sdate" placeholder="<?php echo date('d-m-Y'); ?>" value="<?php echo date("d-m-Y",strtotime($sdate)); ?>">
												<?php } else {
													echo (empty($sdate)) ? '' : date("d-m-Y",strtotime($sdate));
												} ?>
											</td>
										</tr>
									</table>
				          			</div>
				      			</div>
				      			<div class="col-xs-6">Company Stamp</div>
				      		</div>
						</div>
					</div>
		      		<!-- /.print -->
		      			<!-- /.box-body -->
		      			<!-- .box-footer -->
						<div class="box-footer">
							<div class="box-footer text-right">
							<?php if($edit == 'edit'){ ?>
								<button type="submit" class="btn btn-primary btn-circle" title="Simpan"><i class="fa fa-check"></i></button>
								<button type="reset" onclick="window.location='<?php echo url; ?>'" class="btn btn-warning btn-circle" title="ReSet"><i class="fa fa-undo"></i></button>
								<button type="button" onclick="window.location='<?php echo url.'/../../'.$id; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
							<?php } else { ?>
								<?php if($_SESSION['masuk']['izin'] != 2){ ?>
									<button type="button" class="btn btn-info btn-circle" title="Edit" onclick="window.location='<?php echo url.'/edit'; ?>'"><i class="fa fa-pencil-square-o"></i></button>
								<?php }?>
								<button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
								<?php if($level > 4){ ?>
									<button type="button" class="btn btn-primary btn-circle" title="Report Pembayaran" onclick="window.location='<?php echo base_url().'report/Pembayaran/'.$id ?>'"><i class="fa fa-angle-right"></i></button>
								<?php }
							} ?>
							</div>
						</div>
		          		<!-- /.box-footer -->
					</form>
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