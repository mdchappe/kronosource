<!doctype html>
<html>

<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kronos.css" type="text/css" media="screen" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Abel|Rokkitt:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
</head>

<body><section id="wrap-section">
 <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" rel="tooltip" title="kronosource home" href="/index.php/">kronosource</a>
          
          <div class="pull-right nav">
          	  <div class="login-dropdown">
		          <?php 
		          	
					if (!$this->ion_auth->logged_in()) {
					echo form_open('users/login')?>
						<?php $username_opts = 'placeholder="Username"'. 'required="required"'; echo form_input('username', '', $username_opts);?>
						<?php $password_opts = 'placeholder="Password"'. 'required="required"'; echo form_password('password', '', $password_opts);?>
						<button class="btn black" type="submit" name="submit">log in <i class="icon-caret-right"></i></button><br>
						<span class="forgot-pw"><a href="<?base_url();?>pages/forgot">forgot your username or password?</a></span>
					</form>
				</div><!-- login-dropdown -->
					
			<a href="#contact-us" class="nav1-feedback">feedback</a>
			<a class="nav1-login">log in <i class="icon-caret-down"></i></a>
		
		<?php } 
			
			else if($the_user->group == 'locator'){
			
				echo '<p class="welcome-user wu-locator">'.$the_user->display_name.'&nbsp;&nbsp;<i class="icon-circle"></i></p>
						<ul class="logged-in-nav">
							<li><a href="/index.php/message/inbox"><i class="icon-comments-alt icon-2x"></i> 14</a></li>
							<li><a href="/index.php/users/edit">profile</a></li>
							<li><a href="/index.php/locator/browseProperties">browse</a></li>
							<li><a href="/index.php/locator/searchProperties">search</a></li>
							<li><a href="/index.php/users/logout">log out&nbsp;<i class="icon-caret-right"></i></a></li>
						</ul>';
			
			}
			
			else if($the_user->group == 'property'){ 
				echo '<p class="welcome-user wu-property">'.$the_user->display_name.'&nbsp;&nbsp;<i class="icon-circle"></i></p>
					  	<ul class="logged-in-nav">
					  		<li><a href="/index.php/message/inbox"><i class="icon-comments-alt icon-2x"></i> 14</a></li>
					  		<li><a href="/index.php/property/manage">manage</a></li>
					  		<li><a href="/index.php/users/logout">log out&nbsp;&nbsp;<i class="icon-caret-right"></i></a></li>
					  	</ul>
					  	';
			} else if($the_user->group == 'admin'){
				echo '<p class="welcome-user wu-admin">admin&nbsp;&nbsp;<i class="icon-circle"></i></p>
					  	<ul class="logged-in-nav">
					  		<li><a href="/index.php/message/inbox"><i class="icon-comments-alt icon-2x"></i> 14</a></li>
					  		<li><a href="/index.php/admin/controlPanel">admin</a></li>
					  		<li><a href="/index.php/users/logout">log Out <i class="icon-caret-right"></i></a></li>
					  	</ul>';
			}
			?>
			</div>
		</div>
      </div>
    </div>
  </div>
  
 <?php if($this->session->flashdata('login')){ echo '<p>'.$this->session->flashdata('login').'</p>'; }?>
