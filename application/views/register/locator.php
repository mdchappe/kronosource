<div class="container register-wrap page-content">
	<div class="edit-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center">Apartment Locator Registration</h2>
		<hr>
		
		<?php echo form_open('users/register_locator'); ?>
			<?php $reg_opts = 'required="required"' ?>
			<label for="username">User Name&nbsp;:&nbsp;</label>
			<?php echo form_input('username','', $reg_opts);?><br/>
			<label class="push-it" for="username"><small><b>(min 6 characters, max 18 characters)</b></small></label><br>
			<label for="password">Password&nbsp;:&nbsp;</label>
			<?php echo form_password('password','', $reg_opts);?><br/>
			<label class="push-it" for="password"><small><b>(min 8 characters, max 18 characters)</b></small></label><br>
			<label for="password">Re-enter Password&nbsp;:&nbsp;</label>
			<?php echo form_password('password_verify','', $reg_opts);?><br/>
			<label for="email">Email Address&nbsp;:&nbsp;</label>
			<?php echo form_input('email','', $reg_opts);?><br/>
			<label for="email">Re-enter Email Address&nbsp;:&nbsp;</label>
			<?php echo form_input('email_verify','', $reg_opts);?><br/>
			<label for="first_name">First Name&nbsp;:&nbsp;</label>
			<?php echo form_input('first_name','', $reg_opts);?><br/>
			<label for="last_name">Last Name&nbsp;:&nbsp;</label>
			<?php echo form_input('last_name','', $reg_opts);?><br/>
			<label for="display_name">Display Name&nbsp;:&nbsp;</label>
			<?php echo form_input('display_name','', $reg_opts);?><br/>
			<label for="phone">Phone <small>(with area code)&nbsp;:&nbsp;</small></label>
			<?php echo form_input('phone','', $reg_opts);?><br/>
			<label for="company">Company&nbsp;:&nbsp;</label>
			<?php echo form_input('company','', $reg_opts);?><br/>
			
			<input type="hidden" name="code" value="<?php echo $code;?>" />
			
			<button class="btn pull-right" type="submit" name="submit">register <i class="icon-caret-right"></i></button>
		</form>
	</div>
</div>