
<?php

	include ('php/database.php');
	session_start();

	if(!isset($_SESSION["username"])) {
		header("Location: home.php");
		exit;
	}

	//  count the pending reservations
	$sql_pending = "SELECT COUNT(*) AS count FROM pending_tbl";
	$result_pending = $con->query($sql_pending);
	$pending_count = $result_pending->fetch_assoc()["count"];

	//  count the approved reservations
	$sql_approved = "SELECT COUNT(*) AS count FROM approved_tbl";
	$result_approved = $con->query($sql_approved);
	$approved_count = $result_approved->fetch_assoc()["count"];

	// count the rejected reservations
	$sql_rejected = "SELECT COUNT(*) AS count FROM rejected_tbl";
	$result_rejected = $con->query($sql_rejected);
	$rejected_count = $result_rejected->fetch_assoc()["count"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/admindashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="sidebar col-md-2">
				<div class="d-flex justify-content-center">
					<img src="img/new sac logo.png" class="logo">
				</div>
				<hr style="border-bottom: 2px solid gold;">
				<ul class="menu">
					<li class="nav-item">
						<a href="javascript:void(0);" onclick="showHome()" style="font-size: 24px;">
							<i class="fa fa-house" style="font-size: 24px;"></i>
							<span>Home</span>
						</a>
					</li>
					<li class="my-2 nav-item dropdown">
							<button class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px; color: gold;">
								<i class="fa-solid fa-layer-group me-3"></i> Overview
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: gold;">
								<li>
									<a class="dropdown-item" href="javascript:void(0);" onclick="showOverall()" style="font-size: 20px; color: maroon; padding: 5px .50rem;"><i class="fa-solid fa-clipboard" style="font-size: 24px;"></i>Overall</a>
								</li>
								<li>
									<a class="dropdown-item" href="javascript:void(0);" onclick="showPending()" style="font-size: 20px; color: maroon; padding: 5px .50rem;"><i class="fa-solid fa-hand" style="font-size: 24px;"></i>Pending</a>
								</li>
								<li>
									<a class="dropdown-item" href="javascript:void(0);" onclick="showApproved()" style="font-size: 20px; color: maroon;  padding: 5px .50rem;"><i class="fa-solid fa-thumbs-up" style="font-size: 24px;"></i>Approved</a>
								</li>
								<li>
									<a class="dropdown-item" href="javascript:void(0);" onclick="showRejected()" style="font-size: 20px; color: maroon;  padding: 5px .50rem;"><i class="fa-solid fa-thumbs-down" style="font-size: 24px;"></i>Rejected</a>
								</li>
							</ul>
						</li>
					<li class="nav-item">
						<a href="" style="font-size: 24px;">
							<i class="fa fa-chart-simple" style="font-size: 24px;"></i>
							<span>Statistics</span>
						</a>
					</li>
					<li class="nav-item my-2 dropdown">
						<button class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px; color: gold;">
							<i class="fa-solid fa-user me-3"></i> Account
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: gold;">
							<li class="nav-item">
								<a class="dropdown-item" href="#" style="font-size: 20px; color: maroon;  padding: 5px .50rem;"><i class="fa-solid fa-gear" style="font-size: 24px;"></i>Settings</a>
							</li>
							<li class="nav-item">
								<a class="dropdown-item" href="home.php" onclick="return confirm('Are you sure you want to logout?');" style="font-size: 20px; color: maroon;  padding: 5px .50rem;"><i class="fa-solid fa-right-from-bracket ms-1" style="font-size: 24px;"></i>Logout</a>
							</li>
						</ul>
					</li>
				</ul>	
			</div>

			<div class="main--content col-md-10">
				<div class="header--wrapper py-3">
					<div class="header--title">
						<h2 style="color: gold;">Admin Dashboard</h2>
					</div>
					<div class="user--info">
						<div class="search--box">
							<i class="fa fa-magnifying-glass"></i>
							<input type="search" placeholder="Search">
						</div>
					</div>
				</div>
				<div class="home" id="home">
				<div class="card--container my-4 content" id="content">
					<div class="row col-md-12">
						<h2 class="main--title mt-3"><strong>Reservation Status</strong></h2>
						<div class="card--wrapper my-5">
							<div class="overall-reservation-card first-col">
								<div class="card--header">
									<div class="reservation">
										<span class="title">Overall Reservation</span>
										<span class="no-of-reservation"><?php echo $pending_count + $approved_count + $rejected_count; ?></span>
									</div>
									<i class="fa fa-clipboard icon icon1"></i>
								</div>
							</div>
							<div class="overall-reservation-card second-col">
								<div class="card--header">
									<div class="reservation">
										<span class="title">Pending</span>
										<span class="no-of-reservation"><?php echo $pending_count; ?></span>
									</div>
									<i class="fa fa-hand icon icon2"></i>
								</div>
							</div>
							<div class="overall-reservation-card third-col">
								<div class="card--header">
									<div class="reservation">
										<span class="title">Approved</span>
										<span class="no-of-reservation"><?php echo $approved_count; ?></span>
									</div>
									<i class="fa fa-thumbs-up icon icon3"></i>
								</div>
							</div>
							<div class="overall-reservation-card fourth-col">
								<div class="card--header">
									<div class="reservation">
										<span class="title">Rejected</span>
										<span class="no-of-reservation"><?php echo $rejected_count; ?></span>
									</div>
									<i class="fa fa-thumbs-down icon icon4"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tabular-wrapper my-4">
					<h4 class="main--title"><strong>Schedule of Events</strong></h4>
					<div class="table-container table-responsive">
					<table class="admin-data-table" id="admin-table">
							<thead>
								<td class="table-head">ID</td>
                                <td class="table-head">First Name</td>
                                <td class="table-head">Last Name</td>
								<td class="table-head">Email</td>
                                <td class="table-head">Department</td>
                                <td class="table-head">Venue</td>
                                <td class="table-head">Event</td>
                                <td class="table-head">Time Start</td>
                                <td class="table-head">Time End</td>
                                <td class="table-head">Date</td>
								<td class="table-head">Payment</td>
								<td class="table-head">Status</td>
                            </thead>
                            <tbody>
							<?php
								include ('php/database.php');

								$query = "SELECT ars.AReservationID, u.FirstName, u.LastName, u.Email, u.Department, a.Venue, a.Activity, a.TimeStart, a.TimeEnd, a.Date, u.Payment, ars.Status
										FROM approved_tbl ars 
										JOIN user_tbl u ON u.UserID = ars.UserID 
										JOIN activity_tbl a ON a.ActivityID = ars.ActivityID";
								$query_run = mysqli_query($con, $query);
								if(mysqli_num_rows($query_run) > 0) 
								{
									foreach($query_run as $row)
									{
									?>
									<tr>
										<td><?=$row['AReservationID']; ?></td>
										<td><?=$row['FirstName']; ?></td>
										<td><?=$row['LastName']; ?></td>
										<td><?=$row['Email']; ?></td>
										<td><?=$row['Department']; ?></td>
										<td><?=$row['Venue']; ?></td>
										<td><?=$row['Activity']; ?></td>
										<td><?=date('h:i A', strtotime($row['TimeStart'])); ?></td>
										<td><?=date('h:i A', strtotime($row['TimeEnd'])); ?></td>
										<td><?=$row['Date']; ?></td>
										<td><?=$row['Payment']; ?></td>
										<td><?=$row['Status']; ?></td>
									</tr>
									<?php
									}
								}
								else {
									// echo "No Record Found";
									?>
										<tr>
											<td colspan="">No Record Found</td>
										</tr>
									<?php
								}
							?>
                            </tbody>   
						</table>
					</div>
				</div>
				</div>
				<div class="overall-table" id="overall-table" style="display: none;">
				<div class="tabular-wrapper my-4">
					<h4 class="main--title"><strong>Overall Reservation</strong></h4>
					<div class="table-container table-responsive">
					<table class="admin-data-table" id="admin-table">
							<thead>
								<td class="table-head">ID</td>
								<td class="table-head">First Name</td>
								<td class="table-head">Last Name</td>
								<td class="table-head">Email</td>
								<td class="table-head">Department</td>
								<td class="table-head">Venue</td>
								<td class="table-head">Event</td>
								<td class="table-head">Time Start</td>
								<td class="table-head">Time End</td>
								<td class="table-head">Date</td>
								<td class="table-head">Payment</td>
								<td class="table-head">Status</td>
							</thead>
							<tbody>
							<?php
								include ('php/database.php');

								// Define an array of table names, statuses, and ID column names
								$tables = [
									'approved_tbl' => ['status' => 'Approved', 'id_column' => 'AReservationID'],
									'rejected_tbl' => ['status' => 'Rejected', 'id_column' => 'RReservationID'],
									'pending_tbl' => ['status' => 'Pending', 'id_column' => 'PReservationID']
								];

								
								foreach ($tables as $table => $table_info) {
									
									// Fetch data from the table
									$query = "SELECT * FROM $table JOIN user_tbl u ON u.UserID = {$table}.UserID JOIN activity_tbl a ON a.ActivityID = {$table}.ActivityID";
									$query_run = mysqli_query($con, $query);
									while($row = mysqli_fetch_assoc($query_run)) {
										echo "<tr>";
										echo "<td>{$row[$table_info['id_column']]}</td>";
										echo "<td>{$row['FirstName']}</td>";
										echo "<td>{$row['LastName']}</td>";
										echo "<td>{$row['Email']}</td>";
										echo "<td>{$row['Department']}</td>";
										echo "<td>{$row['Venue']}</td>";
										echo "<td>{$row['Activity']}</td>";
										echo "<td>" . date('h:i A', strtotime($row['TimeStart'])) . "</td>";
										echo "<td>" . date('h:i A', strtotime($row['TimeEnd'])) . "</td>";
										echo "<td>{$row['Date']}</td>";
										echo "<td>{$row['Payment']}</td>";
										echo "<td>{$table_info['status']}</td>";
										echo "</tr>";
									}
								}
							?>
							</tbody>   
						</table>
					</div>
				</div>
				</div>
				
				<div class="pending-table" id="pending-table" style="display: none;">
				<div class="tabular-wrapper my-4">
					<h4 class="main--title"><strong>Pending Reservation</strong></h4>
					<div class="table-container table-responsive">
						<table class="admin-data-table" id="admin-table">
							<thead>
                                <td class="table-head">ID</td>
                                <td class="table-head">First Name</td>
                                <td class="table-head">Last Name</td>
								<td class="table-head">Email</td>
                                <td class="table-head">Department</td>
                                <td class="table-head">Venue</td>
                                <td class="table-head">Event</td>
                                <td class="table-head">Time Start</td>
                                <td class="table-head">Time End</td>
                                <td class="table-head">Date</td>
								<td class="table-head">Payment</td>
								<td class="table-head">Status</td>
								<td class="table-head">Action</td>
                            </thead>
                            <tbody>
							<?php
								include ('php/database.php');

								$query = "SELECT prs.PReservationID, u.FirstName, u.LastName, u.Email, u.Department, a.Venue, a.Activity, a.TimeStart, a.TimeEnd, a.Date, u.Payment, prs.Status
										FROM pending_tbl prs 
										JOIN user_tbl u ON u.UserID = prs.UserID 
										JOIN activity_tbl a ON a.ActivityID = prs.ActivityID";
								$query_run = mysqli_query($con, $query);
								if(mysqli_num_rows($query_run) > 0) 
								{
									foreach($query_run as $row)
									{
									?>
									<tr>
										<td><?=$row['PReservationID']; ?></td>
										<td><?=$row['FirstName']; ?></td>
										<td><?=$row['LastName']; ?></td>
										<td><?=$row['Email']; ?></td>
										<td><?=$row['Department']; ?></td>
										<td><?=$row['Venue']; ?></td>
										<td><?=$row['Activity']; ?></td>
										<td><?=date('h:i A', strtotime($row['TimeStart'])); ?></td>
										<td><?=date('h:i A', strtotime($row['TimeEnd'])); ?></td>
										<td><?=$row['Date']; ?></td>
										<td><?=$row['Payment']; ?></td>
										<td><?=$row['Status']; ?></td>
										<td>
											<div class="d-flex">
												<a href="php/approve.php?id=<?=$row['PReservationID']; ?>" class="btn btn-success mx-1 approveBtn" role="button" onclick="return confirm('Approve Reservation??');">Approve</a>
												<a href="php/update.php?id=<?=$row['PReservationID']; ?>" class="btn btn-primary mx-1" role="button">Update</a>
												<a href="php/reject.php?id=<?=$row['PReservationID']; ?>" class="btn btn-danger mx-1 approveBtn" role="button" onclick="return confirm('Reject Reservation?');">Reject</a>
											</div>
										</td>
									</tr>
									<?php
									}
								}
								else {
									// echo "No Record Found";
									?>
										<tr>
											<td colspan="">No Record Found</td>
										</tr>
									<?php
								}
								
							?>
                            </tbody>   
						</table>
					</div>
				</div>
				</div>
				<div class="approved-table" id="approved-table" style="display: none;">
				<div class="tabular-wrapper my-4">
					<h4 class="main--title"><strong>Approved Reservation</strong></h4>
					<div class="table-container table-responsive">
						<table class="admin-data-table" id="admin-table">
							<thead>
								<td class="table-head">ID</td>
                                <td class="table-head">First Name</td>
                                <td class="table-head">Last Name</td>
								<td class="table-head">Email</td>
                                <td class="table-head">Department</td>
                                <td class="table-head">Venue</td>
                                <td class="table-head">Event</td>
                                <td class="table-head">Time Start</td>
                                <td class="table-head">Time End</td>
                                <td class="table-head">Date</td>
								<td class="table-head">Payment</td>
								<td class="table-head">Status</td>
                            </thead>
                            <tbody>
							<?php
								include ('php/database.php');

								$query = "SELECT ars.AReservationID, u.FirstName, u.LastName, u.Email, u.Department, a.Venue, a.Activity, a.TimeStart, a.TimeEnd, a.Date, u.Payment, ars.Status
										FROM approved_tbl ars 
										JOIN user_tbl u ON u.UserID = ars.UserID 
										JOIN activity_tbl a ON a.ActivityID = ars.ActivityID";
								$query_run = mysqli_query($con, $query);
								if(mysqli_num_rows($query_run) > 0) 
								{
									foreach($query_run as $row)
									{
									?>
									<tr>
										<td><?=$row['AReservationID']; ?></td>
										<td><?=$row['FirstName']; ?></td>
										<td><?=$row['LastName']; ?></td>
										<td><?=$row['Email']; ?></td>
										<td><?=$row['Department']; ?></td>
										<td><?=$row['Venue']; ?></td>
										<td><?=$row['Activity']; ?></td>
										<td><?=date('h:i A', strtotime($row['TimeStart'])); ?></td>
										<td><?=date('h:i A', strtotime($row['TimeEnd'])); ?></td>
										<td><?=$row['Date']; ?></td>
										<td><?=$row['Payment']; ?></td>
										<td><?=$row['Status']; ?></td>
									</tr>
									<?php
									}
								}
								else {
									// echo "No Record Found";
									?>
										<tr>
											<td colspan="">No Record Found</td>
										</tr>
									<?php
								}
							?>
                            </tbody>   
						</table>
					</div>
				</div>
				</div>
				<div class="rejected-table" id="rejected-table" style="display: none;">
				<div class="tabular-wrapper my-4">
					<h4 class="main--title"><strong>Rejected Reservation</strong></h4>
					<div class="table-container table-responsive">
						<table class="admin-data-table" id="admin-table">
							<thead>
								<td class="table-head">ID</td>
                                <td class="table-head">First Name</td>
                                <td class="table-head">Last Name</td>
								<td class="table-head">Email</td>
                                <td class="table-head">Department</td>
                                <td class="table-head">Venue</td>
                                <td class="table-head">Event</td>
                                <td class="table-head">Time Start</td>
                                <td class="table-head">Time End</td>
                                <td class="table-head">Date</td>
								<td class="table-head">Payment</td>
								<td class="table-head">Status</td>
                            </thead>
                            <tbody>
							<?php
								include ('php/database.php');

								$query = "SELECT rrs.RReservationID, u.FirstName, u.LastName, u.Email, u.Department, a.Venue, a.Activity, a.TimeStart, a.TimeEnd, a.Date, u.Payment, rrs.Status
										FROM rejected_tbl rrs 
										JOIN user_tbl u ON u.UserID = rrs.UserID 
										JOIN activity_tbl a ON a.ActivityID = rrs.ActivityID";
								$query_run = mysqli_query($con, $query);
								if(mysqli_num_rows($query_run) > 0) 
								{
									foreach($query_run as $row)
									{
									?>
									<tr>
										<td><?=$row['RReservationID']; ?></td>
										<td><?=$row['FirstName']; ?></td>
										<td><?=$row['LastName']; ?></td>
										<td><?=$row['Email']; ?></td>
										<td><?=$row['Department']; ?></td>
										<td><?=$row['Venue']; ?></td>
										<td><?=$row['Activity']; ?></td>
										<td><?=date('h:i A', strtotime($row['TimeStart'])); ?></td>
										<td><?=date('h:i A', strtotime($row['TimeEnd'])); ?></td>
										<td><?=$row['Date']; ?></td>
										<td><?=$row['Payment']; ?></td>
										<td><?=$row['Status']; ?></td>
									</tr>
									<?php
									}
								}
								else {
									// echo "No Record Found";
									?>
										<tr>
											<td colspan="">No Record Found</td>
										</tr>
									<?php
								}
								
							?>
                            </tbody>   
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
		<script>
		function showHome() {
			document.getElementById("home").style.display = "block";
			document.getElementById("overall-table").style.display = "none";
			document.getElementById("pending-table").style.display = "none";
			document.getElementById("approved-table").style.display = "none";
			document.getElementById("rejected-table").style.display = "none";
		}
		function showOverall() {
			document.getElementById("home").style.display = "none";
			document.getElementById("overall-table").style.display = "block";
			document.getElementById("pending-table").style.display = "none";
			document.getElementById("approved-table").style.display = "none";
			document.getElementById("rejected-table").style.display = "none";
		}
		function showPending() {
			document.getElementById("home").style.display = "none";
			document.getElementById("overall-table").style.display = "none";
			document.getElementById("pending-table").style.display = "block";
			document.getElementById("approved-table").style.display = "none";
			document.getElementById("rejected-table").style.display = "none";
		}
		function showApproved() {
			document.getElementById("home").style.display = "none";
			document.getElementById("overall-table").style.display = "none";
			document.getElementById("pending-table").style.display = "none";
			document.getElementById("approved-table").style.display = "block";
			document.getElementById("rejected-table").style.display = "none";
		}
		function showRejected() {
			document.getElementById("home").style.display = "none";
			document.getElementById("overall-table").style.display = "none";
			document.getElementById("pending-table").style.display = "none";
			document.getElementById("approved-table").style.display = "none";
			document.getElementById("rejected-table").style.display = "block";
		}
		</script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>