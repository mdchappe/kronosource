<div class="container page-content message-inbox"><div class="inner">
<h2 class="text-center"><i class="icon-comments-alt"></i> Messages</h2>
<hr>
<span><?php echo $status;?></span>
<table>
	<tr class="top-row">
		<th class="from">From</th>
		<th>Subject</th>
		<th class="sent-on">Received</th>
	</tr>
	
	<?php 
		
		$message_count = 0; 
		
		foreach($messages as $message) : ?>
	<tr class="message-row">
		<td class="from"><?php echo $message['from'];?></td>
		<td class="subject">
			<form class="dynamic-subject" method="post" name="<?php echo 'form_'.$message_count;?>" action="<?php echo base_url().'index.php/message/read';?>" id="<?php echo 'form_'.$message_count;?>">
				<input type="hidden" name="message_id" value="<?php echo $message['message_id']?>">
				<a <?php if($message['read'] == 0){echo 'class="new"';}?> href="javascript: void()" onclick="document.getElementById('<?php echo 'form_'.$message_count;?>').submit()"><?php echo $message['subject'];?></a>
			</form>
		</td>
		<td class="sent-on"><?php echo $message['sent_on'];?></td>
	</tr>
	
	<?php 
		$message_count++;
		
		endforeach;?>
</table>
	
</div></div>