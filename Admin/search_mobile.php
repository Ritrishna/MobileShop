<?php
	define('PAGE','searchproduct');
	define('TITLE','searchproduct');
	include('dbConnection.php');
	include('includes/header.php');
?>
<div class="col-sm-6 mt-4">
	<form method="post">
		<div class="form-row">
			<div class="col-md-3 form-group">
				<select name="choose" id="choose">
					<option>Select</option>
					<option value="company_name">Company Name</option>
					<option value="ram">Ram</option>
					<option value="storage">Storage</option>
				</select>
			</div>
			
			<div class="col-md-8 form-group" id="searchBar">
				<input type="text" name="search_txt" id="search_txt" >	
			</div>
			<input type="submit" name="search_btn" id="search_btn" value="Search" class="btn btn-danger">
		</div>
	</form>
	<?php


	if(isset($_POST['search_btn'])){
		if(isset($_POST['choose'])){
			$val = $_POST['search_txt'];

			if($_POST['choose'] == 'company_name'){
				$sql = "SELECT i.* FROM item_master_tb i, company_master_tb c WHERE i.company_name=c.id AND c.name LIKE '%$val%'";
			}else if($_POST['choose'] == 'ram'){
				$sql = "SELECT i.* FROM item_master_tb i, ram_master r WHERE i.ram=r.id AND r.ram LIKE '%$val%'";
			}else if($_POST['choose'] == 'storage'){
				$sql = "SELECT i.* FROM item_master_tb i, storage_master_tb s WHERE i.storage=s.id AND s.storage LIKE '%$val%'";
			}
			

			$result = $conn->query($sql);
			if($result->num_rows>0){?>
			<table class="table table-striped" id="mytable">
				<thead>
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
					</tr>
				<?php $i++; } ?>
				</tbody>
			</table>
			<?php } 
		} else{
				echo 'No Records Found';
			}
			?>
		<?php }?>
</div>


<?php include('includes/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#searchBar").hide();
		//$("#mytable").hide();
		$("#choose").change(function(){
			$("#searchBar").show();
		});
	});
</script>