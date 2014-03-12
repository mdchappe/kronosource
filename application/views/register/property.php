<div class="container page-content register-wrap">
	<div class="edit-inner">
	<span class="validation-errors"></span>
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
			<?php echo form_fieldset_close();?>
			<hr>
			<?php
				  echo form_fieldset('Property Information');
			?>
			<img src="<?php echo base_url();?>assets/img/profile/none.jpg"/><span class="img-wrap"><label for="userfile">Profile Image<small> (optional)&nbsp;:&nbsp;</small></label><br>
			<?php echo form_upload('userfile');?></span><br>
			<label for="property_name">Property Name&nbsp;:&nbsp;</label>
			<?php echo form_input('property_name','', $reg_opts);?><br/>
			<label for="display_name">Display Name&nbsp;:&nbsp;</label>
			<?php echo form_input('display_name','', $reg_opts);?><br/>
			<label for="management">Property Management&nbsp;:&nbsp;</label>
			<?php echo form_input('management');?><br/>
			<label for="first_name">Contact's First Name&nbsp;:&nbsp;</label>
			<?php echo form_input('first_name','', $reg_opts);?><br/>
			<label for="last_name">Contact's Last Name&nbsp;:&nbsp;</label>
			<?php echo form_input('last_name','', $reg_opts);?><br/>
			<label for="phone">Phone <small>(with area code)</small>&nbsp;:&nbsp;</label>
			<?php echo form_input('phone','', $reg_opts);?><br/>
			<label for="fax">Fax <small>(with area code)</small>&nbsp;:&nbsp;</label>
			<?php echo form_input('fax','', $reg_opts);?><br/>
			<label for="street">Street&nbsp;:&nbsp;</label>
			<?php echo form_input('street','', $reg_opts);?><br/>
			<label for="city">City&nbsp;:&nbsp;</label>
			<?php echo form_input('city','', $reg_opts);?><br/>
			<label for="state">State&nbsp;:&nbsp;</label>
			<?php echo form_dropdown('state',array('tx'=>'TX'),'TX', $reg_opts);?><br>
			<label for="zip">Zip Code&nbsp;:&nbsp;</label>
			<?php echo form_input('zip','', $reg_opts);?><br/>
			<label for="hours">Office Hours&nbsp;:&nbsp;</label>
			<?php echo form_textarea('hours');?><br/>
			<?php echo form_fieldset_close(); ?><hr>
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
				  echo form_checkbox('dog_park','Dog Park',FALSE).' Dog Park<br/><br><span class="trash-cable">';
				  echo form_label('Trash Collection&nbsp;:&nbsp;','trash');
				  echo form_dropdown('trash',array('valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),'Dumpsters').'<br/>';
				  echo form_label('Cable Provider(s)&nbsp;:&nbsp;','cable');
				  echo form_input('cable');
				  
				  echo form_fieldset_close('</span>');
				  
				  
				  echo form_fieldset('pet policy');
				  echo form_textarea('pet_policy');
				  echo form_fieldset_close(); 
				  
				  echo form_fieldset('requirements');
				  echo form_textarea('additional');
				  echo form_fieldset_close();?>
				  
				  <input type="hidden" name="code" value="<?php echo $code?>" />
			<button class="btn black pull-right" type="submit" name="submit">register <i class="icon-caret-right"></i></button>
			</div>
		</form>
	</div>
</div>
