<div class="home-hero">
	<div class="hero-inner-wrapper">
	   	   <div class="container">
		   	  <img src="http://www.frequencycreative.com/codeigniter/assets/img/kronosource_logo.png" />
		   	  <p>kronosource apartment locator management system</p>
		   	  <? if (isset($home)):?>
		   	  <div class="reg-box">
				<p class="unregistered">
					
					<?php if($this->session->flashdata('register')):
							
							echo $this->session->flashdata('register');
						  
						  else:
						  	
						  	echo '<p class="reg-command">please enter your registration code</p>';
						  
						  endif ?>
						  
					<?php echo form_open('pages/register').form_input('regcode', $regcode, 'required="required"');?>
					<button class="btn" type="submit" name="submit_register">register <i class="icon-caret-right"></i></button>
					</form>
				</p>
			 </div><!-- reg box -->
			 <?php endif;?>
		  </div><!-- container -->
	</div><!-- hero-inner-wrapper -->
</div><!-- home-hero -->

<div class="home-all-wrapper">

	<div class="home-text1 container">
			<h2>what is kronosource?</h2>
			<p>Lorem ipsum dolor sit amet, per odio idque mnesarchum ut, cu cum eligendi salutandi. Solet interpretaris id mei. Ad sit debet movet adipisci, tota option intellegam ne per. Pro essent prompta te, has audiam dolores inimicus cu. Ullum diceret molestie sea ut.Velit accusam no duo, ei usu vero quas, sed an molestie mediocrem. Dicit veniam vim et, nam clita instructior ut. Vis et menandri deserunt conceptam. Pri postulant tincidunt ex. No est eleifend percipitur assueverit, mea quis nibh tractatos no.</p>
			<p>Eu omnis repudiandae nec. Consul quaestio vel ad, ex postea vidisse theophrastus mea. Te semper voluptatum vel, sea ut stet ferri inermis, tantas decore noluisse no sea. Viderer equidem ocurreret ne vel. Scripserit scribentur at eum, eos lorem deseruisse ex.Postea facilisi mediocrem mea in, quo malis expetenda et. Eum eros solet accommodare ne, nisl nihil sea at. Ad mel vocibus persequeris, duo brute quaestio antiopam cu. Usu an molestie perpetua. For more information, feel free to <a href="#contact-us">contact us <i class="icon-caret-right"></i></a> </p>
	</div><!-- home-text1 container -->

	<div  id="contact-us"  class="container page-content home-wrapper">
		<div class="inner">
	
		<?php 
				
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
			<?php echo $captcha['image'].form_input('captcha','', $homeForm_opts);?><br><br>
			<textarea class="flexible-text"></textarea><br>
			<button class="btn pull-right" type="submit" name="submit"><i class="icon-reply"></i>  submit</button>
			<div class="not-yet">x</div><!-- -->
			<a class="detailed">need to send a more detailed inquiry? <i class="icon-caret-right"></i></a>
	</div>
</div>

<div class="features">
	<div class="container"> 
		<span>
			<h2>simple</h2>
			<i class="icon-lightbulb icon-8x"></i>
			<p>Pri putant mentitum consulatu ne, in nam essent sanctus, etiam electram quo ad. Ut altera ocurreret vituperata qui, per ea wisi legimus nonumes, virtute incorrupte dissentias ei eum.</p>
		</span>
		<span class="middle-span">
			<h2>efficient</h2>
			<i class="icon-cogs icon-8x"></i>
			<p>Per ad fabellas erroribus, has ad dolore graecis perfecto. Ad nam molestiae definiebas, qui te velit doming, sed quod novum te. legimus nonumes, virtute incorrupte dissentias ei eum.</p>
		</span>
		<span>
			<h2>affordable</h2>
			<i class="icon-usd icon-8x"></i>
			<p>Simul legimus nonumes est eu, est at graece lucilius adversarium, ne illum quaeque duo. Tritani referrentur eos et. Ad cum apeirian verterem molestiae. At noster aliquid deterruisset quo, te.</p>
		</span>
	</div><!-- container -->
</div><!-- features -->

<div class="who-uses">
	<div class="container">
		<h2>who uses kronosource?</h2>
		<div class="logos">
			<img src="http://www.pinnacleaptsla.com/gridmedia/img/logo.png" width="200"/>
			<img src="http://www.rentping.com/static/fiveq_real_estate/landlords/Lincoln_Property_logo.png" width="200"/>
			<img src="http://arielpa.com/s101/pages//images/apa-logo372x130.png" width="200"/>
			<img src="https://sdprojectmates.ffres.com/images/FairfieldLogo.png" width="200"/>
		</div><!-- logos -->
	</div><!-- container -->
