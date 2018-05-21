<?php
require_once(dirname(__FILE__) . '/conf/helper.php');
error_reporting(0);

$jdb = new JDB();
$agency = $jdb->getAgency();
$region = $jdb->getRegion();
// $jobs = $jdb->getJobs();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<title>Job Opportunities</title>
		<link href="/career/admin/templates/protostar/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.min.css" media="screen">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

		<!-- js -->
		<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		
		<script>
		$(document).ready(function(){
			var table = $('#jobs').DataTable({
				"searching": true,
				"processing": true,
				"serverSide": true,
				"order": [[ 4, "desc" ]],
				"ajax":{
					"url":"inc/server_processing.php"
					<?php if (isset($_POST['region'])){ 
						echo ",";?>
					"data": function ( d ) {
						d.region = <?php echo (isset($_POST['region']) ? '"'. $_POST['region'].'"' : '""');?>;
					}
					<?php } ?>
				}
			});
 
			$('#jobs tbody').on('click', 'button', function() {
				var id = this.id;
				var splitid = id.split('_');
				var userid = splitid[1];

				$.ajax({
					url: 'inc/ajaxfile.php',
					type: 'post',
					data: {userid: userid},
					success: function(response){ 
						$('.modal-content').html(response);
						$('#jobsModal').modal('show'); 
					}
				});
			});

			<?php if (isset($_POST['sort_list'])): ?>
				var agency = $('#col0_filter option:selected').val();
				var region = $('#col1_filter option:selected').val();
				var position = $('#col2_filter').val();
				table.columns(0).search(agency).
					columns(2).search(position).draw();
			<?php endif ?>
		});
		</script>
	</head>

	<body class="site">
		<div class="container-fluid">
			<?php include_once __DIR__ . '/layout/header.php';?>
			<?php include_once __DIR__ . '/layout/breadcrumb.php';?>
			<div class="row">
				<div class="col-12 col-md-12 mb-4 page-header" style="background-color:#0099ff">
					<div class="page-title pb-3 pt-3 ml-3 mr-3">
						<h3>Job Opportunities List</h3>
					</div>
				</div>
			</div>
			<?php include_once __DIR__ . '/layout/advisory.php';?>
			<?php include_once __DIR__ . '/html/jobs_list2.php';?>

		</div>
		<?php include_once __DIR__ . '/layout/standardfooter.php'; ?>
	</body>
</html>
