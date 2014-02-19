<div class="container page-content edit-wrap">
	<div class="edit-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center"><i class="icon-pencil"></i>  Edit Profile</h2>
		<hr>
		
		<?php echo form_open('users/edit'); ?>
		
			<label for="username">User Name: </label>
			<?php  echo ('<span class="edit-username">') . form_input('username',$the_user->username) . ('</span>');?><br>
			<label class="field-requirements" for="username"><small><b> (min 6 characters, max 18 characters)</b></small></label>
			<label for="email">Email Address</label>
			<?php echo form_input('email',$the_user->email);?><br/>
			
			<?php if($the_user->group == 'complex') { ?>
				
				<label for="property_name">Property Name: </label>
				<?php echo form_input('property_name',$the_user->company);?><br/>
				<label for="first_name">Contact's First Name: </label>
				<?php echo form_input('first_name',$the_user->first_name);?><br/>
				<label for="last_name">Contact's Last Name: </label>
				<?php echo form_input('last_name',$the_user->last_name);?><br/>
				<label for="phone">Phone(include area code): </label>
				<?php echo form_input('phone',$the_user->phone);?><br/>
				<label for="street">Street: </label>
				<?php echo form_input('street',$the_user->street);?><br/>
				<label for="city">City: </label>
				<?php echo form_input('city',$the_user->city);?><br/>
				<label for="state">State: </label>
				<?php echo form_dropdown('state',array('tx'=>'TX'),$the_user->state);?><br/>
				<label for="zip">Zip Code: </label>
				<?php echo form_input('zip',$the_user->zip);?><br/>
			
			<?php }
			
			else if($the_user->group == 'locator') { ?>
			
				<label for="first_name">First Name: </label>
				<?php echo form_input('first_name', $the_user->first_name);?><br/>
				<label for="last_name">Last Name: </label>
				<?php echo form_input('last_name',$the_user->last_name);?><br/>
				<label for="phone">Phone(include area code): </label>
				<?php echo form_input('phone',$the_user->phone);?><br/>
				<label for="company">Company(optional)</label>
				<?php echo form_input('company',$the_user->company);?><br/>
			
			<?php } ?>
			
			<a class="btn cancel pull-right" href="/index.php"><i class="icon-trash"></i> discard changes</a> <button class="btn black pull-right submit-btn" type="submit" name="submit"><i class="icon-save"></i> save changes</button>
		</form>
	</div>		
</div>