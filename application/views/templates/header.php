<html>

<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kronos.css" type="text/css" media="screen" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Abel|Rokkitt:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/x-icon">
	
</head>

<body>
<div class="wrap">
 <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="/index.php/"><img src="<?php echo base_url();?>assets/img/kronosource_logo.png" /></a>
        <div class="nav-collapse collapse">
          
          <div class="pull-right nav">
          <?php 
          	
			if (!$this->ion_auth->logged_in()) {
			echo '<p>'.form_open('users/login')?>
				<?php $username_opts = 'placeholder="Username"'. 'required="required"'; echo form_input('username', '', $username_opts);?>
				<?php $password_opts = 'placeholder="Password"'. 'required="required"'; echo form_password('password', '', $password_opts);?>
				<button class="btn" type="submit" name="submit">sign in <i class="icon-caret-right"></i></button>
				</form>
			</p>
		
			<? if (isset($home)):?>
			<p class="unregistered">
				
				<?php if($this->session->flashdata('register')):
						
						echo $this->session->flashdata('register');
					  
					  else:
					  	
					  	echo 'Unregistered?  Enter code below and click the submit button:';
					  
					  endif ?>
					  
				<?php $registration_code_opts = 'placeholder="Registration Code"'. 'required="required"'; echo form_open('pages/register').form_input('regcode', $regcode, $registration_code_opts);?>
				<button class="btn" type="submit" name="submit_register">register <i class="icon-caret-right"></i></button>
				</form>
			</p>
			<?php endif;?>
		<?php } 
			
			else if($the_user->group == 'locator'){
			
				echo '<p class="welcome-user">Welcome,&nbsp; <span class="the-user"> <i class="icon-user"></i> '.$the_user->display_name.'</span> ! You are logged in to KronoSource!<br/>
						<ul class="logged-in-nav">
							<li><a href="/index.php/message/inbox"><i class="icon-comments-alt"></i> Messages</a></li>
							<li><a href="/index.php/users/edit"><i class="icon-pencil"></i> Edit Profile</a></li>
							<li><a href="/index.php/locator/browseProperties"><i class="icon-search"></i> Browse</a></li>
							<li><a href="/index.php/locator/searchProperties"><i class="icon-zoom-in"></i> Search</a></li>
							<li><a href="/index.php/users/logout">Sign Out <i class="icon-signout"></i></a></li>
						</ul>
					</p>';
			
			}
			
			else if($the_user->group == 'property'){ 
				echo '<p class="welcome-user">Welcome,&nbsp; <span class="the-user"> <i class="icon-user"></i> '.$the_user->display_name.'</span> ! You are logged in to KronoSource!<br/>
					  	<ul class="logged-in-nav">
					  		<li><a href="/index.php/message/inbox"><i class="icon-comments-alt"></i> Messages</a></li>
					  		<li><a href="/index.php/property/manage"><i class="icon-cog"></i> Property Management</a></li>
					  		<li><a href="/index.php/users/logout">Sign Out <i class="icon-signout"></i></a></li>
					  	</ul>
					  </p>';
			} else if($the_user->group == 'admin'){
				echo '<p class="welcome-user">Welcome,&nbsp; <span class="the-user"> <i class="icon-user"></i> MASTER</span>! You are logged in to KronoSource!<br/>
					  	<ul class="logged-in-nav">
					  		<li><a href="/index.php/message/inbox"><i class="icon-comments-alt"></i> Messages</a></li>
					  		<li><a href="/index.php/admin/controlPanel"><i class="icon-cog"></i> Admin Control Panel</a></li>
					  		<li><a href="/index.php/users/logout">Sign Out <i class="icon-signout"></i></a></li>
					  	</ul>
					  </p>';
			}
			?>
			</div>

        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

	<!--
<?php if($this->ion_auth->logged_in()){ ?>
	<a href="/index.php/users/logout" style="position:fixed;top:10px;right:10px;">Logout</a>
	<?php } ?>
-->
	
	
	
	
