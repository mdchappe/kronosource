<h2>Compose New Message</h2>

<?php echo form_open('message/send');?>

	<label for="id">To: <?php echo $message['from'];?></label><br/>
	<input type="hidden" name="id" value="<?php echo $message['from_id'];?>" />
	<label for="subject">Subject:</label> <?php echo form_input('subject', $default_subject);?><br/>
	<label for="message">Message:</label><?php echo form_textarea($message_input);?><br/>
	<input type="submit" name="submit" value="send" />
</form> 