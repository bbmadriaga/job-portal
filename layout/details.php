<div class="row">
	<div class="col-12 col-md-12 mb-4 page-header">
		<div class="page-title pb-3 pt-3 ml-3 mr-3">
		<?php foreach ($jobs as $var){?>
			<h3><?php echo $var->agency_name ?> | <?php echo $var->region_name ?></h3>
		</div>
	</div>
</div>

<div id="job-tbl">
	<div class="row">
		
		<div class="col-2">
			<label for="" ><b>Place of Assignment :</b></label>
		</div>
		<div class="col-4">
			<div class="" id=""><?php echo $var->place_of_assignment ?></div>
		</div>
	</div>
	<div class="row">
		
		<div class="col-2">
			<label for="" ><b>Position Title :</b></label>
		</div>
		<div class="col-4">
			<div class="" id=""><?php echo $var->position_title ?></div>
		</div>
	</div>
	<div class="row">
		
		<div class="col-2">
			<label for="" ><b>Plantilla Item No. :</b></label>
		</div>
		<div class="col-4">
			<div class="" id=""><?php echo $var->plantilla_item_no ?></div>
		</div>
	</div>
</div>
<?php } ?>
