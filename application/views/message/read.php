<div class="container page-content message-inbox"><div class="inner">
<h2 class="text-center"><i class="icon-comments-alt"></i> <?php echo $message['subject'];?></h2>
<hr>
<div class="header-info">
	<p>
		<form method="post" name="message_to" id="message_to" action="<?php echo base_url();?>index.php/message/compose">
			<input type=hidden name="user_id" value="<?php echo $message['to_id'];?>" />
			To: <a href="javascript:void()" onclick="document.getElementById('message_to').submit()"><?php echo $message['to']?></a>
		</form>
	</p>
	<p>
		<form method="post" name="message_from" id="message_from" action="<?php echo base_url();?>index.php/message/compose">
			<input type=hidden name="user_id" value="<?php echo $message['from_id'];?>" />
			From: <a href="javascript:void()" onclick="document.getElementById('message_from').submit()"><?php echo $message['from']?></a>
		</form>
	</p>
	<p>Subject: <?php echo $message['subject'];?></p>
	<p>Sent on: <?php echo $message['sent_on'];?></p>
</div>

<p class="message"><?php echo nl2br($message['message']);?></p>

<form method="post" name="delete" id="delete" action="<?php echo base_url();?>index.php/message/delete">
	<input type=hidden name="id" value="<?php echo $message['message_id'];?>" />
	<a class="btn cancel" href="javascript: void()" onclick="document.getElementById('delete').submit()"><i class="icon-trash"></i> Delete</a>
</form>
<form method="post" name="reply" id="reply" action="<?php echo base_url();?>index.php/message/compose">
	<input type=hidden name="message_id" value="<?php echo $message['message_id'];?>" />
	<a class="btn reply-btn" href="javascript: void()" onclick="document.getElementById('reply').submit()"><i class="icon-reply"></i> Reply</a>
</form>
</div></div> 