<?php
	include("dbConnection.php");
	define('TITLE', "Sell Product");
	define('PAGE', "sellproduct");
	error_reporting(0);
	include("includes/header.php");
?>
<div class="col-sm-6 mt-5">
	<table class="table">
		
		<?php 
		$page = isset($_GET['page'])?$_GET['page'] : 1;
		$limit = 3;
		$offset = ($page-1)*$limit;
		$sql = "select * from sell_voucher_tb order by sell_id limit $offset, $limit";
		$result = $conn->query($sql);
		if($result->num_rows>0){?>
		<thead>
			<tr>
				<th class="bg-dark text-white text-center p-2" colspan="17">Sell Report</th>
			</tr>
			<tr>
				<th>Sl No.</th>
				<th>Customer Name</th>
				<th>Product Name</th>
				<th>Company Name</th>
				<th>IMEI No</th>
				<th>Model No</th>
				<th>Ram</th>
				<th>Storage</th>
				<th>Color</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Gross Amount</th>
				<th>GST%</th>
				<th>GST Amount</th>
				<th>Total Amount</th>
				<th>Bill No</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = $offset+1;
			while($row = $result->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['cust_name']; ?></td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['company_name']; ?></td>
				<td><?php echo $row['imei_no']; ?></td>
				<td><?php echo $row['model_no']; ?></td>
				<td><?php echo $row['ram']; ?></td>
				<td><?php echo $row['storage']; ?></td>
				<td><?php echo $row['color']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td><?php echo $row['discount']; ?></td>
				<td><?php echo $row['gross_amt']; ?></td>
				<td><?php echo $row['gst']; ?></td>
				<td><?php echo $row['gst_amt']; ?></td>
				<td><?php echo $row['total_amt']; ?></td>
				<td><?php echo $row['bill_no']; ?></td>
				<td><?php echo $row['date']; ?></td>

			</tr>
		<?php $i++; } ?>
		<tr>
			<td>
				<input type="submit" name="print" onclick="window.print()" class="btn btn-danger d-print-none" value="Print">
			</td>
		</tr>
		</tbody>
	</table>
<?php } ?>
<?php 
	$sql1 = "select * from sell_voucher_tb";
	$result1 = $conn->query($sql1);
	$total_records = $result1->num_rows;
	$total_pages = ceil($total_records/$limit);
	$previous = $page - 1;
	$next = $page + 1;
?>
	<nav aria-label="Page navigation example">
	  <ul class="pagination d-print-none">
	  	<?php if($page>1){
	  		echo '<li class="page-item">
			      <a class="page-link" href="sellproduct_report.php?page='.$previous.'" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>';
	  	} ?>

	    <?php 
	    for ($i=1; $i <=$total_pages ; $i++) {
	    	if($page == $i){
	    		$active = 'active';
	    	}else{
	    		$active = '';
	    	}
	     ?>
	    	<li class="page-item <?php echo $active; ?>"><a class="page-link" href="sellproduct_report.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	  <?php  } ?>
	  <?php if($page<$total_pages){
	  	echo '<li class="page-item">
		      <a class="page-link" href="sellproduct_report.php?page='.$next.'" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>';
	  }

	  ?>	    
	  </ul>
	</nav>
</div>

<!-- <li class="page-item">
	      <a class="page-link" href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
 -->

<?php include("includes/footer.php") ?>