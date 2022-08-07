<?php 
	include("dbConnection.php");
	define('TITLE', "Sell Product");
	//define('PAGE', "ItemMaster");
	error_reporting(0);
	include("includes/header.php");
	$date = date('Y-m-d');


	$bill ="SELECT count(id) AS bill FROM voucher_main";
		$r_bill = $conn->query($bill);
		$row = $r_bill->fetch_assoc();
		$max = $row['bill']+1;

		$bill = 'RIT/';
		$yr = substr($date, 0,4);
		if(strlen($max) == 1){
			$bill_no = $bill.$yr."/0000".$max;		
		}else if(strlen($max) == 2){
			$bill_no = $bill.$yr."/000".$max;		
		}else if(strlen($max) == 3){
			$bill_no = $bill.$yr."/00".$max;		
		}else if(strlen($max) == 4){
			$bill_no = $bill.$yr."/0".$max;		
		}else if(strlen($max) >= 5){
			$bill_no = $bill.$yr."/".$max;		
		}

	
	//insert data into database.
	if(isset($_POST['submit'])){
		$custname = $_POST['custname'];
		$pname = $_POST['pname'];
		$cname = $_POST['cname'];
		$imei_no = $_POST['imei_no'];
		$model_no = $_POST['model_no'];
		$ram_gb = $_POST['ram_gb'];
		$storage_gb = $_POST['storage_gb'];
		$color = $_POST['color'];
		$price = $_POST['price'];
		$discount = $_POST['discount'];
		$gross_amt = $_POST['gross_amt'];
		$gst = $_POST['gst'];
		$gst_amt = $_POST['gst_amt'];
		$total_amt = $_POST['total_amt'];
		$payment_mode = $_POST['payment'];
		$bill_no = $_POST['bill_no'];
		$date = $_POST['date'];


		if(($custname!="") && ($pname!="") && ($cname!="") && ($imei_no!="") && ($model_no!="") && ($ram_gb!="") && ($storage_gb!="") && ($color!="") && ($price!="") && ($discount!="") && ($gross_amt!="") && ($gst!="") && ($gst_amt!="") && ($total_amt!="") && ($payment_mode!="") && ($bill_no!="") &&($date!="")){

			$sql = "INSERT INTO `sell_voucher_tb`(`cust_name`, `product_name`, `company_name`, `imei_no`, `model_no`, `ram`, `storage`, `color`, `price`, `discount`, `gross_amt`, `gst`, `gst_amt`, `total_amt`,`bill_no`,`date`) VALUES ('$custname','$pname','$cname','$imei_no','$model_no','$ram_gb','$storage_gb','$color','$price','$discount','$gross_amt','$gst','$gst_amt','$total_amt','$bill_no','$date')";
			$result = $conn->query($sql);
			if($result){
				$errmsg = '<div class="alert alert-success" role="alert">Inserted Successfully.<div>';
			}else{
				$errmsg = '<div class="alert alert-warning" role="alert">Something Went Wrong.<div>';
			}
		}else{
			echo "<script>alert('Please fill all fields');history.go(-1);</script>";
		}


		//======================Start Payment details ========================//
		if($payment_mode=="cash"){
				$payment_amount = $_POST['cash_amount'];
				$sql = "INSERT INTO voucher_main(bill_no,mode,amount,cheque_no,card_no,bank_name,`date`)VALUES('$bill_no','$payment_mode','$payment_amount','','','','$date')";
				
				$result = $conn->query($sql);
			}
		if($payment_mode=="cheque"){
			$bank_name = $_POST['bank_name'];
			$cheque_no = $_POST['cheque_no'];
			$payment_amount = $_POST['chq_amount'];
			$sql = "INSERT INTO voucher_main(bill_no,mode,amount,cheque_no,card_no,bank_name,`date`)VALUES('$bill_no','$payment_mode','$payment_amount','$cheque_no','','$bank_name','$date')";
			
			$result = $conn->query($sql);
			}
		if($payment_mode=="card"){
			$card_no = $_POST['card_no'];
			$payment_amount = $_POST['card_amount'];
			$sql = "INSERT INTO voucher_main(bill_no,mode,amount,cheque_no,card_no,bank_name,`date`)VALUES('$bill_no', '$payment_mode','$payment_amount','','$card_no','','$date')";
			
			$result = $conn->query($sql);
			}
		//======================End Payment details ========================//


		

	}
