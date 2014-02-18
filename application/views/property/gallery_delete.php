<form name="deleted" id="deleted" method="post" action="<?php echo base_url()?>index.php/property/gallery">
<input type="hidden" name="type" value="<?php echo $type?>" />
<input type="hidden" name="id" value="<?php echo $id?>" />
</form>

<script>
document.getElementById('deleted').submit();
</script>