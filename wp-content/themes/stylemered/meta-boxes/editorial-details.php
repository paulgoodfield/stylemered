<?php
foreach( $attachments as $a )
{
?>
<div class="row clearfix">
	<label>Current PDF</label>
	<a href="<?php echo wp_get_attachment_url( $a->ID ); ?>" rel="external"><?php echo basename( wp_get_attachment_url( $a->ID ) ); ?></a>
</div>
<?php } ?>

<div class="row clearfix">
	<label for="download">PDF Download</label>
	<input type="file" name="download" id="download">
</div>