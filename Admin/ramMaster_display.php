<?php 
	include("dbConnection.php");
	define(TITLE, "RamMaster");
	define("PAGE","RamDisplay");
	include("includes/header.php");
?>
	<?php
		if(isset($_GET['del'])){
			$id = $_GET['del'];
			$sql = "DELETE FROM ram_master WHERE id='$id'";
			$result = $conn->query($sql);
		}
	?>
	<!-- Start 2nd column -->
	<div class="col-sm-6 mt-5">
	<?php 
	$sql = "SELECT * FROM ram_master";
	$result = $conn->query($sql);
	if($result->num_rows>0){?>
		<table class="table table-bordered table-hover">
			<thead class="bg-dark text-white text-center">
				<tr>
					<th>Subgroup Id</th>
					<th>Sub Group Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php 
			$i = 1;
			while($row = $result->fetch_assoc()){ ?>
			<tbody>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row['ram']; ?></td>
					<td class="text-center">
						<a href="ramMaster.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning mr-4"><i class="fas fa-pen"></i></a>
						<a href="?del=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
	<?php } ?>
	</div>

	<div class="float-right">
    	<a href="ramMaster.php" class="btn btn-danger mt-5"><i class="fas fa-plus fa-1x"></i></a>
	</div>



<?php include("includes/footer.php"); ?>