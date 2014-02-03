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

<div class="home-wrapper container effect7">
		
		<?php if($this->session->flashdata('login')){
			
			echo '<p>'.$this->session->flashdata('login').'</p>';
		}?>
				
		<?php if(!$this->ion_auth->logged_in()):
			  echo form_open('contact/form');
			  echo form_fieldset('<h2>Want to know more?</h2>');
		?>
	<div class="row-fluid">
		<?php echo validation_errors('<p class="error">', '</p>'); ?>
		<?php echo '<span>'.$status.'</span>';?>
		<h4>Please complete all fields below.</h4>
		<label for="name">Name:</label>
		<?php echo form_input('name', set_value('name'));?>
		<label for="phone">Phone Number:</label>
		<?php echo form_input('phone', set_value('phone'));?>
		<label for="email">Email Address:</label>
		<?php echo form_input('email', set_value('email'));?>
		<label for="email_validate">Verify Email Address:</label>
		<?php echo form_input('email_validate');?>
		<label for="company">Company:</label>
		<?php echo form_input('company', set_value('company'));?><br><span class="radio-selectors">
		<label class="radio-label" for="locator">I am or represent a:</label>
		<?php echo form_radio('account_type','locator',set_value('account_type'));?>Locator
		<?php echo form_radio('account_type','Property',set_value('account_type'));?>Property
		<label class="radio-label" for="contact_phone">Contact me by:</label>
		<?php echo form_radio('contact','Phone',set_value('contact')).'Phone';
			  echo form_radio('contact','Email',set_value('contact')).'Email';
			  echo form_radio('contact','Either',set_value('contact')).'Either<br/>';?></span>
		<label for="captcha">Are You Human?</label>
		<?php echo $captcha['image'].form_input('captcha');?><br/>
		<input class="btn" type="submit" name="submit" value="submit" />
		
		<?php endif;?>
	</div>
</div>
