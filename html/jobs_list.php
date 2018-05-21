<div class="row">
	<div class="col-12 col-md-12 ml-3 mr-3">	
		<label><h5>Filter by:</h5></label>
	</div>
</div>

<div class="row">
	<div class="col-12 col-md-12 ml-3 mr-3">
		<form method="POST" class="form-inline" action="index.php">
			<div class="form-group">
				<label for="position">Position :&nbsp;</label>
				<div class="col-2">
					<input style="width:200px" name="position" class="form-control form-control-sm" type="text" placeholder="Position" <?php echo (isset($_POST['position'])?" value='".$_POST['position']."'":""); ?>>
				</div>
			</div>
			<div class="form-group">
				<label for="agency">Agency Name :&nbsp;</label>
				<div class="col-2">
					<select name="agency" class="form-control form-control-sm" style="width:200px">
						<?php if (isset($_POST['agency'])){ 
							$selectedAgency = $_POST['agency'];
						?>
							<option selected ><?php echo $selectedAgency; ?></option>
						<?php } else { ?>
							<option value="" selected disabled>- Please select -</option>
						<?php } 
							foreach ($agency as $var){
								echo "<option value='$var->agency_name'>".utf8_encode($var->agency_name)."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="region">Region :&nbsp;</label>
				<div class="col-2">
					<select name="region" class="form-control form-control-sm">
						<?php if (isset($_POST['region'])){ 
							$selectedRegion = $_POST['region'];
						?>
							<option selected ><?php echo $selectedRegion; ?></option>
						<?php } else { ?>
							<option value="" selected disabled>- Please select -</option>
						<?php }
							foreach ($region as $var){
								echo "<option value='$var->region_name'>$var->region_name</option>";
							}
						?>
					</select>
				</div>
			</div>
			<button type="submit" name="sort_list" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
			<div class="form-group">
				<div class="col-5">
					<a class="btn btn-warning" href="index.php"><i class="fa fa-refresh" aria-hidden="true"></i> Clear Filter</a>
				</div>
			</div>
		</form>
	</div>
</div>
<hr>
<div class="row justify-content-md-center">
	<div class="col-md-10">
		<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="jobs">
			<thead>
				<tr>
					<th>Agency</th>
					<th>Region</th>
					<th>Position Title</th>
					<th>Plantilla Item No.</th>
					<th>Posting Date</th>
					<th>Closing Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<div class="se-pre-con"></div>	 
					<?php if (isset($_POST['sort_list'])) {
						$agency = $_POST['agency'];
						$region = $_POST['region'];
						$position = $_POST['position'];
						$jobs = $jdb->filterJobs($position,$agency,$region);
						foreach ($jobs as $var){
					?>
						<tr>
							<td width="200"><?php echo strtoupper(utf8_encode($var->agency_name)); ?></td>
							<td width="150"><?php echo $var->region_name; ?></td>
							<td width="250"><?php echo $var->position_title; ?> </td> 
							<td width="150"><?php echo $var->plantilla_item_no; ?></td>
							<td width="110"><?php echo date("m-d-Y", strtotime($var->posting_date)) ?></td>
							<td width="110"><?php echo date("m-d-Y", strtotime($var->closing_date)) ?></td>
							<td width="100">
								<a type="button" id="<?php echo $var->id ?>"  href="view_details.php<?php echo '?id='.$var->id; ?>" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $var->id ?>">view details</a>
								<!-- <a  rel="tooltip"  title="View Data" id="<?php echo $var->id; ?>"  href="view_details.php<?php echo '?id='.$var->id; ?>" class="btn btn-info"><i class="fa fa-arrow-right"></i></a> -->
							</td>
						</tr>

						<!-- Modal -->
						<?php include('modal.php');?>
						<?php } ?>
					<?php } else {
						foreach ($jobs as $var){ ?>
						<tr>
							<td width="200"><?php echo strtoupper(utf8_encode($var->agency_name)); ?></td>
							<td width="150"><?php echo $var->region_name; ?></td>
							<td width="250"><?php echo $var->position_title; ?> </td>
							<td width="150"><?php echo $var->plantilla_item_no; ?></td>
							<td width="110"><?php echo date("m-d-Y", strtotime($var->posting_date)) ?></td>
							<td width="110"><?php echo date("m-d-Y", strtotime($var->closing_date)) ?></td>
							<td width="100">
								<a type="button" id="<?php echo $var->id ?>"  href="view_details.php<?php echo '?id='.$var->id; ?>" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $var->id ?>">view details</a>
								<!-- <a  rel="tooltip"  title="View Data" id="<?php echo $var->id; ?>"  href="view_details.php<?php echo '?id='.$var->id; ?>" class="btn btn-info"><i class="fa fa-arrow-right"></i></a> -->
							</td>

						</tr>

						<!-- Modal -->
						<?php include('modal.php');?>
						<?php } ?>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>
