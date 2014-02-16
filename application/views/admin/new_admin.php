<div class="container page-content register-wrap">
	<div class="edit-inner">
		<p><?echo $status;?></p>
		<p class="error"><?php echo validation_errors('<p class="error">', '</p>'); ?></p>
		<h2 class="text-center">Add Admin Account</h2><br><br>
		
		<?php echo form_open('admin/new_admin'); ?>
		
			<label for="username">User Name<small><b> (min 6 characters, max 18 characters)</b></small></label>
			<?php echo form_input('username');?><br/>
			<label for="password">Password<small><b>(min 8 characters, max 18 characters)</b></small></label>
			<?php echo form_password('password');?><br/>
			<label for="password">Re-enter Password</label>
			<?php echo form_password('password_verify');?><br/>
			<label for="email">Email Address</label>
			<?php echo form_input('email');?><br/>
			<label for="email">Re-enter Email Address</label>
			<?php echo form_input('email_verify');?><br/>
			<label for="first_name">First Name</label>
			<?php echo form_input('first_name');?><br/>
			<label for="last_name">Last Name</label>
			<?php echo form_input('last_name');?><br/>
			<label for="display_name">Display Name<small>(for messages)</small></label>
			<?php echo form_input('display_name');?><br/>
			<label for="phone">Phone(include area code)</label>
			<?php echo form_input('phone');?><br/>
			<label for="company">Company</label>
			<?php echo form_input('company','KronoSource');?><br/>
			<input class="btn btn-primary edit-btn" type="submit" name="submit" value="register" />
		</form>
	</div>
</div>