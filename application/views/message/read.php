<div class="container page-content message-inbox"><div class="inner">
<br>
<p>To: <a href="<?php base_url().'index.php/message/compose/'.$message['to_id'];?>"><?php echo $message['to']?></a></p>
<p>From: <a href="<?php base_url().'index.php/message/compose/'.$message['from_id'];?>"><?php echo $message['from']?></a></p>
<p>Subject: <?php echo $message['subject'];?></p>
<p><?php echo nl2br($message['message']);?></p>
<form method="post" name="reply" id="reply" action="<?php echo base_url();?>index.php/message/compose">
	<input type=hidden name="message_id" value="<?php echo $message['message_id'];?>" />
	<a href="javascript: void()" onclick="document.getElementById('reply').submit()">Reply</a>
</form>
<form method="post" name="delete" id="delete" action="<?php echo base_url();?>index.php/message/delete">
	<input type=hidden name="id" value="<?php echo $message['message_id'];?>" />
	<a href="javascript: void()" onclick="document.getElementById('delete').submit()">Delete</a>
</form>
</div></div>