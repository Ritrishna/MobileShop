<?php 
	include("dbConnection.php");
	define('TITLE', "ItemMaster");
	define('PAGE', "ItemMaster");
	include("includes/header.php");
?>
	<?php
		if(isset($_GET['del'])){
			$id = $_GET['del'];
			$sql = "DELETE FROM item_master_tb WHERE id='$id'";
			$result = $conn->query($sql);
		}
	?>
	<!-- Start 2nd column -->
	<div class="col-sm-9 mt-5">
	<?php 
	// $sql = "SELECT * FROM item_master_tb
	// 		LEFT JOIN group_master_tb ON item_master_tb.group_name = group_master_tb.id
	// 		LEFT JOIN subgroup_master_tb ON item_master_tb.sub_group = subgroup_master_tb.id
	// 		LEFT JOIN company_master_tb ON item_master_tb.company_name = company_master_tb.id
	// 		LEFT JOIN ram_master ON item_master_tb.ram = ram_master.id
	// 		LEFT JOIN storage_master_tb ON item_master_tb.storage = storage_master_tb.id";

	$sql ="SELECT * FROM item_master_tb ";
	$result = $conn->query($sql);
	if($result->num_rows>0){?>
		<table class="table table-bordered table-hover">
			<thead class="bg-dark text-white text-center">
				<tr>
					<th>Sl No.</th>
					<th>Group Name</th>
					<th>Sub Group</th>
					<th>Company Name</th>
					<th>IMEI No</th>
					<th>Model No</th>
					<th>Ram</th>
					<th>Storage</th>
					<th>Color</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			
			<tbody>
		<?php 
			$i = 1;
			while($row = $result->fetch_assoc()){
				$group = "select name from group_master_tb where id = '{$row["group_name"]}'";
				$result1 = $conn->query($group);
				$r_group = $result1->fetch_assoc();

				$sub_group = "select name from subgroup_master_tb where id = '$row[sub_group]'";
				$result2 = $conn->query($sub_group);
				$r_subgroup = $result2->fetch_assoc();

				$company_name = "select name from company_master_tb where id = '$row[company_name]'";
				$result3 = $conn->query($company_name);
				$r_company = $result3->fetch_assoc();

				$ram = "select ram from ram_master where id = '$row[ram]'";
				$result4 = $conn->query($ram);
				$r_ram = $result4->fetch_assoc();

				$storage = "select storage from storage_master_tb where id = '$row[storage]'";
				$result5 = $conn->query($storage);
				$r_storage = $result5->fetch_assoc();


			?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $r_group['name'];?></td>
					<td><?php echo $r_subgroup['name'];?></td>
					<td><?php echo $r_company['name'];?></td>
					<td><?php echo $row['imei_no'];?></td>
					<td><?php echo $row['model_no'];?></td>
					<td><?php echo $r_ram['ram'];?></td>
					<td><?php echo $r_storage['storage'];?></td>
					<td><?php echo $row['color'];?></td>
					<td><?php echo $row['price']."/-"; ?></td>
					<td>
						<a href="itemMaster.php?edit=<?php echo $row['item_id']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
						<a href="?del=<?php echo $row['item_id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
						<a href="sellproduct.php?sell=<?php echo $row['item_id']; ?>" class="btn btn-info"><i class="fa fa-shopping-cart"></i></a>
					</td>
				</tr>
				<?php
				$i++;
				 } 

				?>
			</tbody>
		
		</table>
	<?php } ?>
	</div>

	<div class="float-right">
    	<a href="itemMaster.php" class="btn btn-danger mt-5"><i class="fas fa-plus fa-1x"></i></a>
	</div>


<?php include("includes/footer.php"); ?>