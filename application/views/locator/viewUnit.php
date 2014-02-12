<div class="container page-content view-unit"><div class="inner">
<h2 class="text-center"><?php echo $unit->name;?></h2>
<hr>
<div>
<a class="btn j-back pull-left"><i class="icon-caret-left"></i> back</a>
<form method="post" name="message" id="message" action="<?php echo base_url();?>index.php/message/compose">
	<input type=hidden name="user_id" value="<?php echo $unit->property_id;?>" />
	<a class="btn pull-right" href="javascript: void()" onclick="document.getElementById('message').submit()"><i class="icon-comments-alt"></i> Send Message</a>
</form>
</div>
<div class="row features-row">
<ul class="unit-features">
	<li><i class="icon-ok"></i> Available: <b><?php echo $unit->date_available;?></b></li>
	<li><i class="icon-ok"></i> Bedrooms: <b><?php echo $unit->beds;?></b></li>
	<li><i class="icon-ok"></i> Baths: <b><?php echo $unit->baths;?></b></li>
	<li><i class="icon-ok"></i> Size: <b><?php echo $unit->size;?> sq.ft.</b></li>
	<li><i class="icon-ok"></i> Floor: <b><?php echo $unit->floor;?></b></li>
	<li><i class="icon-ok"></i> Furnished: <b><?php if($unit->furnished){echo 'yes';} else {echo 'no';}?></b></li>
	<li><i class="icon-ok"></i> Washer/Dryer: <b><?php echo $unit->washer;?></b></li>
	<li><i class="icon-ok"></i> Direction Facing: <b><?php echo $unit->direction;?></b></li><br><hr>
	<li class="longer"><i class="icon-ok"></i> Requirements: <b><?php if(!property_exists($unit, 'requirements') || $unit->requirements == null || $unit->requirements == ''){echo 'none';} else {echo $unit->requirements;}?></b></li>
	<li class="longer"><i class="icon-ok"></i> Specials: <b><?php if(!property_exists($unit, 'specials') || $unit->specials == null || $unit->specials == ''){echo 'none';} else {echo $unit->specials;}?></b></li>
	<li class="longer"><i class="icon-ok"></i> Commission: <b><?php if(!property_exists($unit, 'commission') || $unit->commission == null || $unit->commission == ''){echo 'none';} else {echo $unit->commission;}?></b></li>
</ul>
</div>

<div class="row">
<table>
	<tr class="top-row">
		<th>Lease Term</th>
		<th>Monthly Rent</th>
		<th>Deposit</th>
		<th>Pet Rent</th>
		<th>Pet Deposit</th>
	</tr>
	<?php foreach($terms as $term):?>
	<tr class="fee-row">
		<td><?php echo $term['term'];?> months</td>
		<td>$<?php echo $term['rent'];?></td>
		<td>$<?php echo $term['deposit'];?></td>
		<td>$<?php echo $term['pet_rent'];?></td>
		<td>$<?php echo $term['pet_deposit'];?></td>
	</tr>
	<?php endforeach;?>
</table>
</div>
 
</div></div>