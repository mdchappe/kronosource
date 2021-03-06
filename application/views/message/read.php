<div class="container page-content message-inbox">
<a class="btn black cp-btn" href="/index.php/message/inbox"><i class="icon-caret-left"></i> back to messages</a>
<div class="inner">
<span class="validation-errors"></span>
<h2 class="text-center"><i class="icon-comments-alt"></i> <?php echo $message['subject'];?></h2>
<hr>
<div class="header-info">
		
			To: <?php echo $message['to']?> (Me)
		
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
	<a class="btn black reply-btn" href="javascript: void()" onclick="document.getElementById('reply').submit()">Reply <i class="icon-caret-right"></i></a>
</form>
</div></div> 