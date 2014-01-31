<div class="container browse-wrap white-gradient">
	<div class="browse-inner">
		<?php if($status){
			echo '<div class="error">'.$status.'</div>';
		}?>
		
		<h2 class="text-center">Property Search</h2>
		<?php echo form_open('search/properties');
			  echo ('<div class="text-left"');
			  echo form_fieldset('Property Info');?>
			  <label for="property_name">Property Name</label>
				<?php echo form_input('property_name');?>
				<label for="management">Property Management</label>
				<?php echo form_input('management');?><br/>
				<label for="city">City</label>
				<?php echo form_input('city');?>
				<label for="zip">Zip Code</label>
				<?php echo form_input('zip');?></div><br/><br>
				<div class="checkboxes">
					<?php 
						echo form_fieldset('Property Features');
						  echo ('<span class="property-features">');
						  echo form_checkbox('fitness','24-hour Fitness Center',FALSE).' <span>24-hour Fitness Center</span>';
						  echo form_checkbox('clubhouse','Clubhouse',FALSE).' <span>Clubhouse</span>';
						  echo form_checkbox('blinds','2-inch Wood Blinds',FALSE).' <span>2-inch Wood Blinds</span>';
						  echo form_checkbox('ceilings','Vaulted Ceilings',FALSE).' <span>Vaulted Ceilings</span>';
						  echo form_checkbox('pool','Pool',FALSE).' <span>Pool</span>';
						  echo form_checkbox('laundry','On-Site Laundry',FALSE).' <span>On-Site Laundry</span>';
						  echo form_checkbox('business','Business Center',FALSE).' <span>Business Center</span>';
						  echo form_checkbox('wifi','Free Wifi',FALSE).' <span>Free Wifi</span>';
						  echo form_checkbox('gated','Gated Community',FALSE).' <span>Gated Community</span>';
						  echo form_checkbox('fireplace','Fireplace',FALSE).' <span>Fireplace</span>';
						  echo form_checkbox('elevator','Elevator Access',FALSE).' <span>Elevator Access</span>';
						  echo form_checkbox('storage','Storage Available',FALSE).' <span>Storage Available</span>';
						  echo form_checkbox('parking','Reserved Parking',FALSE).' <span>Reserved Parking</span>';
						  echo form_checkbox('court','Sports Courts',FALSE).' <span>Sports Courts</span>';
						  echo form_checkbox('dog','Dogs',FALSE).' <span>Dogs</span>';
						  echo form_checkbox('cat','Cats',FALSE).' <span>Cats</span>';
						  echo form_checkbox('dog_park','Dog Park',FALSE).' <span>Dog Park</span><br/><br>';
						  echo ('<div class="property-features-dropdowns">');
						  echo form_label('Trash Collection','trash');
						  echo form_dropdown('trash',array('any'=>'Any','valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'any');
						  echo form_label('Cable Provider(s)','cable');
						  echo form_input('cable');
						  echo ('</div>');
						  echo ('</span>');
						  echo form_fieldset_close(); ?>
						  
					<input class="btn edit-btn pull-right" type="submit" name="submit" value="property search" />
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