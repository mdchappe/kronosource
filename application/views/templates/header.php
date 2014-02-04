<html>

<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/kronos.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Abel|Rokkitt:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	
</head>

<body>
<div class="wrap">
 <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="/index.php/"><img src="http://www.frequencycreative.com/codeigniter/assets/img/kronosource_logo.png" /></a>
        <div class="nav-collapse collapse">
          
          <div class="pull-right nav">
          <?php 
			if (!$this->ion_auth->logged_in()) {
			echo '<p>'.form_open('users/login')?>
				<?php $username_opts = 'placeholder="Username"'; echo form_input('username', '', $username_opts);?>
				<?php $password_opts = 'placeholder="Password"'; echo form_password('password', '', $password_opts);?>
				<input class="btn btn-primary" type="submit" name="submit" value="log in" />
				</form>
			</p>
		
			<? if (isset($home)):?>
			<p class="unregistered">
				
				<?php if($this->session->flashdata('register')):
						
						echo $this->session->flashdata('register');
					  
					  else:
					  	
					  	echo 'Unregistered?  Enter code below and click the submit button:';
					  
					  endif ?>
					  
				<?php $registration_code_opts = 'placeholder="Registration Code"'; echo form_open('pages/register').form_input('regcode', $regcode, $registration_code_opts);?>
				<input class="btn btn-primary" type="submit" name="submit_register" value="register" />
				</form>
			</p>
			<?php endif;?>
		<?php } 
			
			else if($the_user->group == 'locator'){
			
				echo '<p class="welcome-user">Welcome, <span class="the-user">'.$the_user->display_name.'</span> ! You are logged in to KronoSource!<br/>
						<ul class="logged-in-nav">
							<li><a href="/index.php/message/inbox">Inbox</a></li>
							<li><a href="/index.php/users/edit">Edit Profile</a></li>
							<li><a href="/index.php/locator/browseProperties">Browse</a></li>
							<li><a href="/index.php/locator/searchProperties">Search</a></li>
							<li><a href="/index.php/users/logout">Logout</a></li>
						</ul>
					</p>';
			
			}
			
			else if($the_user->group == 'property'){ 
				echo '<p class="welcome-user">Welcome, <span class="the-user">'.$the_user->display_name.'</span> ! You are logged in to KronoSource!<br/>
					  	<ul class="logged-in-nav">
					  		<li><a href="/index.php/message/inbox">Inbox</a></li>
					  		<li><a href="/index.php/property/manage">Manage Property Information</a></li>
					  		<li><a href="/index.php/users/logout">Logout</a></li>
					  	</ul>
					  </p>';
			} ?>
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
	
	
	
	
