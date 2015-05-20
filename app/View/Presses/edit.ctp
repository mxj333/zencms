<div class="presses form">
<?php echo $this->Form->create('Press'); ?>
	<fieldset>
		<legend><?php echo __('Edit Press'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('introduction');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Press.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Press.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Presses'), array('action' => 'index')); ?></li>
	</ul>
</div>
