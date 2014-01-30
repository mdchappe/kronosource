<?php 
	$captcha_vals = array(
		'img_path'	 => 'assets/captcha/',
		'img_url'	 => base_url().'assets/captcha/',
		'img_width'	 => '150',
		'img_height' => 30,
		'expiration' => 7200
	);
			
	$captcha = create_captcha($captcha_vals);
			
	$captcha_data = array(
		'captcha_time'	=> $captcha['time'],
		'ip_address'	=> $this->input->ip_address(),
		'word'	 		=> $captcha['word']
	);
			
	$query = $this->db->insert_string('captcha', $captcha_data);
	$this->db->query($query);
?>

<div class="home-wrapper container">
	<p class="construction-statement">
		Hang in there, KronoSource is almost ready.<br/>
		
		<?php if(!$this->ion_auth->logged_in()):
			  echo form_open('contact/form');
			  echo form_fieldset('Want to know more?');
		?>
		<?php echo validation_errors('<p class="error">', '</p>'); ?>
		<?php echo '<span>'.$status.'</span><br/>';?>
		Please complete all fields below.
		<label for="name">Name</label>
		<?php echo form_input('name', set_value('name'));?><br/>
		<label for="company">Company</label>
		<?php echo form_input('company', set_value('company'));?><br/>
		<label for="phone">Phone Number</label>
		<?php echo form_input('phone', set_value('phone'));?><be/>
		<label for="email">Email Address</label>
		<?php echo form_input('email', set_value('email'));?><br/>
		<label for="email_validate">Validate Email Address</label>
		<?php echo form_input('email_validate');?><br/>
		<label for="locator">I am or represent a:</label>
		<?php echo form_radio('account_type','locator',set_value('account_type'));?>Locator<br/>
		<?php echo form_radio('account_type','Property',set_value('account_type'));?>Property<br/>
		<label for="contact_phone">Contact me by:</label>
		<?php echo form_radio('contact','Phone',set_value('contact')).'Phone<br/>';
			  echo form_radio('contact','Email',set_value('contact')).'Email<br/>';
			  echo form_radio('contact','Either',set_value('contact')).'Either<br/>';?>
		<label for="captcha">Prove your humanity:</label>
		<?php echo $captcha['image'].form_input('captcha');?><br/>
		<input type="submit" name="submit" value="submit" />
		
		<?php endif;?>
	</p>
</div>
