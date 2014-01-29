<h2>UDATE LEASE TERM</h2>
	<?php echo form_open('property/update_lease_term/'.$term['id']); ?>
	<table id="rent_information_table">
		  	<tr id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  		<th>Pet Rent</th>
		  		<th>Pet Deposit</th>
		  	</tr>
		  	<tr>
			  	<td><?php echo form_input('lease_term',$term['term']);?></td>
			  	<td><?php echo form_input('monthly_rent',$term['rent']);?></td>
			  	<td><?php echo form_input('deposit',$term['deposit']);?></td>
			  	<td><?php echo form_input('pet_rent',$term['pet_rent']);?></td>
			  	<td><?php echo form_input('pet_deposit',$term['pet_deposit']);?><input type="hidden" name="lease_term_id" value="<?php echo $term['id'] ?>"/></td>
			</tr>
	</table>
	<input type="submit" name="submit" value="submit" /><a href="/index.php/property/update_unit/<?php echo $term['unit_id']; ?>">cancel</a>
	</form>