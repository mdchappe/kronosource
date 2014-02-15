<div class="container page-content property-edit">
	<div class="edit-inner">
		
		<?php if(isset($status)):
		echo $status;
		endif; ?>
		<br>
		<h2 class="text-center"><i class="icon-cog"></i> Property Management</h2>
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
		<?php echo form_open('property/manage'); ?>
		
		<div class="row">
			<div class="width50">
				<?php echo form_fieldset('User Information');?>
				<label for="username">User Name: </label>
				<?php echo form_input('username', $the_user->username);?><br/>
				<label class="pushleft200" for="username"><small><b>(min 6 characters, max 18 characters)</b></small></label><br>
				<label for="password">Password:</label>
				<?php echo form_password('password');?><br>
				<label class="pushleft200" for="password"><small><b>(min 8 characters, max 18 characters)</b></small></label><br>
				<label for="password">Re-enter Password: </label>
				<?php echo form_password('password_verify');?><br/>
				<label for="email">Email Address: </label>
				<?php echo form_input('email', $the_user->email);?><br/>
				<label for="email">Re-enter Email Address: </label>
				<?php echo form_input('email_verify', $the_user->email);?><br/>
				<?php echo form_fieldset_close(); ?>
			</div>
			<div class="width50">
				<?php echo form_fieldset('Property Information');?>
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
			</div>
		</div>
			<hr>
			<div class="checkboxes">
			<?php
				  echo form_fieldset('Property Features');
				  echo form_checkbox('fitness','24-hour Fitness Center',$fitness).' <span>24-hour Fitness Center</span>';
				  echo form_checkbox('clubhouse','Clubhouse',$clubhouse).' <span>Clubhouse</span>';
				  echo form_checkbox('blinds','2-inch Wood Blinds',$blinds).' <span>2-inch Wood Blinds</span>';
				  echo form_checkbox('ceilings','Vaulted Ceilings',$ceilings).' <span>Vaulted Ceilings</span>';
				  echo form_checkbox('pool','Pool',$pool).' <span>Pool</span>';
				  echo form_checkbox('laundry','On-Site Laundry',$laundry).' <span>On-Site Laundry</span>';
				  echo form_checkbox('business','Business Center',$business).' <span>Business Center</span>';
				  echo form_checkbox('wifi','Free Wifi',$wifi).' <span>Free Wifi</span>';
				  echo form_checkbox('gated','Gated Community',$gated).' <span>Gated Community</span>';
				  echo form_checkbox('fireplace','Fireplace',$fireplace).' <span>Fireplace</span>';
				  echo form_checkbox('elevator','Elevator Access',$elevator).' <span>Elevator Access</span>';
				  echo form_checkbox('storage','Storage Available',$storage).' <span>Storage Available</span>';
				  echo form_checkbox('parking','Reserved Parking',$parking).' <span>Reserved Parking</span>';
				  echo form_checkbox('court','Sports Courts',$court).' <span>Sports Courts</span>';
				  echo form_checkbox('dog','Dogs',$dog).' <span>Dogs</span>';
				  echo form_checkbox('cat','Cats',$cat).' <span>Cats</span>';
				  echo form_checkbox('dog_park','Dog Park',$dog_park).' <span>Dog Park</span><br><br>';
				  echo form_label('Trash Collection:&nbsp;&nbsp;','trash');
				  echo form_dropdown('trash',array('valet'=>'Valet','dumpster'=>'Dumpsters','chute'=>'Trash Chutes'),$trash);
				  echo form_label('Cable Provider(s):&nbsp;&nbsp;','cable');
				  echo form_input('cable',$cable);
				  echo form_label('Pet Policy:&nbsp;&nbsp;','pet_policy');
				  echo form_input('pet_policy',$pet_policy);
				  echo form_fieldset_close(); 
				  
				  echo form_fieldset('Property Announcement');
				  echo form_textarea('announcement',$announcement);
				  echo form_fieldset_close();?>
			
			<button class="btn pull-right" type="submit" name="submit"><i class="icon-save"></i> save changes</button><br><br>
			<hr>
			</div>
		</form>
		
		<h3>Unit Management</h3>
		<?php
			if(!empty($units)) {
				foreach($units as $unit): ?>
					<p class="unit-list">
						<span class="unit-label"><i class="icon-ok"></i> <?php echo $unit['name'] ?> </span>
						<a class="pull-right just-icon cancel" href="/index.php/property/delete_unit/<?php echo $unit['id'] ?>"><i class="icon-remove-sign icon-large"></i></a>
						<a class="pull-right push-left just-icon" href="/index.php/property/update_unit/<?php echo $unit['id'] ?>"><i class="icon-pencil icon-large"></i></a> 
					</p>
					<hr class="new-hr">
				<?php endforeach;
			} else {
				echo "<p class='error'>No units currently listed.</p>";
			}
		?>
		
		<ul>
			<li><a class="btn green pull-right" href="/index.php/property/add_unit"><i class="icon-plus"></i> Add Unit</a></li>
		</ul>
	</div>
</div>