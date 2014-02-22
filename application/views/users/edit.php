<div class="container page-content edit-wrap">
	<div class="edit-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center">Edit Profile</h2>
		<hr>
		
		<?php echo form_open('users/edit'); ?>
		
			<label for="username">User Name: </label>
			<?php  echo ('<span class="edit-username">') . form_input('username',$the_user->username) . ('</span>');?><br>
			<label class="field-requirements" for="username"><small><b> (min 6 characters, max 18 characters)</b></small></label>
			<label for="password">New Password: </label><?php echo form_password("password");?><br/>
			<label for="confirm">Confirm New Password: </label><?php echo form_password("confirm");?><br/>
			<label for="email">Email Address</label>
			<?php echo form_input('email',$the_user->email);?><br/>
			
			<?php if($the_user->group == 'locator') { ?>
			
				<label for="first_name">First Name: </label>
				<?php echo form_input('first_name', $the_user->first_name);?><br/>
				<label for="last_name">Last Name: </label>
				<?php echo form_input('last_name',$the_user->last_name);?><br/>
				<label for="phone">Phone(include area code): </label>
				<?php echo form_input('phone',$the_user->phone);?><br/>
				<label for="company">Company: </label>
				<?php echo form_input('company',$the_user->company);?><br/>
			
			<?php } ?>
			
			<a class="btn cancel pull-right" href="/index.php"><i class="icon-trash"></i> discard changes</a> <button class="btn black pull-right submit-btn" type="submit" name="submit"><i class="icon-save"></i> save changes</button>
		</form>
	</div>		
</div>