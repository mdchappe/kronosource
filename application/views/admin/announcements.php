<div class="register-wrapper container page-content"><div class="inner"></div>
	<h2>KronoSource Announcements Administration</h2>
	
	<?php if(isset($status)){echo '<p>'.$status.'</p>';}?>
	
	<h3>Add New Announcement</h3>
	<?php echo form_open('admin/add_announcement');
		  echo form_label('Announcement Content: ','announcement').form_textarea('announcement').'<br/>';
		  echo form_label('Visibility: ','user').form_dropdown('user',$type_dropdown).'<br/>';
		  echo form_label('Show Until: ','expiration').form_input($date_input).'<br/>';
		  echo form_submit('submit','Save Announcement').form_close();;
	?>
	
	<h3>Current Announcements</h3>
	
	<?php if($announcements):?>
			<table>
		<tr>
			<th>Anouncement</th>
			<th>User Group</th>
			<th>Expiration</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php foreach($announcements as $announcement): ?>
				<tr>
					<td><?php echo $announcement['announcement'];?></td>
					<td><?php echo $announcement['user'];?></td>
					<td><?php echo $announcement['expiration'];?></td>
					<td><?php echo form_open('admin/edit_announcement',array('id'=>'edit_'.$announcement['id'])).form_hidden('id',$announcement['id']).form_close();?>
						<a href="javascript:void();" onclick="document.getElementById('edit_<?php echo $announcement['id'];?>').submit();">edit</a></td>
						<td><?php echo form_open('admin/delete_announcement',array('id'=>'delete_'.$announcement['id'])).form_hidden('id',$announcement['id']).form_close();?>
						<a href="javascript:void();" onclick="document.getElementById('delete_<?php echo $announcement['id'];?>').submit();">delete</a></td>
				</tr>
				<?php endforeach;
			
			else:
			echo '<p>no announcements</p>';

	endif;?>
	</table>
</div></div>