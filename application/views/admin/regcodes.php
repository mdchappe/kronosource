<div class="home-wrapper container page-content">
	<h2>KronoSource Registration Code Administration</h2>
	
	<?php if(isset($status)){echo '<p>'.$status.'</p>';}?>
	
	<?php echo form_open('admin/regcodes/add');?>
		<h3>Add New Registration Code</h3>
		<label for="code">Code</label><?php echo form_input(array('id'=>'code','name'=>'code'));?><span id="random"> Generate Random 8-Digit Code</span><br/>
		<label for="type">Account Type</label><?php echo form_dropdown('type',$type_dropdown);?><br/>
		<label for="exp">Expiration Date</label><?php echo form_input($date_input);?><br/>
		<input type="submit" name="submit" value="Add Code" />
	<?php echo form_close();?>
	
	<table>
		<tr>
			<th>Code</th>
			<th>Account Type</th>
			<th>Expiration Date</th>
			<th>Deactivate</th>
		</tr>
	<?php 
		
		$delete_count = 0;
		
		foreach($regcodes as $regcode): ?>
		<tr>
			<td><?php echo $regcode['code'];?></td>
			<td><?php echo $regcode['usertype'];?></td>
			<td><?php echo $regcode['expiration'];?></td>
			<td><?php echo form_open('admin/regcodes/deactivate', '', array('deactivate_id' => $regcode['id']));?>
				<input type="submit" name="subnmit_<?php echo $delete_count?>" value="Deactivate" /></form></td>
		</tr>
		
		<?php $delete_count += 1;
		
		endforeach; ?>
	
	</table>
</div>