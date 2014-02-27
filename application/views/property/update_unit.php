<div class="container page-content update-unit">
<a class="btn black cp-btn" href="/index.php/property/manage"><i class="icon-caret-left"></i> back to property management</a>
<div class="edit-inner add-update">
<span class="validation-errors"></span>
<h2 class="text-center">EDIT <?php echo $unit->name?></h2>
<hr>
<?php if($this->session->flashdata('status')){
		echo '<p class="error update-u">'.$this->session->flashdata('status').'</p>';
	  }
	  
	  echo form_open('property/update_unit/'.$unit_id); 
	
	  echo form_fieldset('Unit Information');
?>

	<label for="unit_name">Unit Name/Description&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_name', $unit->name)?><br/>
	<label class="push-it" for="unit_name"><small><b>(32 characters max)</b></small></label><br>
	<label for="unit_beds">Bedrooms&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_beds', $unit->beds);?><br/>
	<label for="unit_baths">Baths&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_baths', $unit->baths);?><br/>
	<label for="unit_size">Unit Size&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_size',$unit->size);?><label class="text-left"><small><b>&nbsp;&nbsp;sq. ft.</b></small></label><br>
	<label for="unit_floor">Floor&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_floor', $unit->floor);?><br/>
	<label for="unit_direction">Patio Facing&nbsp;:&nbsp;</label>
	<?php echo form_dropdown('unit_direction', $direction_dropdown,$unit->direction);?><br>
	<label for="unit_washer">Washer/Dryer&nbsp;:&nbsp;</label>
	<?php echo form_dropdown('unit_washer', $washer_dropdown,$unit->washer);?><br>
	<label for="unit_furnished">Furnished&nbsp;:&nbsp;</label><?php echo form_checkbox('unit_furnished',1,$unit->furnished);?><br>
	<label for="unit_requirements">Additional Features&nbsp;:&nbsp;</label>
	<?php echo form_textarea($requirements_input,$unit->requirements); ?><br/>
	<label for="unit_specials">Current Specials&nbsp;:&nbsp;</label>
	<?php echo form_textarea($specials_input,$unit->specials); ?><br/>
	<label for="unit_date">Date Available&nbsp;:&nbsp;</label>
	<?php echo form_input($date_input,$date);?><br/>
	<label for="unit_commission">Commission&nbsp;:&nbsp;</label>
	<?php echo form_input('unit_commission',$unit->commission);?><label class="text-left"><small><b>&nbsp;&nbsp;%</b></small></label><br/><br><br>
	
	<?php echo form_fieldset_close(); ?>
	
	<?php echo form_fieldset('Rent Information'); ?>
		  <table id="rent_information_table">
		  <a class="btn pull-right add-term green" id="add_term"><i class="icon-plus"></i> Add Lease Term</a>
		  	<tr class="top-row" id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  		<th> </th>
		  		<th> </th>
		  	</tr>
		  	<?php 
		  	$terms = -1;
		  	foreach($rent as $term): ?>
		  	
		  	<tr class="account-row">
		  		<td><?php echo $term['term'].' months'; ?></td>
		  		<td><?php echo '$'.$term['rent']; ?></td>
		  		<td><?php echo '$'.$term['deposit']; ?></td>
		  		<td><a class="just-icon" href="/index.php/property/update_lease_term/<?php echo $term['id']; ?>"><i class="icon-pencil icon-large"></i></a></td>
		  		<td><a class="just-icon cancel" href="/index.php/property/delete_lease_term/<?php echo $term['id']; ?>"><i class="icon-trash icon-large"></i></a></td>
		  	</tr>		  	
		  	<?php endforeach;?>
		  	
		  </table>
	<?php echo form_fieldset_close();?>
	
	<input type="hidden" name="unit_id" value="<?php echo $unit_id ?>" id="unit_id"/> 
	<input type="hidden" name="lease_term_count" value="0" id="lease_term_count"/>
	<a class="btn cancel pull-right" href="/index.php/property/manage"><i class="icon-trash"></i> discard changes</a>
	<button class="pull-right btn black submit-btn" type="submit" name="submit"><i class="icon-save"> save changes</i></button>
	</form>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />
	
</div>
</div>