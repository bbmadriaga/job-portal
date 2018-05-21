<div id="<?php echo $var->id ?>" class="modal fade" bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div id="printSection" class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle"><?php echo $var->agency_name ?> | <?php echo $var->region_name ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="job-tbl">
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Place of Assignment :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->place_of_assignment) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Position Title :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->position_title) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Plantilla Item No. :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->plantilla_item_no) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Salary/Job/Pay Grade :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->salary_grade) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Annual Salary :</b></label>
						</div>
						<div class="col-8">
							<div class="" id="">Php <?php echo number_format($var->annual_salary,2) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Eligibility :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->eligibility) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Education :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->education) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Training :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->training) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Work Experience :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->experience) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Competency :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->competency) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Instruction/Remarks :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo utf8_encode($var->instructions) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Posting Date :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo date("F d, Y", strtotime($var->posting_date)) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<label for="" ><b>Closing Date :</b></label>
						</div>
						<div class="col-8">
							<div class="" id=""><?php echo date("F d, Y", strtotime($var->closing_date)) ?></div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onClick="window.print()">Print this page</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>