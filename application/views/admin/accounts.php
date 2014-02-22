<div class="register-wrap container page-content account-page"><div class="inner">
<a class="btn black cp-btn" href="/index.php/admin/controlPanel"><i class="icon-caret-left"></i> back to control panel</a>
<span class="validation-errors"></span>
	<h2 class="text-center"><?echo $title;?></h2>
	<hr>
	<?php if(isset($status)){echo '<p class="error">'.$status.'</p>';}?>
	
	<table>
		<tr class="top-row">
			<th>Account Type</th>
			<th>Display Name</th>
			<th>Company</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Active</th>
			<th>Disable</th>
			<th>Expiration</th>
			<th>Extend</th>
		</tr>
		
		<?php 
			
			foreach($accounts as $account):?>
				
				<tr class="account-row">
					<td><?php echo $account['description'];?></td>
					<td>
						<form method="post" name="message_<?php echo $account['user_id']?>" id="message_<?php echo $account['user_id']?>" action="<?php echo base_url();?>index.php/message/compose">
							<input type=hidden name="user_id" value="<?php echo $account['user_id'];?>" />
							<a href="javascript: void()" onclick="document.getElementById('message_<?php echo $account['user_id']?>').submit()"><?php echo $account['display_name'];?></a>
						</form>
					</td>
					<td><?php echo $account['company'];?></td>
					<td><a href="tel:<?php echo $account['phone'];?>"><?php echo $account['phone'];?></a></td>
					<td><a href="mailto:<?php echo $account['email'];?>"><?php echo $account['email'];?></a></td>
					<td><?php if($account['active']){echo '<i class="icon-ok"></i>';} else {echo '<i class="icon-warning-sign"></i>';}?></td>
					<td><?php if($account['active']):
						echo form_open('admin/accounts/disable_account','',array('id'=>$account['user_id']));?>
							<button class="account cancel btn" name="submit_<?php echo $account['user_id']?>"type="submit">disable</button>
						
						<?php else:
						echo form_open('admin/accounts/enable_account','',array('id'=>$account['user_id']));?>
							<button class="account black btn" name="submit_<?php echo $account['user_id']?>" type="submit">enable</button>
						
						<?php endif;
							
						echo form_close();
						echo form_open('admin/accounts/delete_account','',array('id'=>$account['user_id']));?>
							<button class="account cancel btn" name="delete_<?php echo $account['user_id']?>"type="submit">delete</button>
						</form>
					</td>
					<td><?php echo $account['expiration'];?></td>
					<td><?php echo form_open('admin/accounts/expiration','',array('id'=>$account['user_id'])).form_input($date_input);?><button class="black update btn" name="date_<?php echo $account['user_id']?>" type="submit">update</button></form></td>
				</tr>
				
				
		<?php 
			endforeach; ?>
	</table>
</div></div>