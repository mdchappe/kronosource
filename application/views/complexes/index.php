<?php foreach ($complexes as $complex): ?>
	
	<a href="<?php echo $complex['id']?>">
		<h2><?php echo $complex['name'] ?></h2>
	</a>
	<div class="info">
		<p class="address"><?php echo $complex['address'] ?></p>
		<p class="description"><?php echo $complex['description'] ?></p>
	</div>
	
<?php endforeach ?>