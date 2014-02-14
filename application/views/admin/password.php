<div class="container page-content home-wrapper">
	<div class="inner">
		
		<?php
			if(isset($status)) {
				echo '<p>'.$status.'</p>';
			}
			 
			echo form_open('admin/password');
				echo form_fieldset('Update Password');?>
					<label for="password">Enter New Password</label>
					<?php echo form_password('password','','required="required"');?><br/>
					<label for="verify">Re-enter New Password</label>
					<?php echo form_password('verify','','required="required"');?><br/>
					<input type="submit" name="submit" value="Update" />
				</fieldset>
		</form>
	</div>
</div>