<h2>THIS IS ANOTHER TEST</h2>
<p>
	This is the KronoSource homepage.  Under construction, but coming very soon.
</p>

<?php 
	if (!$this->ion_auth->logged_in()) {
	echo '<p>Login:<br/>'.form_open('users/login')?>
		<label for="username">User Name</label><br/>
		<?php echo form_input('username');?><br/>
		<label for="password">Password</label><br/>
		<?php echo form_password('password');?><br/>
		<input type="submit" name="submit" value="log in" />
		</form>
	</p>
	
	<p>
		Unregistered?  Enter code below and click the submit button:<br/>
		<?php echo form_open('pages/register').form_input('regcode');?>
		<br/><input type="submit" name="submit_register" value="submit" />
		</form>
	</p>
<?php } 
	
	else if($the_user->group == 'locator'){
	
		echo '<p>Welcome, '.$the_user->first_name.'! You are logged in to KronoSource!<br/>
				<ul>
					<li><a href="/index.php/users/edit">Edit Profile</a></li>
					<li><a href="/index.php/users/logout">Logout</a></li>
					<li><a href="/index.php/locator/browseProperties">Browse</a></li>
					<li><a href="/index.php/locator/searchProperties">Search</a></li>
				</ul>
			</p>';
	
	}
	
	else if($the_user->group == 'property'){ 
		echo '<p>Welcome, '.$the_user->company.'! You are logged in to KronoSource!<br/>
			  	<ul>
			  		<li><a href="/index.php/users/edit">Edit Profile</a></li>
			  		<li><a href="/index.php/property/manage">Manage Property Information</a></li>
			  		<li><a href="/index.php/users/logout">Logout</a></li>
			  	</ul>
			  </p>';
	} ?>
