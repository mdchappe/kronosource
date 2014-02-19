<div class="home-wrapper container page-content">
	<h2>KronoSource Announcement Update</h2>
	
	<?php echo form_open('admin/edit_announcement').form_hidden('id',$announcement['id']);
		  echo form_label('Announcement Content: ','announcement').form_textarea('announcement',$announcement['announcement']).'<br/>';
		  echo form_label('Visibility: ','user').form_dropdown('user',$type_dropdown,$announcement['user']).'<br/>';
		  echo form_label('Show Until: ','expiration').form_input($date_input).'<br/>';
		  echo form_submit('submit','Update Announcement').form_close();
	?>
</div>