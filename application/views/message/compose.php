<div class="container page-content compose-message"><div class="inner">
<br>
<h2 class="text-center">Compose New Message</h2>
<hr>
<?php echo form_open('message/send');?>

	<label for="id">To: <?php echo $message['from'];?></label><br/>
	<input type="hidden" name="id" value="<?php echo $message['from_id'];?>" />
	<label for="subject">Subject:</label> <?php echo form_input('subject', $default_subject);?><br/>
	<label for="message">Message:</label><?php echo form_textarea($message_input);?><br/>
	<input type="submit" name="submit" value="send" />
</form> 

</div></div>