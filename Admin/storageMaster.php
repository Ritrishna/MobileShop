<?php 
	include("dbConnection.php");
	define(TITLE, "StorageMaster");
	define("PAGE","StorageMaster");
	error_reporting(0);
	include("includes/header.php");
?>
	<?php 
		if(isset($_GET['edit'])){
			$id = $_GET['edit'];
			$sql = "SELECT * FROM storage_master_tb WHERE id='$id'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}


		if(isset($_POST['submit'])){
			$storage = $_POST['storage'];
			if($storage!=""){
				if($id==""){
					$sql = "INSERT INTO storage_master_tb(storage)VALUES('$storage')";
					$result = $conn->query($sql);
					if($result){
						header('location:storageMaster_display.php');
					}else{
						$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.</div>';
					}
				}else{
					$sql = "UPDATE storage_master_tb SET storage='$storage' WHERE id='$id'";
					$result = $conn->query($sql);
					if($result){
						header('location:storageMaster_display.php');
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
				<label for="storage">Storage</label>
				<input type="text" name="storage" id="storage" class="form-control" value="<?php echo $row['storage']; ?>">
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
				<span class="font-weight-bold text-primary">Or Press f6</span>
				<a href="storageMaster_display.php" class="btn btn-secondary">Back</a>
			</div>
			<?php if(isset($errmsg)){echo $errmsg;} ?>
		</form>
	</div>



<?php include("includes/footer.php"); ?>
<script>
	function pressFunc(key){
			if(key == 117){
				$("#submit").click();
			}

		}
</script>