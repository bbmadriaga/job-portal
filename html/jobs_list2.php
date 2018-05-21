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
					<input style="width:200px" name="position" id="col2_filter" class="form-control form-control-sm" type="text" placeholder="Position" <?php echo (isset($_POST['position'])?" value='".$_POST['position']."'":""); ?>>
				</div>
			</div>
			<div class="form-group">
				<label for="agency">Agency Name :&nbsp;</label>
				<div class="col-2">
					<select name="agency" id="col0_filter" class="form-control form-control-sm" style="width:200px">
						<?php if (isset($_POST['agency'])){ 
							$selectedAgency = $_POST['agency'];
						?>
							<option value="<?php echo $selectedAgency; ?>" selected><?php echo utf8_encode($selectedAgency); ?></option>
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
					<select name="region" id="col1_filter" class="form-control form-control-sm">
						<?php if (isset($_POST['region'])){ 
							$selectedRegion = $_POST['region'];
						?>
							<option value="<?php echo $selectedRegion; ?>" selected><?php echo $selectedRegion; ?></option>
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
		<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="jobs">
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
		</table>
	</div>
</div>
<div class="modal fade" id="jobsModal" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div id="printSection" class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
</div>
