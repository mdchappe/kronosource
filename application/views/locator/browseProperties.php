<div class="container browse-wrap white-gradient">
	<div class="browse-inner">
		<h2 class="text-center">Properties List page <?php echo $page+1;?></h2>
		
		<ul class="browse-listings">
		<?php
			foreach($properties as $property) :
		?>
			<li class="browse-listing" style="display:block; clear:both;">
				<a href="/index.php/locator/viewProperty/<?php echo $property['id'];?>">
					<img src="<?php echo substr_replace($property['file_name'], '_thumb', -4, 0);?>" style="width:80px;height:80px;float:left;" />
					<?php echo $property['company'];?>
				</a><br/>
				<?php echo $property['management']; ?><br/>
				<?php echo $property['street']; ?><br/>
				<?php echo $property['city'].", ".$property['state']." ".$property['zip']; ?>
			</li>
		
		<?php endforeach?>
		</ul>
	</div>
</div>