<div class="container page-content update-unit">
<div class="edit-inner">
<h2 class="text-center"><i class="icon-pencil"></i> EDIT <?php echo $unit->name?></h2>
<hr>
<?php echo form_open('property/update_unit/'.$unit_id); 
	
	  echo form_fieldset('Unit Information');
?>

	<label for="unit_name">Unit Name/Description&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_name', $unit->name)?><br/>
	<label for="unit_name"><small><b>(32 characters max)</b></small></label><br>
	<label for="unit_beds">Bedrooms&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_beds', $unit->beds);?><br/>
	<label for="unit_baths">Baths&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_baths', $unit->baths);?><br/>
	<label for="unit_size">Unit Size&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_size',$unit->size);?><label class="text-left"><small><b>&nbsp;&nbsp;sq. ft.</b></small></label><br>
	<label for="unit_floor">Floor&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_floor', $unit->floor);?><br/>
	<label for="unit_direction">Direction Facing&nbsp;:&nbsp;</label>
	<?php echo form_dropdown('unit_direction', $direction_dropdown,$unit->direction);?><br>
	<label for="unit_washer">Washer/Dryer&nbsp;:&nbsp;</label>
	<?php echo form_dropdown('unit_washer', $washer_dropdown,$unit->washer);?><br>
	<label for="unit_furnished">Furnished&nbsp;:&nbsp;</label><?php echo form_checkbox('unit_furnished',1,$unit->furnished);?><br>
	<label for="unit_requirements">Eligibility Requirements&nbsp;:&nbsp;</label>
	<?php echo form_textarea($requirements_input,$unit->requirements); ?><br/>
	<label for="unit_specials">Current Specials&nbsp;:&nbsp;</label>
	<?php echo form_textarea($specials_input,$unit->specials); ?><br/>
	<label for="unit_date">Date Available&nbsp;:&nbsp;</label>
	<?php echo form_input($date_input,$date);?><br/>
	<label for="unit_commission">Commission&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_commission',$unit->commission);?><br/><br><br>
	
	<?php echo form_fieldset_close();
		  echo form_fieldset('Rent Information'); ?>
		  <div class="row">
		  <table id="rent_information_table">
		  	<tr class="top-row" id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  		<th>Pet Rent</th>
		  		<th>Pet Deposit</th>
		  		<th> </th>
		  		<th> </th>
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
		  		<td><a class="btn" href="/index.php/property/update_lease_term/<?php echo $term['id']; ?>"><i class="icon-pencil"></i> edit</a></td>
		  		<td><a class="btn cancel" href="/index.php/property/delete_lease_term/<?php echo $term['id']; ?>"><i class="icon-trash"></i> delete</a></td>
		  	</tr>
		  	<!--
<tr>
		  		<td><?php echo form_input('lease_term_'.$term['id'],$term['term']);?></td>
		  		<td><?php echo form_input('monthly_rent_'.$term['id'],$term['rent']);?></td>
		  		<td><?php echo form_input('deposit_'.$term['id'],$term['deposit']);?></td>
		  		<td><?php echo form_input('pet_rent_'.$term['id'],$term['pet_rent']);?></td>
		  		<td><?php echo form_input('pet_deposit_'.$term['id'],$term['pet_deposit']);?><input type="hidden" name</td>
		  		<td></td>
		  		<td></td>
		  	</tr>
-->
		  	
		  	<?php endforeach;?>
		  	
		  </table>
		  </div>
		  <a class="btn green pull-right add-more" id="add_term"><i class="icon-plus"></i> Add Lease Term Entry</a>
	<?php echo form_fieldset_close();?>
	
	<input type="hidden" name="unit_id" value="<?php echo $unit_id ?>" id="unit_id"/> 
	<a class="btn pull-left" href="/index.php/property/manage"><i class="icon-caret-left"></i> back to properties</a>
	<button class="pull-right btn" type="submit" name="submit"><i class="icon-reply"></i> submit</button>
	</form>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />
	
</div>
</div>