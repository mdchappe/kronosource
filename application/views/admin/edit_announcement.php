<div class="register-wrap container page-content">
<a class="btn black cp-btn" href="/index.php/admin/announcements"><i class="icon-caret-left"></i> back</a>
<div class="inner">
<br>
	<h2 class="text-center">KronoSource Announcement Update</h2>
	<hr>
	
	<?php $reg_opts = 'required="required"';
		  echo form_open('admin/edit_announcement').form_hidden('id',$announcement['id']);
		  $al_options = array('class' => 'announce-label'); 
		  echo form_label('Announcement Content&nbsp;:&nbsp;','announcement', $al_options).form_textarea('announcement',$announcement['announcement'],'required="required" id="announcement-ta"').'<br>';
		  echo form_label('Visibility&nbsp;:&nbsp;','user').form_dropdown('user',$type_dropdown,$announcement['user']).'<br/>';
		  echo form_label('Show Until&nbsp;:&nbsp;','expiration').form_input($date_input,'',$reg_opts).'<br/>';
		  echo '<button class="black btn pull-right" type="submit">Save Announcement <i class="icon-caret-right"></i></button>';
		  echo form_close();
	?>
</div></div>