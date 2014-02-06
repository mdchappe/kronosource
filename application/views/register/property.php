<div class="container page-content register-wrap">
	<div class="edit-inner">
		<h2 class="text-center">Property Registration</h2>
		<hr>
		<p class="error"><?php echo validation_errors('<p class="error">', '</p>'); ?></p>
		<?php echo form_open_multipart('users/register_property'); 
			
			  echo form_fieldset('User Information');
		?>
		
			<label for="username">User Name<small><b> (min 6 characters, max 18 characters)</b></small></label>
			<?php echo form_input('username');?><br/>
			<label for="password">Password<small><b> (min 8 characters, max 18 characters)</b></small></label>
			<?php echo form_password('password');?><br/>
			<label for="password">Re-enter Password</label>
			<?php echo form_password('password_verify');?><br/>
			<label for="email">Email Address</label>
			<?php echo form_input('email');?><br/>
			<label for="email">Re-enter Email Address</label>
			<?php echo form_input('email_verify');?><br/>
			<?php echo form_fieldset_close();
				  echo form_fieldset('Property Information');
			?>
			<label for="property_name">Property Name</label>
			<?php echo form_input('property_name');?><br/>
			<label for="display_name">Display Name<small>(for messages)</small></label>
			<?php echo form_input('display_name');?><br/>
			<label for="management">Property Management</label>
			<?php echo form_input('management');?><br/>
			<img src="<?php echo base_url();?>assets/img/profile/none.jpg" style="float:left"/><label for="userfile">Profile Image<small> (optional)</small>
			<?php echo form_upload('userfile');?><br/>
			<label for="first_name" style="clear:left">Contact's First Name</label>
			<?php echo form_input('first_name');?><br/>
			<label for="last_name">Contact's Last Name</label>
			<?php echo form_input('last_name');?><br/>
			<label for="phone">Phone(include area code)</label>
			<?php echo form_input('phone');?><br/>
			<label for="street">Street</label>
			<?php echo form_input('street');?><br/>
			<label for="city">City</label>
			<?php echo form_input('city');?><br/>
			<label for="state">State</label>
			<?php echo form_dropdown('state',array('tx'=>'TX'),'TX');?><br><br>
			<label for="zip">Zip Code</label>
			<?php echo form_input('zip');?><br/>
			<?php echo form_fieldset_close(); ?>
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
				  echo form_dropdown('trash',array('valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'Dumpsters').'<br/><br>';
				  echo form_label('Cable Provider(s)','cable');
				  echo form_input('cable');
				  echo form_fieldset_close(); ?>
			<button class="btn pull-right" type="submit" name="submit"><i class="icon-reply"></i> submit</button>
			</div>
		</form>
	</div>
</div>

<style>
	.nav:before{display: none !important;}
</style>
	