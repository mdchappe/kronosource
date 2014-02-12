<div class="container page-content register-wrap">
	<div class="edit-inner">
		<h2 class="text-center">Property Registration</h2>
		<hr>
		<p class="error"><?php echo validation_errors('<p class="error">', '</p>'); ?></p>
		<?php echo form_open_multipart('users/register_property'); 
			
			  echo form_fieldset('User Information');
		?>
			<?php $reg_opts = 'required="required"' ?>
			<label for="username">User Name&nbsp;:&nbsp;</label>
			<?php echo form_input('username','', $reg_opts);?><br/>
			<label class="push-it" for="username"><small><b> (min 6 characters, max 18 characters)</b></small></label><br>
			<label for="password">Password&nbsp;:&nbsp;</label>
			<?php echo form_password('password','', $reg_opts);?><br/>
			<label class="push-it" for="password"><small><b> (min 8 characters, max 18 characters)</b></small></label><br>
			<label for="password">Re-enter Password&nbsp;:&nbsp;</label>
			<?php echo form_password('password_verify','', $reg_opts);?><br/>
			<label for="email">Email Address&nbsp;:&nbsp;</label>
			<?php echo form_input('email','', $reg_opts);?><br/>
			<label for="email">Re-enter Email Address&nbsp;:&nbsp;</label>
			<?php echo form_input('email_verify','', $reg_opts);?><br/>
			<?php echo form_fieldset_close();
				  echo form_fieldset('Property Information');
			?>
			<img src="<?php echo base_url();?>assets/img/profile/none.jpg" style="float:left"/><label for="userfile">Profile Image<small> (optional)&nbsp;:&nbsp;</small></label>
			<?php echo form_upload('userfile');?><br>
			<label for="property_name">Property Name&nbsp;:&nbsp;</label>
			<?php echo form_input('property_name','', $reg_opts);?><br/>
			<label for="display_name">Display Name<small>(for messages)&nbsp;:&nbsp;</small></label>
			<?php echo form_input('display_name','', $reg_opts);?><br/>
			<label for="management">Property Management&nbsp;:&nbsp;</label>
			<?php echo form_input('management');?><br/>
			<label for="first_name">Contact's First Name&nbsp;:&nbsp;</label>
			<?php echo form_input('first_name','', $reg_opts);?><br/>
			<label for="last_name">Contact's Last Name&nbsp;:&nbsp;</label>
			<?php echo form_input('last_name','', $reg_opts);?><br/>
			<label for="phone">Phone(include area code)&nbsp;:&nbsp;</label>
			<?php echo form_input('phone','', $reg_opts);?><br/>
			<label for="street">Street&nbsp;:&nbsp;</label>
			<?php echo form_input('street','', $reg_opts);?><br/>
			<label for="city">City&nbsp;:&nbsp;</label>
			<?php echo form_input('city','', $reg_opts);?><br/>
			<label for="state">State&nbsp;:&nbsp;</label>
			<?php echo form_dropdown('state',array('tx'=>'TX'),'TX', $reg_opts);?><br><br>
			<label for="zip">Zip Code&nbsp;:&nbsp;</label>
			<?php echo form_input('zip','', $reg_opts);?><br/>
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
				  echo form_label('Trash Collection&nbsp;:&nbsp;','trash');
				  echo form_dropdown('trash',array('valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'Dumpsters').'<br/><br>';
				  echo form_label('Cable Provider(s)&nbsp;:&nbsp;','cable');
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

 The Email Address field is required.

 The First Name field is required.

 The Last Name field is required.

 The Display Name field is required.

 The Phone Number field is required.

 The Property Name field is required.

 The Street field is required.

 The City field is required.

 The Zip Code field is required.
	