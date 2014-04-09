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
				
				<?php echo form_open('payment/pay'); ?>
				<label for="months">Months to renew at $<?php echo $rate;?>/month:</label>
				<?php echo form_input('months',6);?> <button type="submit" name="submit">renew</button>
				</form>
				
			</div>
		</div>
	</div>
</div>
