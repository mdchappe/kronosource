<div class="container edit-wrap">
<div class="edit-inner">
<h2>EDIT <?php echo $unit->name?></h2><br><br>

<?php echo form_open('property/update_unit/'.$unit_id); 
	
	  echo form_fieldset('Unit Information');
?>

	<label for="unit_name">Unit Name/Description<small><b>(32 characters max)</b></small></label>
	<?php echo form_input('unit_name', $unit->name)?><br/>
	<label for="unit_beds">Bedrooms</label>
	<?php echo form_input('unit_beds', $unit->beds);?><br/>
	<label for="unit_baths">Baths</label>
	<?php echo form_input('unit_baths', $unit->baths);?><br/>
	<label for="unit_size">Unit Size<br/>
	<?php echo form_input('unit_size',$unit->size);?><small><b>sq. ft.</b></small></label>
	<label for="unit_floor">Floor</label>
	<?php echo form_input('unit_floor', $unit->floor);?><br/>
	<label for="unit_direction">Direction Facing</label>
	<?php echo form_dropdown('unit_direction', $direction_dropdown,$unit->direction);?><br/><br>
	<label for="unit_washer">Washer/Dryer</label>
	<?php echo form_dropdown('unit_washer', $washer_dropdown,$unit->washer);?><br/><br>
	<label for="unit_furnished">Furnished</label><?php echo form_checkbox('unit_furnished',1,$unit->furnished);?>
	<label for="unit_requirements">Eligibility Requirements</label>
	<?php echo form_textarea($requirements_input,$unit->requirements); ?><br/>
	<label for="unit_specials">Current Specials</label>
	<?php echo form_textarea($specials_input,$unit->specials); ?><br/>
	<label for="unit_date">Date Available</label>
	<?php echo form_input($date_input,$date);?><br/>
	<label for="unit_commission">Commission</label>
	<?php echo form_input('unit_commission',$unit->commission);?><br/>
	
	<?php echo form_fieldset_close();
		  echo form_fieldset('Rent Information'); ?>
		  <table id="rent_information_table">
		  	<tr id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  		<th>Pet Rent</th>
		  		<th>Pet Deposit</th>
		  		<th>Edit</th>
		  		<th>Delete</th>
		  	</tr>
		  	<?php 
		  	$terms = -1;
		  	foreach($rent as $term): ?>
		  	
		  	<tr>
		  		<td><?php echo $term['term']; ?></td>
		  		<td><?php echo $term['rent']; ?></td>
		  		<td><?php echo $term['deposit']; ?></td>
		  		<td><?php echo $term['pet_rent']; ?></td>
		  		<td><?php echo $term['pet_deposit']; ?></td>
		  		<td><a href="/index.php/property/update_lease_term/<?php echo $term['id']; ?>">update</a></td>
		  		<td><a href="/index.php/property/delete_lease_term/<?php echo $term['id']; ?>">delete</a></td>
		  	</tr>
		  	<!--
<tr>
		  		<td><?php echo form_input('lease_term_'.$term['id'],$term['term']);?></td>
		  		<td><?php echo form_input('monthly_rent_'.$term['id'],$term['rent']);?></td>
		  		<td><?php echo form_input('deposit_'.$term['id'],$term['deposit']);?></td>
		  		<td><?php echo form_input('pet_rent_'.$term['id'],$term['pet_rent']);?></td>
		  		<td><?php echo form_input('pet_deposit_'.$term['id'],$term['pet_deposit']);?><input type="hidden" name</td>
		  	</tr>
-->
		  	
		  	<?php endforeach;?>
		  	
		  </table>
		  <a id="add_term">Add Lease Term Entry</a>
	<?php echo form_fieldset_close();?>
	
	<input type="hidden" name="unit_id" value="<?php echo $unit_id ?>" id="unit_id"/>
	<input type="hidden" name="lease_term_count" value="0" id="lease_term_count"/>
	<input type="submit" name="submit" value="submit" /><a href="/index.php/property/manage">cancel</a>
	</form>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />
	
</div>
</div>