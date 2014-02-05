<div class="container page-content compose-message"><div class="inner">
<h2 class="text-center"><i class="icon-comments-alt"></i> New Message to <?php echo $message['from'];?></h2>
<hr>
<?php echo form_open('message/send');?>

	<label for="id">To: <?php echo $message['from'];?></label><br/>
	<input type="hidden" name="id" value="<?php echo $message['from_id'];?>" />
	<label for="subject">Subject: </label> <?php echo form_input('subject', $default_subject);?><br/>
	<label for="message">Message: </label><?php echo form_textarea($message_input);?><br/>
	<button class="btn pull-right" type="submit" name="submit"><i class='icon-reply'></i> send</button>
</form> 

</div></div> 