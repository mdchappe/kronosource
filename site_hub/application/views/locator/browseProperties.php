<h2>Properties List page <?php echo $page;?></h2>

<ul>
<?php
	foreach($properties as $property) :
?>
	<li>
		<a href="/index.php/locator/viewProperty/<?php echo $property['id'];?>">
			<?php echo $property['company'];?>
		</a><br/>
		<?php echo $property['city']." ".$property['zip']; ?>
	</li>

<?php endforeach?>
</ul>