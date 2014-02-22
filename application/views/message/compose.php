<div class="container page-content compose-message"><div class="inner">
<span class="validation-errors"></span>
<h2 class="text-center"><i class="icon-comments-alt"></i> New Message to <?php echo $message['from'];?></h2>
<hr>
<?php echo form_open('message/send');?>

	<label for="id">To: <?php echo $message['from'];?></label><br/>
	<input type="hidden" name="id" value="<?php echo $message['from_id'];?>" />
	<input type="hidden" name="referring" value="<?php echo $referring;?>" />
	<label for="subject">Subject: </label> <?php echo form_input('subject', $default_subject, 'required="required"');?><br/>
	<?php echo form_textarea($message_input);?><br/>
	<button class="btn black pull-right" type="submit" name="submit">send <i class='icon-caret-right'></i></button>
	<a class="btn cancel j-back pull-right moveleft"><i class="icon-trash"></i> discard draft</a>
</form> 

</div></div> 