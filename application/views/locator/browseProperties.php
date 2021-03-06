<div class="container page-content browse-wrap">
	<div class="browse-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center">Browse Properties</h2>
		<hr>
		
		<ul class="browse-listings">
		<?php
			foreach($properties as $property) :
		?>
			<li class="browse-listing" style="display:block; clear:both;">
				<a href="/index.php/locator/viewProperty/<?php echo $property['id'];?>">
					<img src="<?php echo substr_replace($property['file_name'], '_thumb', -4, 0);?>" style="width:80px;height:80px;float:left;" />
					<h4><?php echo $property['company'];?></h4>
				</a><br/>
				<?php echo $property['management']; ?><br/>
				<?php echo $property['street']; ?><br/>
				<?php echo $property['city'].", ".$property['state']." ".$property['zip']; ?>
			</li>
		
		<?php endforeach?>
		</ul>
	</div>
</div>