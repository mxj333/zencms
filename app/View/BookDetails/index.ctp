<div class="bookDetails index">
	<h2><?php echo __('Book Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('thumbnail'); ?></th>
			<th><?php echo $this->Paginator->sort('wareid'); ?></th>
			<th><?php echo $this->Paginator->sort('cid'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('pressid'); ?></th>
			<th><?php echo $this->Paginator->sort('author_id'); ?></th>
			<th><?php echo $this->Paginator->sort('translator'); ?></th>
			<th><?php echo $this->Paginator->sort('drawing'); ?></th>
			<th><?php echo $this->Paginator->sort('isbn'); ?></th>
			<th><?php echo $this->Paginator->sort('revision'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('packing'); ?></th>
			<th><?php echo $this->Paginator->sort('folio'); ?></th>
			<th><?php echo $this->Paginator->sort('publication_time'); ?></th>
			<th><?php echo $this->Paginator->sort('printing_time'); ?></th>
			<th><?php echo $this->Paginator->sort('paper'); ?></th>
			<th><?php echo $this->Paginator->sort('pages'); ?></th>
			<th><?php echo $this->Paginator->sort('impression'); ?></th>
			<th><?php echo $this->Paginator->sort('number_suits'); ?></th>
			<th><?php echo $this->Paginator->sort('number_words'); ?></th>
			<th><?php echo $this->Paginator->sort('body_language'); ?></th>
			<th><?php echo $this->Paginator->sort('editor'); ?></th>
			<th><?php echo $this->Paginator->sort('brief_introduction'); ?></th>
			<th><?php echo $this->Paginator->sort('wonderful_review'); ?></th>
			<th><?php echo $this->Paginator->sort('catalog'); ?></th>
			<th><?php echo $this->Paginator->sort('digest'); ?></th>
			<th><?php echo $this->Paginator->sort('foreword_preface'); ?></th>
			<th><?php echo $this->Paginator->sort('http_code'); ?></th>
			<th><?php echo $this->Paginator->sort('download_time'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bookDetails as $bookDetail): ?>
	<tr>
		<td><?php echo h($bookDetail['BookDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookDetail['Category']['name'], array('controller' => 'categories', 'action' => 'view', $bookDetail['Category']['id'])); ?>
		</td>
		<td><?php echo h($bookDetail['BookDetail']['thumbnail']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['wareid']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['cid']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['name']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['price']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['pressid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bookDetail['Author']['name'], array('controller' => 'authors', 'action' => 'view', $bookDetail['Author']['id'])); ?>
		</td>
		<td><?php echo h($bookDetail['BookDetail']['translator']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['drawing']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['isbn']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['revision']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['path']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['packing']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['folio']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['publication_time']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['printing_time']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['paper']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['pages']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['impression']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['number_suits']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['number_words']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['body_language']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['editor']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['brief_introduction']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['wonderful_review']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['catalog']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['digest']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['foreword_preface']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['http_code']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['download_time']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($bookDetail['BookDetail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bookDetail['BookDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookDetail['BookDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bookDetail['BookDetail']['id']), array(), __('Are you sure you want to delete # %s?', $bookDetail['BookDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Book Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
	</ul>
</div>
