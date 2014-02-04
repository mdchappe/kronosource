<div class="container page-content add-unit"><div class="inner">
<br>
<h2 class="text-center">ADD UNIT TO <?php echo $the_user->company; ?></h2>
<hr>
<?php echo form_open('property/add_unit'); 
	
	  echo form_fieldset('Unit Information');
?>

	<label for="unit_name">Unit Name/Description<small><b>(32 characters max)</b></small></label><br/>
	<?php echo form_input('unit_name');?><br/>
	<label for="unit_beds">Bedrooms</label><br/>
	<?php echo form_input('unit_beds');?><br/>
	<label for="unit_baths">Baths</label><br/>
	<?php echo form_input('unit_baths');?><br/>
	<label for="unit_size">Unit Size<br/>
	<?php echo form_input('unit_size');?><small><b>sq. ft.</b></small></label><br/>
	<label for="unit_floor">Floor</label><br/>
	<?php echo form_input('unit_floor');?><br/>
	<label for="unit_direction">Direction Facing</label>
	<?php echo form_dropdown('unit_direction', $direction_dropdown);?><br/>
	<label for="unit_washer">Washer/Dryer</label>
	<?php echo form_dropdown('unit_washer', $washer_dropdown);?><br/>
	<label for="unit_furnished">Furnished</label><?php echo form_checkbox('unit_furnished',1,FALSE);?><br/>
	<label for="unit_requirements">Eligibility Requirements</label>
	<?php echo form_textarea($requirements_input); ?><br/>
	<label for="unit_specials">Current Specials</label>
	<?php echo form_textarea($specials_input); ?><br/>
	<label for="unit_date">Date Available</label><br/>
	<?php echo form_input($date_input);?><br/>
	<label for="unit_commission">Commission</label><br/>
	<?php echo form_input('unit_commission');?><br/>
	
	<?php echo form_fieldset_close();
		  echo form_fieldset('Rent Information'); ?>
		  <table id="rent_information_table">
		  	<tr id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  		<th>Pet Rent</th>
		  		<th>Pet Deposit</th>
		  	</tr>
		  	<tr>
		  		<td><?php echo form_input('lease_term_0');?></td>
		  		<td><?php echo form_input('monthly_rent_0');?></td>
		  		<td><?php echo form_input('deposit_0');?></td>
		  		<td><?php echo form_input('pet_rent_0');?></td>
		  		<td><?php echo form_input('pet_deposit_0');?></td>
		  	</tr>
		  	
		  </table>
		  <a id="add_term">Add Lease Term Entry</a>
	<?php echo form_fieldset_close();?>
	<input type="hidden" name="lease_term_count" value="0" id="lease_term_count"/>
	<input type="submit" name="submit" value="submit" />
	</form>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />
	
</div></div>
	