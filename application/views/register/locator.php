<div class="container edit-wrap">
	<div class="edit-inner">
		<h2>Apartment Locator Registration</h2><br><br>
		
		<?php echo form_open('users/register_locator'); ?>
		
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
			<label for="phone">Phone(include area code)</label>
			<?php echo form_input('phone');?><br/>
			<label for="company">Company(optional)</label>
			<?php echo form_input('company');?><br/>
			<input class="btn btn-primary edit-btn" type="submit" name="submit" value="submit" />
		</form>
	</div>
</div>