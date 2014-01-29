<h2><?php echo $unit->name;?></h2>
<form method="post" name="message" id="message" action="<?php echo base_url();?>index.php/message/compose">
	<input type=hidden name="user_id" value="<?php echo $unit->property_id;?>" />
	<a href="javascript: void()" onclick="document.getElementById('message').submit()">Send Message</a>
</form>
<ul>
	<li>Date Available: <?php echo $unit->date_available;?></li>
	<li>Bedrooms: <?php echo $unit->beds;?></li>
	<li>Baths: <?php echo $unit->baths;?></li>
	<li>Size: <?php echo $unit->size;?> sq.ft.</li>
	<li>Floor: <?php echo $unit->floor;?></li>
	<li>Furnished: <?php if($unit->furnished){echo 'yes';} else {echo 'no';}?></li>
	<li>Washer/Dryer: <?php echo $unit->washer;?></li>
	<li>Direction Facing: <?php echo $unit->direction;?></li>
	<li>Requirements:<br/><?php if(!property_exists($unit, 'requirements') || $unit->requirements == null || $unit->requirements == ''){echo 'none';} else {echo $unit->requirements;}?></li>
	<li>Specials:<br/><?php if(!property_exists($unit, 'specials') || $unit->specials == null || $unit->specials == ''){echo 'none';} else {echo $unit->specials;}?></li>
	<li>Commission: <?php if(!property_exists($unit, 'commission') || $unit->commission == null || $unit->commission == ''){echo 'none';} else {echo $unit->commission;}?></li>
</ul>

<table>
	<tr>
		<th>Lease Term</th>
		<th>Monthly Rent</th>
		<th>Deposit</th>
		<th>Pet Rent</th>
		<th>Pet Deposit</th>
	</tr>
	<?php foreach($terms as $term):?>
	<tr>
		<td><?php echo $term['term'];?></td>
		<td><?php echo $term['rent'];?></td>
		<td><?php echo $term['deposit'];?></td>
		<td><?php echo $term['pet_rent'];?></td>
		<td><?php echo $term['pet_deposit'];?></td>
	</tr>
	<?php endforeach;?>
</table>