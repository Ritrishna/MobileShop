<?php 
	include("dbConnection.php");
	define(TITLE, "GroupMaster");
	define('PAGE', "GroupMaster");
	error_reporting(0);
	include("includes/header.php");
?>
	<?php 
		if(isset($_GET['edit'])){
			$id = $_GET['edit'];
			$sql = "SELECT * FROM group_master_tb WHERE id='$id'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}


		if(isset($_POST['submit'])){
			$groupname = $_POST['groupname'];
			if($groupname!=""){
				if($id==""){
					$sql = "INSERT INTO group_master_tb(name)VALUES('$groupname')";
					$result = $conn->query($sql);
					if($result){
						header('location:groupmaster_display.php');
					}else{
						$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.</div>';
					}
				}else{
					$sql = "UPDATE group_master_tb SET name='$groupname' WHERE id='$id'";
					$result = $conn->query($sql);
					if($result){
						header('location:groupmaster_display.php');
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
				<label for="groupname">Group Name</label>
				<input type="text" name="groupname" id="groupname" class="form-control" value="<?php echo $row['name']; ?>">
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
				<span class="font-weight-bold text-primary">Or Press F2</span>
				<a href="groupmaster_display.php" class="btn btn-secondary">Back</a>
			</div>
			<?php if(isset($errmsg)){echo $errmsg;} ?>
		</form>
	</div>



<?php include("includes/footer.php"); ?>
<script>
	function pressFunc(key){
			if(key == 113){
				$("#submit").click();
			}

		}
</script>