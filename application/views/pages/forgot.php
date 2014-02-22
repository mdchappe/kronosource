<div class="container page-content register-wrap">
<a class="btn black j-back cp-btn"><i class="icon-caret-left"></i> back to home page</a>
	<div class="inner">
		<?php echo '<span class="error">'.$status.'</span>';?>
		<br>
			<h2 class="text-center">recover login info</h2>
			<hr>
			<?php
			echo form_open('pages/send_username').form_label('Email&nbsp;:&nbsp;','email').form_input('email','','required="required"').form_submit('username','Recover Username','class="btn black recover-btn"').form_close().'<hr>';
			echo form_open('pages/forgot_password').form_label('Username&nbsp;:&nbsp;','username').form_input('username','','required="required"').form_submit('password','Reset Password','class="btn black recover-btn"').form_close();
		?>
	</div>
</div>