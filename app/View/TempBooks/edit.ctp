<div class="tempBooks form">
<?php echo $this->Form->create('TempBook'); ?>
	<fieldset>
		<legend><?php echo __('Edit Temp Book'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('thumbnail');
		echo $this->Form->input('wareid');
		echo $this->Form->input('cid');
		echo $this->Form->input('name');
		echo $this->Form->input('path');
		echo $this->Form->input('http_code');
		echo $this->Form->input('message');
		echo $this->Form->input('download_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TempBook.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TempBook.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Books'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
