<?php 
	define('TITLE', "ItemMaster");
	define('PAGE', "ItemMaster");
	error_reporting(0);
	include("includes/header.php");
	include("dbConnection.php");
?>
	<?php
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$sql = "SELECT * FROM item_master_tb WHERE item_id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$imei = $row['imei_no'];
		$model_no = $row['model_no'];
		$color = $row['color'];
		$price = $row['price'];

	}

	if(isset($_POST['submit'])){
		$groupname = $_POST['groupname'];
		$subgroup = $_POST['subgroup'];
		$companyname = $_POST['companyname'];
		$imeino = $_POST['imeino'];
		$modelno = $_POST['modelno'];
		$ram_gb = $_POST['ram_gb'];
		$storage = $_POST['storage'];
		$color = $_POST['color'];
		$price = $_POST['price'];
		
		if($groupname!="" && $subgroup!="" && $companyname!="" && $imeino!="" && $modelno!="" && $ram_gb!="" && $storage!="" && $color!="" && $price!=""){

			if($id==""){
				$sql = "INSERT INTO `item_master_tb`(`group_name`, `sub_group`, `company_name`, `imei_no`, `model_no`, `ram`, `storage`, `color`, `price`) VALUES ('$groupname','$subgroup','$companyname','$imeino','$modelno','$ram_gb','$storage','$color','$price')";
				$result = $conn->query($sql);
				if($result){
					header('location:itemMaster_display.php');
				}else{
				$errmsg = '<div class="alert alert-danger" role="alert">Please Fill All Fields.</div>';
				}

			}else{
				$sql = "UPDATE `item_master_tb` SET `group_name`='$groupname',`sub_group`='$subgroup',`company_name`='$companyname',`imei_no`='$imeino',`model_no`='$modelno',`ram`='$ram_gb',`storage`='$storage',`color`='$color',`price`='$price' WHERE item_id='$id'";
				$result = $conn->query($sql);
				if($result){
					header('location:itemMaster_display.php');
				}else{
					$errmsg = '<div class="alert alert-danger" role="alert">Please Fill All Fields.</div>';
				}


			}
		}else{
			$errmsg = '<div class="alert alert-danger" role="alert">Please Fill All Fields.</div>';
		}


		
	}
	?>

	<div class="col-sm-4 ml-5 mt-5">
		<form action="" method="post">
			<div class="form-group">
				<label>Group Name</label>
				<select  name="groupname" class="form-control">
					<?php
					$sql = "SELECT * FROM group_master_tb";
					$result = $conn->query($sql);
					while($row1 = $result->fetch_assoc()){
						$sel = $row['group_name'] == $row1['id']?"selected":"";
					?>
					<option value="<?php echo $row1['id'];?>" <?php echo $sel; ?>><?php echo $row1['name'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Sub Group</label>
				<select name="subgroup" class="form-control">
					<?php
					$sql = "SELECT * FROM subgroup_master_tb";
					$result = $conn->query($sql);
					while($row1 = $result->fetch_assoc()){
						$sel = $row['sub_group'] == $row1['id']?"selected":"";
					?>
					<option value="<?php echo $row1['id'];?>" <?php echo $sel; ?>><?php echo $row1['name'];?></option>
					<?php } ?>				
				</select>
			</div>
			<div class="form-group">
				<label>Company Name</label>
				<select name="companyname" class="form-control">
					<?php
					$sql = "SELECT * FROM company_master_tb";
					$result = $conn->query($sql);
					while($row1 = $result->fetch_assoc()){
						$sel = $row['company_name'] == $row1['id']?"selected":"";
					?>
					<option value="<?php echo $row1['id'];?>" <?php echo $sel; ?>><?php echo $row1['name'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="imeino">IMEI No.</label>
				<input type="text" name="imeino" id="imeino" class="form-control" value="<?php echo $imei; ?>">
			</div>
			<div class="form-group">
				<label for="modelno">Model No</label>
				<input type="text" name="modelno" id="modelno" class="form-control" value="<?php echo $model_no; ?>">
			</div>
			<div class="form-group">
				<label for="ram_gb">Ram</label>
				<select name="ram_gb" class="form-control">
					<?php
					$sql = "SELECT * FROM ram_master";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
					?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['ram'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="storage">Storage</label>
				<select name="storage" class="form-control">
					<?php
					$sql = "SELECT * FROM storage_master_tb";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
					?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['storage'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="color">Color</label>
				<input type="text" name="color" id="color" class="form-control" value="<?php echo $color; ?>">
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>">
			</div>

			<div class="form-group text-right">
				<?php 
				if($id==""){
					$btn = 'primary';
				}else{
					$btn = 'warning';
				}
				?>
				<input type="submit" name="submit" class="btn btn-<?php echo $btn;?>" value="<?php echo $id==""?'Submit':'Update' ?>">
				<a href="itemMaster_display.php" class="btn btn-secondary">Back</a>
			</div>
			<?php if(isset($errmsg)){echo $errmsg;} ?>
		</form>
	</div>



<?php include('includes/footer.php'); ?>