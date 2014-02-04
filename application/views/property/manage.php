<div class="container page-content property-edit">
	<div class="edit-inner">
		
		<?php if(isset($status)):
		echo $status;
		endif; ?>
		<br>
		<h2 class="text-center">Property Management</h2>
		<hr>
		<?php echo form_error('username','<p>username: ','</p>'); ?>
		<?php echo form_error('password','<p>password: ','</p>'); ?>
		<?php echo form_error('email','<p>email: ','</p>'); ?>
		<?php echo form_error('property_name','<p>property name: ','</p>'); ?>
		<?php echo form_error('first_name','<p>first name: ','</p>'); ?>
		<?php echo form_error('last_name','<p>last name: ','</p>'); ?>
		<?php echo form_error('phone','<p>phone: ','</p>'); ?>
		<?php echo form_error('street','<p>street: ','</p>'); ?>
		<?php echo form_error('city','<p>city: ','</p>'); ?>
		<?php echo form_error('state','<p>state: ','</p>'); ?>
		<?php echo form_error('zip','<p>zip code: ','</p>'); ?>
		<?php echo form_open('property/manage'); 
			
			  echo form_fieldset('User Information');
		?>
		
			<label for="username">User Name: </label>
			<?php echo form_input('username', $the_user->username);?><br/>
			<label class="pushleft200" for="username"><small><b>(min 6 characters, max 18 characters)</b></small></label><br>
			<label for="password">Password:</label>
			<?php echo form_password('password');?>
			<label class="pushleft200" for="password"><small><b>(min 8 characters, max 18 characters)</b></small></label><br>
			<label for="password">Re-enter Password: </label>
			<?php echo form_password('password_verify');?><br/>
			<label for="email">Email Address: </label>
			<?php echo form_input('email', $the_user->email);?><br/>
			<label for="email">Re-enter Email Address: </label>
			<?php echo form_input('email_verify', $the_user->email);?><br/>
			<hr>
			<?php echo form_fieldset_close(); 
				  echo form_fieldset('Property Information');
			?>
			<label for="property_name">Property Name: </label>
			<?php echo form_input('property_name', $the_user->company);?><br/>
			<label for="management">Property Management: </label>
			<?php echo form_input('management', $management);?><br/>
			<label for="first_name">Contact's First Name: </label>
			<?php echo form_input('first_name', $the_user->first_name);?><br/>
			<label for="last_name">Contact's Last Name: </label>
			<?php echo form_input('last_name', $the_user->last_name);?><br/>
			<label for="phone">Phone(include area code): </label>
			<?php echo form_input('phone', $the_user->phone);?><br/>
			<label for="street">Street: </label>
			<?php echo form_input('street', $the_user->street);?><br/>
			<label for="city">City: </label>
			<?php echo form_input('city', $the_user->city);?><br/>
			<label for="state">State: </label>
			<?php echo form_dropdown('state',array('tx'=>'TX'),$the_user->state);?><br/>
			<label for="zip">Zip Code: </label>
			<?php echo form_input('zip', $the_user->zip);?><br/>
			<?php echo form_fieldset_close(); ?>
			<hr>
			<div class="checkboxes">
			<?php
				  echo form_fieldset('Property Features');
				  echo form_checkbox('fitness','24-hour Fitness Center',$fitness).' 24-hour Fitness Center<br/>';
				  echo form_checkbox('clubhouse','Clubhouse',$clubhouse).' Clubhouse<br/>';
				  echo form_checkbox('blinds','2-inch Wood Blinds',$blinds).' 2-inch Wood Blinds<br/>';
				  echo form_checkbox('ceilings','Vaulted Ceilings',$ceilings).' Vaulted Ceilings<br/>';
				  echo form_checkbox('pool','Pool',$pool).' Pool<br/>';
				  echo form_checkbox('laundry','On-Site Laundry',$laundry).' On-Site Laundry<br/>';
				  echo form_checkbox('business','Business Center',$business).' Business Center<br/>';
				  echo form_checkbox('wifi','Free Wifi',$wifi).' Free Wifi<br/>';
				  echo form_checkbox('gated','Gated Community',$gated).' Gated Community<br/>';
				  echo form_checkbox('fireplace','Fireplace',$fireplace).' Fireplace<br/>';
				  echo form_checkbox('elevator','Elevator Access',$elevator).' Elevator Access<br/>';
				  echo form_checkbox('storage','Storage Available',$storage).' Storage Available<br/>';
				  echo form_checkbox('parking','Reserved Parking',$parking).' Reserved Parking<br/>';
				  echo form_checkbox('court','Sports Courts',$court).' Sports Courts<br/>';
				  echo form_checkbox('dog','Dogs',$dog).' Dogs<br/>';
				  echo form_checkbox('cat','Cats',$cat).' Cats<br/>';
				  echo form_checkbox('dog_park','Dog Park',$dog_park).' Dog Park<br/><br>';
				  echo form_label('Trash Collection','trash');
				  echo form_dropdown('trash',array('valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),$trash).'<br/><br>';
				  echo form_label('Cable Provider(s)','cable');
				  echo form_input('cable',$cable);
				  echo form_fieldset_close(); ?>
			
			<input class="btn pull-right btn-primary edit-btn" type="submit" name="submit" value="submit" /><br><br>
			<hr>
			</div>
		</form>
		
		<h3>Unit Management</h3>
		<?php
			if(!empty($units)) {
				foreach($units as $unit): ?>
					<p><?php echo $unit['name'] ?> <a href="/index.php/property/update_unit/<?php echo $unit['id'] ?>"><small>edit</small></a> <a href="/index.php/property/delete_unit/<?php echo $unit['id'] ?>"><small>delete</small></a></p>
				<?php endforeach;
			} else {
				echo "<p>No units currently listed.</p>";
			}
		?>
		
		<ul>
			<li><a href="/index.php/property/add_unit">Add Unit</a></li>
		</ul>
	</div>
</div>