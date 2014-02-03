<div class="container browse-wrap white-gradient">
	<div class="browse-inner">
		<?php if($status){
			echo '<div class="error">'.$status.'</div>';
		}?>
		
		<h2 class="text-center">Property Search</h2>
		<?php echo form_open('search/properties');
			  echo ('<div class="text-left"');
			  echo form_fieldset('Property Info');?>
			  <label for="property_name">Property Name: </label>
				<?php echo form_input('property_name');?>
				<label for="management">Property Management: </label>
				<?php echo form_input('management');?><br/>
				<label for="city">City: </label>
				<?php echo form_input('city');?>
				<label for="zip">Zip Code: </label>
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
						  echo form_label('Trash Collection: ','trash');
						  echo form_dropdown('trash',array('any'=>'Any','valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'any');
						  $cable_opts = 'placeholder="no preference"';
						  echo form_label('Cable Provider(s): ','cable');
						  echo form_input('cable','', $cable_opts);
						  echo ('</div>');
						  echo ('</span>');
						  echo form_fieldset_close(); ?>
						  
					<input class="btn edit-btn pull-right" type="submit" name="submit" value="property search" />
					</div>
				<?php echo form_fieldset_close();
					  echo form_close(); ?>
					  
		
		<h2>Unit Search</h2>
			<?php echo form_open('search/units');?>
				<label for="term_min">Lease Term: </label>
				<?php $term_min_opts = 'placeholder="no minimum"';  echo form_input('term_min','', $term_min_opts);?> <?php $term_min_opts = 'placeholder="no maximum"';  echo form_input('term_max','', $term_min_opts);?><br/>
				<label for="rent_min">Rent ($): </label>
				<?php $rent_min_opts = 'placeholder="no minimum"';  echo form_input('rent_min','', $rent_min_opts);?> <?php $rent_min_opts = 'placeholder="no maximum"';  echo form_input('rent_max','', $rent_min_opts);?><br/>
				<label for="beds_min">Bedrooms: </label>
				 <?php $beds_min_opts = 'placeholder="no minimum"'; echo form_input('beds_min','', $beds_min_opts);?> <?php $beds_max_opts = 'placeholder="no maximum"'; echo form_input('beds_max','', $beds_max_opts);?><br/>
				<label for="baths_min">Baths :</label>
				 <?php $baths_min_opts = 'placeholder="no minimum"'; echo form_input('baths_min','', $baths_min_opts);?> <?php $baths_max_opts = 'placeholder="no maximum"'; echo form_input('baths_max','', $baths_max_opts);?><br/><br>
				<label for="size_min">Minimum Square Footage: </label>
				 <?php $size_min_opts = 'placeholder="no minimum"';  echo form_input('size_min','', $size_min_opts);?>
				<label for="floor">Floor: </label>
				<?php $floor_opts = 'placeholder="no preference"'; echo form_input('floor','', $floor_opts);?><br/>
				<label for="direction">Direction Facing: </label>
				<?php echo form_dropdown('direction', $direction_dropdown);?>
				<label for="washer">Washer/Dryer: </label>
				<?php echo form_dropdown('washer', $washer_dropdown);?><br/>
				<label for="date">Date Available: </label>
				<?php echo form_input($date_input);?>
				<label for="commission">Commission: </label>
				<?php $comission_opts = 'placeholder="--"';  echo form_input('commission','', $comission_opts);?><br/>
				
				<input class="btn pull-right btn-primary edit-btn" type="submit" name="submit_unit" value="unit search" /> 		<br><br>
			<?php echo form_close();?>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" type="text/css" media="screen" />