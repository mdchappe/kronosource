<div class="register-wrap container page-content">
<a class="btn black cp-btn" href="/index.php/admin/controlPanel"><i class="icon-caret-left"></i> back to control panel</a>
<div class="inner">
<span class="validation-errors"><br></span>
	<h2 class="text-center">Announcements Administration</h2>
	<hr>
	<?php if(isset($status)){echo '<p class=error>'.$status.'</p>';}?>
	
	<h3>Add New Announcement</h3>
	<?php $reg_opts = 'required="required"';
		  echo form_open('admin/add_announcement');
		  $al_options = array('class' => 'announce-label'); 
		  echo form_label('Announcement Content&nbsp;:&nbsp;','announcement', $al_options).form_textarea('announcement','','required="required" id="announcement-ta"').'<br/>';
		  echo form_label('Visibility&nbsp;:&nbsp;','user').form_dropdown('user',$type_dropdown, 'id="announcement-dd"').'<br/>';
		  echo form_label('Show Until&nbsp;:&nbsp;','expiration').form_input($date_input,'',$reg_opts).'<br/>';
		  echo '<button class="black btn pull-right" type="submit">Save new Announcement <i class="icon-caret-right"></i></button>';
		  echo form_close();
	?>
	<br><br>
	<hr>
	<h3>Current Announcements</h3>
	
	<?php if($announcements):?>
			<table>
		<tr class="top-row">
			<th>Anouncement</th>
			<th>User Group</th>
			<th>Expiration</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php foreach($announcements as $announcement): ?>
				<tr class="announce-row">
					<td><?php echo $announcement['announcement'];?></td>
					<td><?php echo $announcement['user'];?></td>
					<td><?php echo $announcement['expiration'];?></td>
					<td><?php echo form_open('admin/edit_announcement',array('id'=>'edit_'.$announcement['id'])).form_hidden('id',$announcement['id']).form_close();?>
						<a class="just-icon" href="javascript:void();" onclick="document.getElementById('edit_<?php echo $announcement['id'];?>').submit();"><i class="icon-pencil icon-large"></i></a></td>
						<td><?php echo form_open('admin/delete_announcement',array('id'=>'delete_'.$announcement['id'])).form_hidden('id',$announcement['id']).form_close();?>
						<a class="just-icon cancel" href="javascript:void();" onclick="document.getElementById('delete_<?php echo $announcement['id'];?>').submit();"><i class="icon-trash icon-large"></i></a></td>
				</tr>
				<?php endforeach;
			
			else:
			echo '<p>no announcements</p>';

	endif;?>
	</table>
</div></div>