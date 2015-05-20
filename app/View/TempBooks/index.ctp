<div class="tempBooks index">
	<h2><?php echo __('Temp Books'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('thumbnail'); ?></th>
			<th><?php echo $this->Paginator->sort('wareid'); ?></th>
			<th><?php echo $this->Paginator->sort('cid'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('http_code'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('download_time'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tempBooks as $tempBook): ?>
	<tr>
		<td><?php echo h($tempBook['TempBook']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tempBook['Category']['name'], array('controller' => 'categories', 'action' => 'view', $tempBook['Category']['id'])); ?>
		</td>
		<td><?php echo h($tempBook['TempBook']['thumbnail']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['wareid']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['cid']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['name']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['path']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['http_code']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['message']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['download_time']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['created']); ?>&nbsp;</td>
		<td><?php echo h($tempBook['TempBook']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tempBook['TempBook']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tempBook['TempBook']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tempBook['TempBook']['id']), array(), __('Are you sure you want to delete # %s?', $tempBook['TempBook']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Temp Book'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
