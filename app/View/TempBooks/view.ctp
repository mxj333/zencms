<div class="tempBooks view">
<h2><?php echo __('Temp Book'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempBook['Category']['name'], array('controller' => 'categories', 'action' => 'view', $tempBook['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumbnail'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['thumbnail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wareid'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['wareid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cid'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['cid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Http Code'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['http_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Download Time'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['download_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tempBook['TempBook']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Temp Book'), array('action' => 'edit', $tempBook['TempBook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Temp Book'), array('action' => 'delete', $tempBook['TempBook']['id']), array(), __('Are you sure you want to delete # %s?', $tempBook['TempBook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Temp Books'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Book'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
