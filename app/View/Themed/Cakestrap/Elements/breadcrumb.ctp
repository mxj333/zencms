<?php
$crumbs = $this->Html->getCrumbs(
	$this->Html->tag('li', '/', array(
		'class' => 'divider',
	))
);
?>
<li><a href="/"><span class="glyphicon glyphicon-home"></span> </a></li>
<?php if ($crumbs): ?>
<li><?php echo $crumbs; ?></li>
<?php endif; ?>