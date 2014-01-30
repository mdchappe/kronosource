<div class="container browse-wrap">
	<div class="browse-inner">
		<?php if($status){
			echo '<div class="error">'.$status.'</div>';
		}?>
		
		<h2>Property Search</h2>
		
		<?php echo form_open('search/properties');
			  echo form_fieldset('Property Info');?>
			  
			  <label for="property_name">Property Name</label>
				<?php echo form_input('property_name');?><br/>
				<label for="management">Property Management</label>
				<?php echo form_input('management');?><br/>
				<label for="city">City</label>
				<?php echo form_input('city');?><br/>
				<label for="zip">Zip Code</label>
				<?php echo form_input('zip');?><br/>
						
				<div class="checkboxes">
					<?php echo form_fieldset('Property Features');
						  echo form_checkbox('fitness','24-hour Fitness Center',FALSE).' 24-hour Fitness Center<br/>';
						  echo form_checkbox('clubhouse','Clubhouse',FALSE).' Clubhouse<br/>';
						  echo form_checkbox('blinds','2-inch Wood Blinds',FALSE).' 2-inch Wood Blinds<br/>';
						  echo form_checkbox('ceilings','Vaulted Ceilings',FALSE).' Vaulted Ceilings<br/>';
						  echo form_checkbox('pool','Pool',FALSE).' Pool<br/>';
						  echo form_checkbox('laundry','On-Site Laundry',FALSE).' On-Site Laundry<br/>';
						  echo form_checkbox('business','Business Center',FALSE).' Business Center<br/>';
						  echo form_checkbox('wifi','Free Wifi',FALSE).' Free Wifi<br/>';
						  echo form_checkbox('gated','Gated Community',FALSE).' Gated Community<br/>';
						  echo form_checkbox('fireplace','Fireplace',FALSE).' Fireplace<br/>';
						  echo form_checkbox('elevator','Elevator Access',FALSE).' Elevator Access<br/>';
						  echo form_checkbox('storage','Storage Available',FALSE).' Storage Available<br/>';
						  echo form_checkbox('parking','Reserved Parking',FALSE).' Reserved Parking<br/>';
						  echo form_checkbox('court','Sports Courts',FALSE).' Sports Courts<br/>';
						  echo form_checkbox('dog','Dogs',FALSE).' Dogs<br/>';
						  echo form_checkbox('cat','Cats',FALSE).' Cats<br/>';
						  echo form_checkbox('dog_park','Dog Park',FALSE).' Dog Park<br/><br>';
						  echo form_label('Trash Collection','trash');
						  echo form_dropdown('trash',array('any'=>'Any','valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'any').'<br/><br>';
						  echo form_label('Cable Provider(s)','cable');
						  echo form_input('cable');
						  echo form_fieldset_close(); ?>
					<input class="btn btn-primary edit-btn" type="submit" name="submit" value="property search" />
					</div>
				<?php echo form_fieldset_close();
					  echo form_close(); ?>
		
		<h2>Unit Search</h2>
			<?php echo form_open('search/units');?>
				
				<label for="beds_min">Bedrooms</label><br/>
				<?php echo form_input('beds_min', 0);?> Minimum <?php echo form_input('beds_max');?> Maximum<br/>
				<label for="baths_min">Baths</label><br/>
				<?php echo form_input('baths_min');?> Minimum <?php echo form_input('baths_max');?> Maximum<br/>
				<label for="size_min">Unit Size</label><br/>
				<?php echo form_input('size_min');?><small><b>sq. ft.</b></small> Minimum <?php echo form_input('size_max');?><small><b>sq. ft.</b></small> Maximum<br/>
				<label for="floor">Floor</label><br/>
				<?php echo form_input('floor');?><br/>
				<label for="direction">Direction Facing</label>
				<?php echo form_dropdown('direction', $direction_dropdown);?><br/>
				<label for="washer">Washer/Dryer</label>
				<?php echo form_dropdown('washer', $washer_dropdown);?><br/>
				<label for="date">Date Available</label><br/>
				<?php echo form_input($date_input);?><br/>
				<label for="commission">Commission</label><br/>
				<?php echo form_input('commission');?><br/>
				<label for="term_min">Lease Term</label><br/>
				<?php echo form_input('term_min');?> Minimum <?php echo form_input('term_max');?> Maximum<br/>
				<label for="rent_min">Rent</label><br/>
				<?php echo form_input('rent_min');?> Minimum <?php echo form_input('rent_max');?> Maximum<br/>
				<input class="btn btn-primary edit-btn" type="submit" name="submit_unit" value="unit search" /> 		
			<?php echo form_close();?>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />