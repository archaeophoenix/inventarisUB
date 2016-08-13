<?php extract($purchase);
$ket = json_decode($ket,true); 
// echo "<pre>";print_r($ket['ts']);die;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>CANVASING SHEET</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
         	<div class="print">
          	<div class="box-header">
          		<div class="col-xs-3"><img src="<?php echo base_url(); ?>images/t_univbakrie.jpg"></div>
          		<div class="col-xs-4"><h3 class="text-center">CANVASSING SHEET</h3></div>
	          	<div class="col-xs-5 table-responsive">
	          		<table class="table table-striped table-hover">
	          			<tr>
	          				<th width="20%">CS No.</th>
	          				<td><?php echo $id; ?></td>
	          			</tr>
	          			<tr>
	          				<th>CS Date</th>
	          				<td><?php echo date("d-m-Y",strtotime($tanggal)); ?></td>
	          			</tr>
	          			<tr>
	          				<th>Reff PR No.</th>
	          				<td><?php echo $ref; ?></td>
	          			</tr>
	          			<tr>
	          				<th>Purchaser</th>
	          				<td><?php echo $purchaser; ?></td>
	          			</tr>
	          		</table>
	          	</div>
          	</div>
          	<form method="post" action="<?php echo base_url().'report/postcan/'.$id ?>">
	         	<!-- /.box-header -->
		            <div class="box-body">
		          		<div class="row">
		          			<div class="col-xs-12">
		          				<div class="row">
		          					<div class="col-xs-12 table-responsive">
										<table class="table table-striped table-hover">
											<tr>
												<th class="text-center" style="vertical-align:middle;" width="2%" rowspan="2">#</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">DESCRIPTION</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">BRAND</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">TYPE</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">QTY</th>
												<th class="text-center" colspan="<?php echo count($vendor); ?>">VENDOR COMPARISON</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">SELECTED VENDOR</th>
												<th class="text-center" style="vertical-align:middle;" rowspan="2">TOTAL</th>
												<th class="text-center" colspan="2">PRICE /UNIT</th>
											</tr>
											<tr>
												<?php foreach ($vendor as $value) { ?>
													<th class="text-center" ><?php echo $value['vendor'] ?></th>
												<?php } ?>
												<th class="text-center" >Budget</th>
												<th class="text-center" >Nego</th>
											</tr>
											<?php $hrg = 0;
											foreach ($item as $key => $value) { ?>
											<tr>
												<td><?php echo ($key+1); ?></td>
												<td><?php echo ucfirst(strtolower($value['spesifikasi'])); ?></td>
												<td><?php echo ucfirst(strtolower($value['merk'])); ?></td>
												<td><?php echo ucfirst(strtolower($value['type'])); ?></td>
												<td class="text-center"><?php echo $value['jumlah']; ?></td>
												<?php foreach ($value['hrg'] as $val) { ?>
													<td  class="text-right"><?php echo $val['harga']; ?></td>
												<?php } ?>
												<td class="text-center"><?php if($edit == 'edit'){ ?>
													<select onchange="vendor(<?php echo $value['id'] ?>);" id="hrg<?php echo $value['id'] ?>" name="id_harga[<?php echo $value['id'] ?>]" class="select2" style="width:150px;">
														<option></option>
														<?php foreach ($value['select'] as $k => $val){ 
															$selected = ($value['id_vendor'] == $val['id_vendor']) ? 'selected="selected"' : '' ; ?>
														<option <?php echo $selected; ?> rel="<?php echo $val['id_vendor'] ?>" value="<?php echo $val['id'] ?>"><?php echo $val['vendor'] ?></option>
														<?php } ?>
													</select>
													<input type="hidden" name="id_vendor[<?php echo $value['id'] ?>]" id="vendor<?php echo $value['id'] ?>" value="<?php echo $value['id_vendor'] ?>" >
												<?php } else {
													echo '<a href="'.base_url().'report/kinerja/'.$value['id_vendor'].'">'.$value['vendor'].'</a>';
												} ?>
												</td>
												<td class="text-center"><?php echo ($value['jumlah'] * $value['harga']);  ?>
												</td>
												<td class="text-center"><?php echo number_format($value['harga'],2,',','.'); $hrg += $value['harga']; ?></td>
												<td class="text-center"><?php if($edit == 'edit'){ ?>
													<input name="nego[<?php echo $value['id']; ?>]" class="form-control" type="number" value="<?php echo $value['nego']; ?>">
													<?php } else { echo $value['nego']; } ?>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<th class="text-right" colspan="5">Total Selected</th>
												<?php foreach ($vendor as $yek => $value) { ?>
													<td class="text-center" ><?php if($edit == 'edit'){ ?>
														<input class="form-control" style="width: 80px;" name="ket[ts][<?php echo $value['id_vendor'] ?>]" type="number" value="<?php echo $ket['ts'][$value['id_vendor']]; ?>">
														<?php } else { echo $ket['ts'][$value['id_vendor']];  } ?>
													</td>
												<?php } ?>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<th class="text-right" colspan="5">Total Quotation</th>
												<?php foreach ($vendor as $value) { ?>
													<td class="text-center" ><?php if($edit == 'edit'){ ?>
														<input class="form-control" style="width: 80px;" name="ket[tq][<?php echo $value['id_vendor'] ?>]" type="number" value="<?php echo $ket['tq'][$value['id_vendor']]; ?>">
														<?php } else { echo $ket['tq'][$value['id_vendor']]; } ?>
													</td>
												<?php } ?>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<th class="text-right" colspan="5">Delivery</th>
												<?php foreach ($vendor as $value) { ?>
													<td class="text-center" ><?php if($edit == 'edit'){ ?>
														<input class="form-control" style="width: 80px;" name="ket[del][<?php echo $value['id_vendor'] ?>]" type="text" value="<?php echo $ket['del'][$value['id_vendor']]; ?>">
														<?php } else { echo $ket['del'][$value['id_vendor']]; } ?>
													</td>
												<?php } ?>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<th class="text-right" colspan="5">Term Of Payment</th>
												<?php foreach ($vendor as $value) { ?>
													<td class="text-center" ><?php if($edit == 'edit'){ ?>
														<input class="form-control" style="width: 80px;" name="ket[top][<?php echo $value['id_vendor'] ?>]" type="text" value="<?php echo $ket['top'][$value['id_vendor']]; ?>">
														<?php } else { echo $ket['top'][$value['id_vendor']]; } ?>
													</td>
												<?php } ?>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</table>
		          					</div>
		          				</div>
		          			</div>
		          			<div class="col-xs-6 table-responsive">
								<table class="table table-striped table-hover">
									<tr>
										<th class="text-center" width="50%">Prepared By</th>
										<th class="text-center">Approved By</th>
									</tr>
									<tr>
										<th class="text-center">Purchasing Officer</th>
										<th class="text-center">Kepala Biro Umum</th>
									</tr>
									<tr>
										<td><br>&nbsp;<br>&nbsp;<br></td>
										<td></td>
									</tr>
									<tr>
										<th class="text-center">
											<?php echo '<b>'.ucfirst(strtolower($purchaser)).'<br>'.$nik_purchaser.'</b>'; ?>
										</th>
										<th class="text-center">
											<?php echo '<b>'.ucfirst(strtolower($kabiro)).'<br>'.$nik_kabiro.'</b>'; ?>
										</th>
									</tr>
								</table>
		          			</div>
		          			<div class="col-xs-6">
								<fieldset>
									<legend>NOTES:</legend>
									<?php if ($edit == 'edit') { ?>
										<textarea class="" name="note" placeholder="Place some text here" style="width: 100%; height: 80px; font-size: 13px; line-height: 15px; border: 0.1px solid #dddddd; padding: 10px;"><?php echo $note; ?></textarea>
									<?php } else { ?>
										<samp><p><?php echo $note; ?></p></samp>
									<?php } ?>
								</fieldset>
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
						<button type="button" onclick="window.location='<?php echo base_url().'report/canvas/'.$id; ?>'" class="btn btn-danger btn-circle batal" title="Batal"><i class="fa fa-close"></i></button>
					<?php } else { ?>
						<?php if($_SESSION['masuk']['izin'] != 2){ ?>
							<button type="button" class="btn btn-info btn-circle" title="Edit" onclick="window.location='<?php echo url.'/edit'; ?>'"><i class="fa fa-pencil-square-o"></i></button>
						<?php }?>
						<button type="button" onclick="window.print();" class="btn btn-success btn-circle" title="Cetak"><i class="fa fa-print"></i></button>
					<?php if($level > 2){ ?>
						<button type="button" class="btn btn-primary btn-circle" title="Report Purchase" onclick="window.location='<?php echo base_url().'report/purchase/'.$id ?>'"><i class="fa fa-angle-right"></i></button>
					<?php }
					} ?>
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