<?php 
	include("dbConnection.php");
	define(TITLE, "SubGroupMaster");
	define("PAGE","SubGroupMaster");
	error_reporting(0);
	include("includes/header.php");
?>
	<?php 
		if(isset($_GET['edit'])){
			$id = $_GET['edit'];
			$sql = "SELECT * FROM subgroup_master_tb WHERE id='$id'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}


		if(isset($_POST['submit'])){
			$subgroupname = $_POST['subgroupname'];
			if($subgroupname!=""){
				if($id==""){
					$sql = "INSERT INTO subgroup_master_tb(name)VALUES('$subgroupname')";
					$result = $conn->query($sql);
					if($result){
						header('location:subgroup_display.php');
					}else{
						$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.</div>';
					}
				}else{
					$sql = "UPDATE subgroup_master_tb SET name='$subgroupname' WHERE id='$id'";
					$result = $conn->query($sql);
					if($result){
						header('location:subgroup_display.php');
					}else{
						$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.</div>';
					}
				}
				
			}else{
				$errmsg = '<div class="alert alert-danger" role="alert">Please Fill All Fields.</div>';
			}
		}

	?>
	<!-- Start 2nd column -->
	<div class="col-sm-6 mt-5">
		<form action="" method="post">
			<div class="form-group">
				<label for="subgroupname">Sub Group Name</label>
				<input type="text" name="subgroupname" id="subgroupname" class="form-control" value="<?php echo $row['name']; ?>">
			</div>
			<div class="form-group">
				<?php 
				if($id == ""){
					$btn = 'primary';
				}else{
					$btn = 'warning';
				}
				?>
				<input type="submit" name="submit" id="submit" class="btn btn-<?php echo $btn; ?>" value="<?php echo $id==""?'Submit':'Update'; ?>">
				<span class="font-weight-bold text-primary">Or Press f4</span>
				<a href="subgroup_display.php" class="btn btn-secondary">Back</a>
			</div>
			<?php if(isset($errmsg)){echo $errmsg;} ?>
		</form>
	</div>



<?php include("includes/footer.php"); ?>
<script>
	function pressFunc(key){
			if(key == 115){
				$("#submit").click();
			}

		}
</script>