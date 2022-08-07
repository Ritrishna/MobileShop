<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	
	<title><?php echo TITLE; ?></title>
	<style type="text/css">
	a{
		color: #932929;
	}
	a:hover{
		color:black;
	}
	.active{
		color: white;
		background-color: #dc3545;
	}
	</style>
</head>
<body onkeydown="pressFunc(event.keyCode);">
	<!-- Top Navbar -->
	<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0"><h3>RD Store</h3></a></nav>

	<!--Start Container  -->
	<div class="container-fluid" style="margin-top: 40px;">
		<div class="row"> <!-- Start row -->
			<!-- Start Side bar 1st column -->
			<nav class="col-sm-2 bg-light sidebar py-5"> 
				<div class="sidebar-sticky">
					<ul class="nav flex-column d-print-none">

						<li class="nav-item"><a href="groupMaster_display.php" class="nav-link <?php if(PAGE=="GroupMaster"){echo 'active';} ?>"><i class="fas fa-tachometer-alt"></i>Group Master</a></li>

						<li class="nav-item"><a href="subgroup_display.php" class="nav-link <?php if(PAGE=="SubGroupMaster"){echo 'active';} ?>"><i class="fab fa-accessible-icon"></i>Sub-group Master</a></li>

						<li class="nav-item"><a href="companyMaster_display.php" class="nav-link <?php if(PAGE=="companyMaster"){echo 'active';} ?>"><i class="fas fa-align-center"></i>Company Master</a></li>

						<li class="nav-item"><a href="ramMaster_display.php" class="nav-link <?php if(PAGE=="RamDisplay"){echo 'active';} ?>"><i class="fas fa-database"></i>Ram Master</a></li>

						<li class="nav-item"><a href="storageMaster_display.php" class="nav-link <?php if(PAGE=="StorageMaster"){echo 'active';} ?>"><i class="fas fa-server"></i>Storage Master</a></li>

						<li class="nav-item"><a href="itemMaster_display.php" class="nav-link <?php if(PAGE=="ItemMaster"){echo 'active';} ?>"><i class="fas fa-users"></i>Item Master</a></li>
						<li class="nav-item"><a href="sellproduct_report.php" class="nav-link <?php if(PAGE=="sellproduct"){echo 'active';} ?>"><i class="fas fa-handshake"></i>Sell Voucher</a></li>
						<li class="nav-item"><a href="search_mobile.php" class="nav-link <?php if(PAGE=="searchproduct"){echo 'active';} ?>"><i class="fas fa-handshake"></i>Search</a></li>
						<li class="nav-item"><a href="payment_details.php" class="nav-link <?php if(PAGE=="payment_details"){echo 'active';} ?>"><i class="fas fa-handshake"></i>Sell Report</a></li>
					</ul>
				</div>
			</nav> <!-- End Side bar  1st column-->

