<div class="home-wrapper container page-content">
	<h2><?echo $title;?></h2>
	
	<?php if(isset($status)){echo '<p>'.$status.'</p>';}?>
	
	<table>
		<tr>
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
				
				<tr>
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
					<td><?php if($account['active']){echo 'yes';} else {echo 'no';}?></td>
					<td><?php if($account['active']):
						echo form_open('admin/accounts/disable_account','',array('id'=>$account['user_id']));?>
						<input name="submit_<?php echo $account['user_id']?>" value="Disable" type="submit"/>
						
						<?php else:
						echo form_open('admin/accounts/enable_account','',array('id'=>$account['user_id']));?>
						<input name="submit_<?php echo $account['user_id']?>" value="Enable" type="submit"/>
						
						<?php endif;?>
						</form>
					</td>
					<td><?php echo $account['expiration'];?></td>
					<td><?php echo form_open('admin/accounts/expiration','',array('id'=>$account['user_id'])).form_input($date_input);?><input name="date_<?php echo $account['user_id']?>" value="Update" type="submit"/></form></td>
				</tr>
				
		<?php 
			endforeach; ?>
	</table>
</div>