<div class="container page-content property-edit">
<a class="btn black p-property-switch active-tab">property management</a>
<a class="btn black p-unit-switch">unit management</a>
	<div class="edit-inner">
		<div class="prop-mgmt">
		<p class="error">
		<?php if(isset($status)):
		echo $status;
		endif; ?></p>
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
		<?php echo form_open_multipart('property/manage'); ?>
		
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
				<label for="property_image"><img src="<?php echo substr($the_user->file_name,0,-4).'_thumb'.substr($the_user->file_name,-4);?>" style="width:80px;height:80px" /><br/>Profile Image: </label>
				<?php echo form_upload('userfile');?><br/>
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
			<ul class="manage-tabs">
				<li class="pf"><a class="btn">features</a></li>
				<li class="pp"><a class="btn black">pet policy</a></li>
				<li class="pa"><a class="btn black">announcement</a></li>
			</ul>
			<?php echo '<div id="property-features">';
				  echo form_fieldset('property features');
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
				  echo form_input('cable',$cable); echo '<br><br>';
				  echo form_fieldset_close('</div>');

				  echo '<div id="pet-policy">';
				  echo form_fieldset('pet policy');
				  echo form_textarea('pet_policy',$pet_policy);
				  echo '</div>';
				  echo form_fieldset_close(); 
				  
				   echo '<div id="requirements">';
				  echo form_fieldset('requirements');
				  echo form_textarea('additional',$additional);
				  echo '</div>';
				  echo form_fieldset_close(); 
				  
				  echo '<div id="announcements1">';
				  echo form_fieldset('announcements');
				  echo form_textarea('announcement',$announcement);
				  echo '</div>';
				  echo form_fieldset_close();?>
			
			<button class="btn black pull-right sub-btn" type="submit" name="submit"><i class="icon-save"></i> save changes</button>
			</div>
		</form>
		</div><!-- end prop-mgmt -->
		<div class="unit-mgmt">
		<span class="validation-errors"></span>
		<h2 class="text-center">Unit Management</h2>
		<hr>
		<?php
			if(!empty($units)) {
				foreach($units as $unit): ?>
					<div class="unit-list" style="border-bottom:1px solid #ccc;">
						<span class="unit-label"><i class="icon-ok"></i> <?php echo $unit['name'] ?> </span>
						<div class="all-the-icons">
						<a class="pull-right just-icon cancel" href="/index.php/property/delete_unit/<?php echo $unit['id'] ?>"><i class="icon-remove-sign icon-large"></i></a>
						<a class="pull-right push-left black just-icon" href="/index.php/property/update_unit/<?php echo $unit['id'] ?>"><i class="icon-pencil icon-large"></i></a> 
						
						<form class="cam-icon pull-right" name="unit_gallery_<?php echo $unit['id'];?>" method="post" action="<?php echo base_url().'index.php/property/gallery'?>" id="unit_gallery_<?php echo $unit['id'];?>"> 
							<input type="hidden" name="type" value="unit"/>
							<input type="hidden" name="id" value="<?php echo $unit['id'];?>"/>
							<a class="just-icon black" href="javascript:void();" onclick="document.getElementById('unit_gallery_<?php echo $unit['id'];?>').submit()"><i class="icon-camera-retro icon-large"></i></a>
						</form>
						</div>
						</div>
				<?php endforeach;
			} else {	
				echo "<p class='error'>No units currently listed.</p>";
			}
		?>
		
		<ul class="low30">
			<li><a class="btn black pull-right" href="/index.php/property/add_unit"><i class="icon-plus"></i> Add Unit</a></li>
		</ul>
		
			<ul class="low30">
				<li>
					<form name="property_gallery" method="post" action="<?php echo base_url().'index.php/property/gallery'?>" id="property_gallery"> 
						<input type="hidden" name="type" value="property"/>
						<input type="hidden" name="id" value="<?php echo $the_user->id;?>"/>
						<a class="btn black" href="javascript:void();" onclick="document.getElementById('property_gallery').submit()"><i class="icon-camera-retro"></i> <?php echo $the_user->company;?> property photos</a>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>