</div><!-- who-uses -->

<div class="home-faq">
	<div class="container">
		<h2>frequently asked questions</h2>
		<hr>
		<div class="span12">
			<div class="span6">
				<h4>Facer aeterno in est, ad vis quem convenire. Errem facilisi definitionem cu est, id?</h4>
				<p>Audire reprehendunt sea ut, an nec autem semper. Vim inermis hendrerit et, vis cu illum eligendi. Per everti audire iudicabit.</p>
			</div>
			<div class="span6">
				<h4>Lorem ipsum dolor sit amet, brute suscipit cu nec, cu latine docendi voluptua vim?</h4>
				<p>Ad tibique recusabo appellantur eam, sumo copiosae mel ad. Duo tantas fabulas reprehendunt cu, ius ex legendos urbanitas pertinacia id.</p>
			</div>
			<div class="span6">
				<h4>In eirmod accusam sit, veri luptatum dignissim vel ut. In accusamus dissentiunt vix?</h4>
				<p>Summo populo facilis qui no. Has adhuc vidisse persius an, verterem oportere eum eu, partiendo sententiae no pro. Id oblique.</p>
			</div>
			<div class="span6">
				<h4>At ferri laudem sea, ex vel utinam civibus cotidieque. Aeterno instructior ut vim?</h4>
				<p>Quo fierent intellegebat id, id nominati facilisis percipitur duo. In cum facer animal scripserit, nec in evertitur posidonium efficiantur facer.</p>
			</div>
			<div class="span6">
				<h4>Ut per nostrum appetere voluptatibus, tollit phaedrum ea usu, lorem fugit option eam?</h4>
				<p>Ea inimicus erroribus elaboraret sit, duo in prompta posidonium. Porro debet cum ex. Adhuc placerat ne duo, nisl laboramus qui.</p>
			</div>
			<div class="span6">
				<h4>Vidisse delicata percipitur eam at, cum at quidam option incorrupte. Eos prima nihil?</h4>
				<p>Maiorum intellegat sea ea. Ei his eius persequeris. Gloriatur disputando eum at. Cu possim volumus duo, et pro oporteat neglegentur.</p>
			</div>
			<div class="span6">
				<h4>Te sea erat veritus facilisis, albucius persequeris ne eum. Nam in utinam contentiones?</h4>
				<p>No mel fabulas laboramus comprehensam, nihil animal feugiat usu ad, eam cu paulo dicant senserit. Vis clita option in at.</p>
			</div>
			<div class="span6">
				<h4>Doming commune pertinacia quo ei, no nam lucilius rationibus. Ius ea dicunt appareat?</h4>
				<p>Facer utamur nec ea, in fugit dolores est, id pri nominavi assueverit interesset. In pri stet soleat recteque. Ad assueverit.</p>
			</div>
			<div class="span6">
				<h4>Dolor noster dissentiunt mea ne, inimicus conclusionemque usu id. Insolens oportere mel et?</h4>
				<p>Choro discere eu per, et deserunt interesset quaerendum vim. Esse aeque iisque eam ut, alii tincidunt id mel. Mei unum.</p>
			</div>
			<div class="span6">
				<h4>Docendi omittam officiis ne qui. Quo eu autem voluptatum, est an ludus congue?</h4>
				<p>Sit et vidit persius, mea te meis omnium denique, te decore fuisset corpora quo. Justo dicat explicari nec ei, eos.</p>
			</div>
			<div class="span6">
				<h4>Soluta ridens malorum quo cu, omnis democritum disputationi nam ex. Mei in sapientem?</h4>
				<p>Eos ipsum altera salutandi id, magna dicat putant in sit. Legendos efficiendi ad vix. His eruditi partiendo et, in pro.</p>
			</div>
			<div class="span6">
				<h4>Ei iudico audiam aperiri quo, pro at nulla affert. Ex natum zril mel?</h4>
				<p>Ubique deleniti intellegebat ex eos. Ex error doming sed, ex nam porro prompta phaedrum, vis congue altera at. Per no.</p>
			</div>
		</div><!-- span12 -->
	</div><!-- container -->
</div><!-- home-faq -->
</div>
