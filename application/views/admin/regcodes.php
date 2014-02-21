<div class="register-wrap container page-content"><div class="inner">
<a class="btn black cp-btn" href="/index.php/admin/controlPanel"><i class="icon-caret-left"></i> back to control panel</a>
<span class="validation-errors"></span>
	<h2 class="text-center">registration code administration</h2>
	<hr>
	<?php if(isset($status)){echo '<p class="good-code">'.$status.'</p>';}?>
	<?php $reg_opts = 'required="required"' ?>
	<?php echo form_open('admin/regcodes/add');?>
		<h3>Add New Registration Code</h3>
		<label for="code"><span id="random" class="gen btn">generate code <i class="icon-caret-right"></i></span></label><?php echo form_input(array('id'=>'code','name'=>'code'));?><br/>
		<label for="type">Account Type&nbsp;:&nbsp;</label><?php echo form_dropdown('type',$type_dropdown);?><br/>
		<label for="exp">Code Expiration Date&nbsp;:&nbsp;</label><?php echo form_input($date_input,'', $reg_opts);?><br/>
		<label for="acct_exp">Account Expiration Date&nbsp;:&nbsp;</label><?php echo form_input($date_input_2,'', $reg_opts);?><br/><br>
		<button class="btn pull-right black" type="submit" name="submit">add registration code <i class="icon-caret-right"></i></button>
	<?php echo form_close();?>
	<br><hr>
	
	<table>
		<tr class="top-row">
			<th>Code</th>
			<th>Account Type</th>
			<th>Code Expiration Date</th>
			<th>Account Expiration Date</th>
			<th>Deactivate</th>
		</tr>
	<?php 
		
		$delete_count = 0;
		
		foreach($regcodes as $regcode): ?>
		<tr class="account-row">
			<td><?php echo $regcode['code'];?></td>
			<td><?php echo $regcode['usertype'];?></td>
			<td><?php echo $regcode['code_expiration'];?></td>
			<td><?php echo $regcode['account_expiration'];?></td>
			<td><?php echo form_open('admin/regcodes/deactivate', '', array('deactivate_id' => $regcode['id']));?>
				<button class="cancel btn" type="submit" name="subnmit_<?php echo $delete_count?>">deactivate <i class="icon-caret-right"></i></form></td>
		</tr>
		
		<?php $delete_count += 1;
		
		endforeach; ?>
	
	</table>
</div></div>
