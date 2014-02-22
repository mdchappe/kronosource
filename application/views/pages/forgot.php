<div class="container page-content register-wrap">
	<div class="inner">
		<?php echo '<span>'.$status.'</span>';?>
			<h2>KronoSource Forgot Username or Password</h2>
			<hr>
			<?php
			echo form_open('pages/send_username').form_label('Email: ','email').form_input('email').form_submit('username','Recover Username').form_close().'<hr>';
			echo form_open('pages/forgot_password').form_label('Username: ','username').form_input('username').form_submit('password','Reset Password').form_close();
		?>
	</div>
</div>