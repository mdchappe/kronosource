<div class="container page-content update-lease-terms"><div class="inner">
<h2 class="text-center">UPDATE LEASE TERM</h2>
<hr>
	<?php echo form_open('property/update_lease_term/'.$term['id']); ?>
	<div class="row">
	<table id="rent_information_table">
		  	<tr class="top-row" id="rent_info_table_header">
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
	</div>
	<a class="btn cancel pull-right" href="/index.php/property/update_unit/<?php echo $term['unit_id']; ?>"><i class="icon-trash"></i> discard changes</a>
	<button class="btn black pull-right" type="submit" name="submit"><i class="icon-save"></i> save changes</button> 
	</form>
	
</div></div>