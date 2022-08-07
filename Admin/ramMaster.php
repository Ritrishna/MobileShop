<?php 
	include("dbConnection.php");
	define(TITLE, "Ram Display");
	define("PAGE","RamDisplay");
	error_reporting(0);
	include("includes/header.php");
?>
	<?php 
		if(isset($_GET['edit'])){
			$id = $_GET['edit'];
			$sql = "SELECT * FROM ram_master WHERE id='$id'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}


		if(isset($_POST['submit'])){
			$ram = $_POST['ram'];
			if($ram!=""){
				if($id==""){
					$sql = "INSERT INTO ram_master(ram)VALUES('$ram')";
					$result = $conn->query($sql);
					if($result){
						header('location:ramMaster_display.php');
					}else{
						$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.</div>';
					}
				}else{
					$sql = "UPDATE ram_master SET ram='$ram' WHERE id='$id'";
					$result = $conn->query($sql);
					if($result){
						header('location:ramMaster_display.php');
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
				<label for="ram">Ram</label>
				<input type="text" name="ram" id="ram" class="form-control" value="<?php echo $row['ram']; ?>">
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
				<span class="font-weight-bold text-primary">Or Press ESC</span>
				<a href="ramMaster_display.php" class="btn btn-secondary">Back</a>
			</div>
			<?php if(isset($errmsg)){echo $errmsg;} ?>
		</form>
	</div>



<?php include("includes/footer.php"); ?>
<script>
	function pressFunc(key){
			if(key == 27){
				$("#submit").click();
			}

		}
</script>