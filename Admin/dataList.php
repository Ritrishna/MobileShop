<label>Imei No / Company / Model / Ram / Storage</label>
			<input type="text" name="product" id="product" list="product_list">

			<datalist id="product_list">
				<?php $item ="select company_name,ram,storage,imei_no, model_no from item_master_tb";
					$res = $conn->query($item);

					while($r_item =$res->fetch_assoc()){
						$company_name = "select name from company_master_tb where id = '$r_item[company_name]'";
						$result3 = $conn->query($company_name);
						$r_company = $result3->fetch_assoc();

						$ram = "select ram from ram_master where id = '$r_item[ram]'";
						$result4 = $conn->query($ram);
						$r_ram = $result4->fetch_assoc();

						$storage = "select storage from storage_master_tb where id = '$r_item[storage]'";
						$result5 = $conn->query($storage);
						$r_storage = $result5->fetch_assoc();?>

						<option value="<?php echo $r_item['imei_no'] ?>"><?php echo $r_company['name']."-". $r_ram['ram'],"-". $r_storage['storage']."-". $r_item['model_no'] ?></option>

				<?php } ?> 
			</datalist> 