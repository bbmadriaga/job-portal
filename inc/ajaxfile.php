<?php
error_reporting(0);
require_once(dirname(dirname(__FILE__)) . '/conf/helper.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

$userid = $_POST['userid'];

$sql = "select * from jtbl_jobs where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<div class='modal-header'>";
while( $row = mysqli_fetch_array($result) ){
 $id = $row['id'];
 $agency_name = $row['agency_name'];
 $region_name = $row['region_name'];
 $place_of_assignment = $row['place_of_assignment'];
 $position_title = $row['position_title'];
 $plantilla_item_no = $row['plantilla_item_no'];
 $salary_grade = $row['salary_grade'];
 $annual_salary = $row['annual_salary'];
 $eligibility = $row['eligibility'];
 $education = $row['education'];
 $training = $row['training'];
 $experience = $row['experience'];
 $competency = $row['competency'];
 $instructions = $row['instructions'];
 $posting_date = $row['posting_date'];
 $closing_date = $row['closing_date'];

 $response .="<h4 class='modal-title' id='ModalLongTitle'>".$agency_name." | ".$region_name."</h4>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<div id='job-tbl'>
					<div class='row'>
						<div class='col-4'>
							<label><b>Place of Assignment :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($place_of_assignment)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Position Title :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($position_title)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Plantilla Item No. :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($plantilla_item_no)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Salary/Job/Pay Grade :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($salary_grade)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Annual Salary :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>Php ".number_format($annual_salary,2)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Eligibility :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($eligibility)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Education :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($education)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Training :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($training)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Work Experience :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($experience)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Competency :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($competency)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Instruction/Remarks :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".utf8_encode($instructions)."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Posting Date :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".date("F d, Y", strtotime($posting_date))."</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-4'>
							<label><b>Closing Date :</b></label>
						</div>
						<div class='col-8'>
							<div class='' id=''>".date("F d, Y", strtotime($closing_date))."</div>
						</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-primary' onClick='window.print()'>Print this page</button>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>";

 


}


echo $response;
exit;