<h2>Edit Profile</h2>

<?php echo form_open('users/edit'); ?>

	<label for="username">User Name<small><b>(min 6 characters, max 18 characters)</b></small></label><br/>
	<?php echo form_input('username',$the_user->username);?><br/>
	<label for="email">Email Address</label><br/>
	<?php echo form_input('email',$the_user->email);?><br/>
	
	<?php if($the_user->group == 'complex') { ?>
		
		<label for="property_name">Property Name</label><br/>
		<?php echo form_input('property_name',$the_user->company);?><br/>
		<label for="first_name">Contact's First Name</label><br/>
		<?php echo form_input('first_name',$the_user->first_name);?><br/>
		<label for="last_name">Contact's Last Name</label><br/>
		<?php echo form_input('last_name',$the_user->last_name);?><br/>
		<label for="phone">Phone(include area code)</label><br/>
		<?php echo form_input('phone',$the_user->phone);?><br/>
		<label for="street">Street</label><br/>
		<?php echo form_input('street',$the_user->street);?><br/>
		<label for="city">City</label><br/>
		<?php echo form_input('city',$the_user->city);?><br/>
		<label for="state">State</label><br/>
		<?php echo form_dropdown('state',array('tx'=>'TX'),$the_user->state);?><br/>
		<label for="zip">Zip Code</label><br/>
		<?php echo form_input('zip',$the_user->zip);?><br/>
	
	<?php }
	
	else if($the_user->group == 'locator') { ?>
	
		<label for="first_name">First Name</label><br/>
		<?php echo form_input('first_name', $the_user->first_name);?><br/>
		<label for="last_name">Last Name</label><br/>
		<?php echo form_input('last_name',$the_user->last_name);?><br/>
		<label for="phone">Phone(include area code)</label><br/>
		<?php echo form_input('phone',$the_user->phone);?><br/>
		<label for="company">Company(optional)</label><br/>
		<?php echo form_input('company',$the_user->company);?><br/>
	
	<?php } ?>
	
	<input type="submit" name="submit" value="submit" /><a href="/index.php">cancel</a>
</form>