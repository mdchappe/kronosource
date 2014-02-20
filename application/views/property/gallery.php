<div class="container page-content">
<a class="btn black cp-btn" href="/index.php/property/manage"><i class="icon-caret-left"></i> back to property management</a>
<div class="inner">

	<?php
		if($status) {
			echo '<p>'.$status.'</p>';
		}
		
		if(isset($error)){
			print_r($error);
		}
		
		if($images):?>
		<ul>
		<?php foreach($images as $image):?>
			<li>
				<img src="<?php echo substr($image['filename'],0,-4).'_thumb'.substr($image['filename'],-4);?>"/><br/>
				<a href="javascript:void()" onclick="document.getElementById('delete_<?php echo $image['id'];?>').submit();">delete</a>
				<form name='delete_<?php echo $image['id'];?>' id='delete_<?php echo $image['id'];?>' method='post' action='<?php echo base_url();?>index.php/property/gallery_delete'>
				<input type="hidden" name="image_id" value="<?php echo $image['id'];?>" />
				<input type="hidden" name="type" value="<?php echo $type;?>" />
				<input type="hidden" name="id" value="<?php echo $id;?>" />
				<input type="hidden" name="php_path" value="<?php echo $image['php_path'];?>" />
				</form>
			</li>
		<?php endforeach;?>
		</ul>
	<?php endif;?>	
	
	<?php if($images && count($images) >= 5):?>
	
	<p>This gallery has the maximum number of images.  Please delete at least one before adding any more.</p>
	
	<?php else: 
		
		echo form_open_multipart('property/gallery').form_hidden('type',$type).form_hidden('id',$id).form_label('Upload new image:','userfile').form_upload('userfile').'<br/>'.form_submit('submit','save');
		
	endif; ?>
		
	
</div></div>