?>
<?php 
	if(isset($_GET['sell'])){
		$id = $_GET['sell'];
		$sql = "SELECT * FROM item_master_tb WHERE item_id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<div class="col-sm-6" style="margin-top: 40px;">

	<form action="" method="post">
		<div class="form-group">
			<label>Bill No</label>
			<input type="text" name="bill_no" value="<?php echo $bill_no; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Date</label>
			<input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
		</div>
		<div class="form-group">
			<label for="custname">Customer Name</label>
			<input type="text" name="custname" id="custname" class="form-control">
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="pname">Product Name</label>
				<?php 
				$sub_group = "select name from subgroup_master_tb where id = '$row[sub_group]'";
				$result = $conn->query($sub_group);
				$r_subgroup = $result->fetch_assoc();
				?>
				<input type="text" name="pname" id="pname" class="form-control" value="<?php echo $r_subgroup['name']; ?>" readonly>
			</div>
			<div class="col-md-6 form-group">
				<label for="cname">Company Name</label>
				<?php 
				$company_name = "select name from company_master_tb where id = '$row[company_name]'";
				$result = $conn->query($company_name);
				$r_company = $result->fetch_assoc();
				?>
				<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $r_company['name'] ?>" readonly>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">
				<label for="imei_no">IMEI No</label>
				<input type="text" name="imei_no" id="imei_no" class="form-control" value="<?php echo $row['imei_no']; ?>" readonly>
			</div>
			<div class="col-md-6 form-group">
				<label for="model_no">Model No</label>
				<input type="text" name="model_no" id="model_no" class="form-control" value="<?php echo $row['model_no']; ?>" readonly>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4 form-group">
				<label for="ram_gb">Ram</label>
				<?php
				$ram = "select * from ram_master where id = '$row[ram]'";
				$result = $conn->query($ram);
				$r_ram = $result->fetch_assoc();
				?>
				<input type="text" name="ram_gb" id="ram_gb" class="form-control" value="<?php echo $r_ram['ram']; ?>" readonly>
			</div>
			<div class="col-md-4 form-group">
				<label for="storage_gb">Storage</label>
				<?php
				$storage = "select * from storage_master_tb where id = '$row[storage]'";
				$result = $conn->query($storage);
				$r_storage = $result->fetch_assoc();
				?>
				<input type="text" name="storage_gb" id="storage_gb" class="form-control" value="<?php echo $r_storage['storage']; ?>" readonly>
			</div>
			<div class="col-md-4 form-group">
				<label for="color">Color</label>
				<input type="text" name="color" id="color" class="form-control" value="<?php echo $row['color']; ?>" readonly> 
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6 form-group">		
				<label for="price">Price</label>
				<input type="text" name="price" id="price" class="form-control" value="<?php echo $row['price']; ?>" readonly>
			</div>
			<div class="col-md-6 form-group">
				<label for="discount">Discount</label>
				<input type="text" name="discount" id="discount" class="form-control" onchange="getDiscount()">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4 form-group">
				<label for="gross_amt">Gross Amount(<b>Fee after Discount</b>)</label>
				<input type="text" name="gross_amt" id="gross_amt" class="form-control">
			</div>
			<div class="col-md-4 form-group">
				<label for="gst">GST%</label>
				<input type="text" name="gst" id="gst" class="form-control" onchange="calc_tax()">
			</div>
			<div class="col-md-4 form-group">
				<label for="gst_amt">GST</label>
				<input type="text" name="gst_amt" id="gst_amt" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="total_amt">Total Amount to be paid &nbsp;(<b>Including gst</b>)</label>
			<input type="text" name="total_amt" id="total_amt" class="form-control" onchange="calc_ini()">
		</div>


		<!-- ========================Start  Payment Details============================= -->
		<label class="font-weight-bold">Payment Method: &nbsp;&nbsp;</label>
			<div class="form-check-inline">
			  	<label class="form-check-label">
			    	<input type="radio" class="form-check-input" name="payment" value="cash">Cash
			  	</label>
			</div>
			<div class="form-check-inline">
			  	<label class="form-check-label">
			    	<input type="radio" class="form-check-input" name="payment" value="cheque">Cheque
			  	</label>
			</div>
			<div class="form-check-inline">
			  	<label class="form-check-label">
			   		 <input type="radio" class="form-check-input" name="payment" value="card">Card
			  	</label>
			</div>


			<div class="form-group" id="pay_cash">
				<label for="payment_amount">Payment Amount: </label>
				<input type="text" name="cash_amount" id="cash_amount" class="form-control" placeholder="Payment Amount">
			</div>

			<div id="pay_check">
			<div class="form-row">
				<div class="col-md-4 form-group">
					<label for="bank_name">Bank Name</label>
					<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name">
				</div>
				<div class="col-md-4 form-group">
					<label for="cheque_no">Cheque no</label>
					<input type="text" name="cheque_no" id="cheque_no" class="form-control" placeholder="Enter Your Cheque No">
				</div>
				<div class="col-md-4 form-group">
					<label for="chq_amount">Payment Amount: </label>
					<input type="text" name="chq_amount" id="chq_amount" class="form-control" placeholder="Payment Amount">
				</div>
			</div>
		</div>

		<div id="pay_card">
			<div class="form-row">
				<div class="col-md-6 form-group">
					<label for="card_no">Card No</label>
					<input type="text" name="card_no" id="card_no" class="form-control" placeholder="Enter your Card No.">
				</div>
				<div class="col-md-6 form-group">
					<label for="card_amount">Payment Amount: </label>
					<input type="text" name="card_amount" id="card_amount" class="form-control" placeholder="Payment Amount">
				</div>
			</div>
		</div>
		<!-- ========================End  Payment Details============================= -->

		<div class="form-group mt-5">
			<input type="submit" name="submit" value="Proceed To Pay" class="btn btn-danger">
			<a href="itemMaster_display.php" class="btn btn-secondary">Back</a>
		</div>
		<?php if(isset($errmsg)){echo $errmsg;} ?>
	</form>
</div>

<?php include('includes/footer.php'); ?>


<script type="text/javascript">
	$(document).ready(function(){
		$("#pay_cash").hide();
		$("#pay_check").hide();
		$("#pay_card").hide();

		$('input[name="payment"]').click(function(){
			var value = $('input[name="payment"]:checked').val();
			//console.log(value);
			var val = $('#total_amt').val();

			if(value=="cash"){
				$("#pay_cash").show();
				$("#cash_amount").val(val);
				$("#pay_check").hide();
				$("#pay_card").hide();
			}else if(value=="cheque"){
				$("#pay_cash").hide();
				$("#pay_check").show();
				$("#chq_amount").val(val);
				$("#pay_card").hide();
			}else if(value=="card"){
				$("#pay_cash").hide();
				$("#pay_check").hide();
				$("#pay_card").show();
				$("#card_amount").val(val);
			}else{
				$("#pay_cash").hide();
				$("#pay_check").hide();
				$("#pay_card").hide();
			}
		});


	});




	function getDiscount(){
		var amount = Number($("#price").val());
		var discount = Number($("#discount").val());

		//alert(discount);

		if(discount>amount){
			alert("discount value cannot greater than Original Price");
			$("#discount").val(0);
		}

		var fee_discount = (amount - discount);

		$("#gross_amt").val(fee_discount);

		calc_tax();
	}

	function calc_tax(){
		var gross_amt = Number($("#gross_amt").val());

		var gst = Number($("#gst").val());

		var gst_amount = (gross_amt*gst/100);

		$("#gst_amt").val(gst_amount);

		var total = (gross_amt+ gst_amount);

	  	$("#total_amt").val(total);
	  	
	}

	function calc_ini(){
		var total = parseFloat($('#total_amt').val());
		
		var gst = parseFloat($("#gst").val(18));

		
		var ini_pay = Math.round(total-(total*(100/(100+gst))),0);
		// var a= $("#price").val(ini_pay);
		// alert(gst);
		// $("#discount").val(0);
		var service_tax_amt = Number(total-ini_pay);

		$("#gst_amt").val(service_tax_amt);
	
	}



</script>


















