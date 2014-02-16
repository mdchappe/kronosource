<?php 
	
?>

<div class="container page-content home-wrapper"><div class="inner">
		
		<?php if($this->session->flashdata('login')){
			
			echo '<p>'.$this->session->flashdata('login').'</p>';
		}?>
		<?php if(!$this->ion_auth->logged_in()):
				
				$this->load->helper('captcha');
				
				$captcha_vals = array(
					'img_path'	 => 'assets/captcha/',
					'img_url'	 => base_url().'assets/captcha/',
					'img_width'	 => '150',
					'img_height' => '30',
					'expiration' => '7200'
				);
										
				$captcha = create_captcha($captcha_vals);
				
				$captcha_data = array(
					'captcha_time'	=> $captcha['time'],
					'ip_address'	=> $this->input->ip_address(),
					'word'	 		=> $captcha['word']
				);
						
				$query = $this->db->insert_string('captcha', $captcha_data);
				$this->db->query($query);
		
			  echo form_open('contact/form');
			  echo form_fieldset('<h2 class="text-center">Want to know more?</h2>');
		?><hr>
	<div class="row-fluid">
		<span class="validation-errors">
			<?php echo validation_errors('<p class="error">', '</p>'); ?>
		</span>
		<?php echo '<span>'.$status.'</span>';?>
		<h4>Please complete all fields below.</h4>
		<label for="name">Name:</label>
		<?php $homeForm_opts = 'required="required"'; echo form_input('name','', $homeForm_opts, set_value('name'));?>
		<label for="phone">Phone Number:</label>
		<?php echo form_input('phone','', $homeForm_opts, set_value('phone'));?>
		<label for="email">Email Address:</label>
		<?php echo form_input('email','', $homeForm_opts, set_value('email'));?>
		<label for="email_validate">Verify Email Address:</label>
		<?php echo form_input('email_validate','', $homeForm_opts);?>
		<label for="company">Company:</label>
		<?php echo form_input('company','', $homeForm_opts, set_value('company'));?><br><span class="radio-selectors">
		<label class="radio-label" for="locator">I am or represent a:</label>
		<?php echo form_radio('account_type','locator','', $homeForm_opts,set_value('account_type'));?>Locator
		<?php echo form_radio('account_type','Property',set_value('account_type'));?>Property
		<label class="radio-label" for="contact_phone">Contact me by:</label>
		<?php echo form_radio('contact','Phone','', $homeForm_opts,set_value('contact')).'Phone';
			  echo form_radio('contact','Email',set_value('contact')).'Email';
			  echo form_radio('contact','Either',set_value('contact')).'Either<br/>';?></span>
		<label for="captcha">Are You Human?</label>
		<?php echo $captcha['image'].form_input('captcha','', $homeForm_opts);?><br/>
		<button class="btn pull-right" type="submit" name="submit"><i class="icon-reply"></i>  submit </button>
		
		<?php 
			
			elseif($this->ion_auth->in_group(2)):?>
			
			<table>
				<h2>Recent Property Announcements</h2>
				<tr>
					<th>Property</th>
					<th>Announcement</th>
					<th>Posted</th>
				</tr>
		<?php foreach($announcements as $announcement):?>
		
				<tr>
					<td><a href="<?php echo base_url().'index.php/locator/viewProperty/'.$announcement['id']?>"><?php echo $announcement['company']?></a></td>
					<td><a href="<?php echo base_url().'index.php/locator/viewAnnouncement/'.$announcement['id'];?>"><?php echo $announcement['announcement']?></a></td>
					<td><?php echo $announcement['announcement_updated']?></td>
				</tr>
		<?php endforeach; ?>
		
			</table>
			<a href="<?php echo base_url().'index.php/locator/viewAnnouncements';?>">vew all announcements</a>
		<?php endif;?>
	</div>
	</div>
</div>
