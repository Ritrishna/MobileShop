<?php
	include("dbConnection.php");
	define('TITLE', "Sell Product");
	define('PAGE', "payment_details");
	error_reporting(0);
	include("includes/header.php");
?>
<div class="col-sm-9 mt-5">
	<?php
	$sql = "select * from voucher_main";
	$result = $conn->query($sql);
	if($result->num_rows){
	?>
	<table class="table">
		<h3 class="text-center">Customer Bill Details</h3>
		<thead class="text-primary">
			<tr>
				<th>Sl No.</th>
				<th>Customer Name</th>
				<th>Bill No</th>
				<th>Date</th>
				<th>Payment Mode</th>
				<th>Pay Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i=1;
			$total_amount ="";
			while($row = $result->fetch_assoc()){
				 $total_amount += $row['amount'];
					$cust_name ="select cust_name from sell_voucher_tb where bill_no = '$row[bill_no]'";
					$result1 = $conn->query($cust_name);
					$c_group = $result1->fetch_assoc();

			  ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $c_group['cust_name']; ?></td>
				<td><?php echo $row['bill_no']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['mode']; ?>
					<table class="table" style="background-color: #cccccc;">
						<tbody class="text-primary">
						<?php if($row['mode']=="cash"){} ?>
						<?php if($row['mode']=="cheque"){ ?>
						<tr>
							<th>Cheque no : </th>
							<td><?php echo $row['cheque_no']; ?></td>
						</tr>
						<tr>
							<th>Bank Name : </th>
							<td><?php echo $row['bank_name']; ?></td>
						</tr>
					<?php } ?>
					<?php if($row['mode']=="card"){ ?>
						<tr>
							<th>Card No : </th>
							<td><?php echo $row['card_no']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
					</table>
				</td>
				<td><?php echo $row['amount'].'/-'; ?></td>
			</tr>

		<?php $i++; } ?>
		<tr>
			<td colspan="5" class="font-weight-bold text-center">Total</td>
			<td><b><?php echo $total_amount.'/-'; ?></b></td>
		</tr>
		</tbody>
	</table>
<?php } ?>


</div>
<?php include("includes/footer.php"); ?>
