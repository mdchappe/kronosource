<div class="container page-content">
	<div class="edit-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center">Renew Account</h2>
		<hr>
		<div class="row">
			<div class="content">
				<?php if(isset($status)):?>
				<span><?php echo $status;?></span>
				<?php endif;?>
				<h3>Billing Information</h3>
				<?php echo form_open('payment/pay'); ?>
                <label for="first_name">First Name:</label>
                <?php echo form_input('first_name');?><br/>
                <label for="last_name">Last Name:</label>
                <?php echo form_input('last_name');?><br/>
                <label for="street">Street:</label>
                <?php echo form_input('street');?><br/>
                <label for="city">City:</label>
                <?php echo form_input('city');?><br/>
                <label for="state">State:</label>
                <?php echo form_input('state');?>
                <label for="zip">Zip:</label>
                <?php echo form_input('zip');?><br/>
				<label for="months">Months to renew at $<?php echo $rate;?>/month:</label>
				<?php echo form_input('months',6);
                      echo form_hidden('rate',$rate);?>
                <button type="submit" name="submit">renew</button>
				</form>
				
			</div>
		</div>
	</div>
</div>