<div class="container page-content add-unit"><div class="inner add-update">
<a class="btn black cp-btn" href="/index.php/property/manage"><i class="icon-caret-left"></i> back to property management</a>
<br>
<h2 class="text-center">ADD UNIT TO <?php echo $the_user->company; ?></h2>
<hr>
<?php echo form_open('property/add_unit'); 
	 
	  echo form_fieldset('Unit Information');
?>
	<?php $reg_opts = 'required="required"'; ?>
	<label for="unit_name">Unit Name/Description:&nbsp;</label>
	<?php echo form_input('unit_name','',$reg_opts);?><br/>
	<label class="param" for="unit_name"><small><b>(32 characters max)</b></small></label><br/>
	<label for="unit_beds">Bedrooms:&nbsp;</label>
	<?php echo form_input('unit_beds','',$reg_opts);?><br/>
	<label for="unit_baths">Baths:&nbsp;</label>
	<?php echo form_input('unit_baths','',$reg_opts);?><br/>
	<label for="unit_size">Unit Size:&nbsp;</label>
	<?php echo form_input('unit_size','',$reg_opts);?><label class="text-left"><small><b>&nbsp; sq. ft.</b></small></label><br/>
	<label for="unit_floor">Floor:&nbsp;</label>
	<?php echo form_input('unit_floor','',$reg_opts);?><br/>
	<label for="unit_direction">Patio Facing:&nbsp;</label>
	<?php echo form_dropdown('unit_direction', $direction_dropdown);?><br/>
	<label for="unit_washer">Washer/Dryer:&nbsp;</label>
	<?php echo form_dropdown('unit_washer', $washer_dropdown);?><br/>
	<label for="unit_furnished">Furnished:&nbsp;</label><?php echo form_checkbox('unit_furnished',1,FALSE);?><br/>
	<label for="unit_requirements">Eligibility Requirements:&nbsp;</label>
	<?php echo form_textarea($requirements_input); ?><br/>
	<label for="unit_specials">Current Specials:&nbsp;</label>
	<?php echo form_textarea($specials_input); ?><br/>
	<label for="unit_date">Date Available:&nbsp;</label>
	<?php echo form_input($date_input,'',$reg_opts);?><br/>
	<label for="unit_commission">Commission:&nbsp;</label>
	<?php echo form_input('unit_commission','','required="required"'.'placeholder="%"' );?><br/><br>
	
	<?php echo form_fieldset_close();
		
		  echo form_fieldset('Rent Information'); ?><a class="btn pull-right add-term green" id="add_term"><i class="icon-plus"></i> Add Lease Term</a>
		  <table id="rent_information_table">
		  	<tr class="top-row" id="rent_info_table_header">
		  		<th>Lease Term</th>
		  		<th>Monthly Rent</th>
		  		<th>Deposit</th>
		  	</tr>
		  	<tr class="account-row">
		  		<?php $regz_opts = 'required="required"'.'placeholder="0"';  ?>
		  		<td><?php echo form_input('lease_term_0','',$regz_opts);?> months</td>
		  		<td>$<?php echo form_input('monthly_rent_0','',$regz_opts);?></td>
		  		<td>$<?php echo form_input('deposit_0','',$regz_opts);?></td>
		  	</tr>
		  	
		  </table>
	<?php echo form_fieldset_close();?>
	<br>
	<input type="hidden" name="lease_term_count" value="0" id="lease_term_count"/>
	<a class="btn pull-right cancel" href="/index.php/property/manage"><i class="icon-trash"></i> cancel add</a>
	<button class="pull-right submit-unit btn black" type="submit" name="submit">add unit <i class="icon-caret-right"></i></button>
	</form>
	
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />
	
</div></div>
	