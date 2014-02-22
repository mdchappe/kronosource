<div class="container page-content register-wrap">
	<div class="inner">
		<a class="btn black cp-btn" href="/index.php/admin/controlPanel"><i class="icon-caret-left"></i> back to control panel</a>
		<h2 class="text-center">Update Password</h2>
		<hr>
		<?php
			if(isset($status)) {
				echo '<p class="error">'.$status.'</p>';
			}
			 
			echo form_open('admin/password');?>
					<label for="password">Enter New Password&nbsp;:&nbsp;</label>
					<?php echo form_password('password','','required="required"');?><br/>
					<label for="verify">Re-enter New Password&nbsp;:&nbsp;</label>
					<?php echo form_password('verify','','required="required"');?><br><br>
					<button type="submit" name="submit" class="btn black pull-right">update password <i class="icon-caret-right"></i></button>			
				</fieldset>
		</form>
	</div>
</div>