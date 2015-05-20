<div class="authors view">
<h2><?php echo __('Author'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($author['Author']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($author['Author']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Introduction'); ?></dt>
		<dd>
			<?php echo h($author['Author']['introduction']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Author'), array('action' => 'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Author'), array('action' => 'delete', $author['Author']['id']), array(), __('Are you sure you want to delete # %s?', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Details'), array('controller' => 'book_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Detail'), array('controller' => 'book_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Book Details'); ?></h3>
	<?php if (!empty($author['BookDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Thumbnail'); ?></th>
		<th><?php echo __('Wareid'); ?></th>
		<th><?php echo __('Cid'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Pressid'); ?></th>
		<th><?php echo __('Author Id'); ?></th>
		<th><?php echo __('Translator'); ?></th>
		<th><?php echo __('Drawing'); ?></th>
		<th><?php echo __('Isbn'); ?></th>
		<th><?php echo __('Revision'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('Packing'); ?></th>
		<th><?php echo __('Folio'); ?></th>
		<th><?php echo __('Publication Time'); ?></th>
		<th><?php echo __('Printing Time'); ?></th>
		<th><?php echo __('Paper'); ?></th>
		<th><?php echo __('Pages'); ?></th>
		<th><?php echo __('Impression'); ?></th>
		<th><?php echo __('Number Suits'); ?></th>
		<th><?php echo __('Number Words'); ?></th>
		<th><?php echo __('Body Language'); ?></th>
		<th><?php echo __('Editor'); ?></th>
		<th><?php echo __('Brief Introduction'); ?></th>
		<th><?php echo __('Wonderful Review'); ?></th>
		<th><?php echo __('Catalog'); ?></th>
		<th><?php echo __('Digest'); ?></th>
		<th><?php echo __('Foreword Preface'); ?></th>
		<th><?php echo __('Http Code'); ?></th>
		<th><?php echo __('Download Time'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($author['BookDetail'] as $bookDetail): ?>
		<tr>
			<td><?php echo $bookDetail['id']; ?></td>
			<td><?php echo $bookDetail['category_id']; ?></td>
			<td><?php echo $bookDetail['thumbnail']; ?></td>
			<td><?php echo $bookDetail['wareid']; ?></td>
			<td><?php echo $bookDetail['cid']; ?></td>
			<td><?php echo $bookDetail['name']; ?></td>
			<td><?php echo $bookDetail['price']; ?></td>
			<td><?php echo $bookDetail['pressid']; ?></td>
			<td><?php echo $bookDetail['author_id']; ?></td>
			<td><?php echo $bookDetail['translator']; ?></td>
			<td><?php echo $bookDetail['drawing']; ?></td>
			<td><?php echo $bookDetail['isbn']; ?></td>
			<td><?php echo $bookDetail['revision']; ?></td>
			<td><?php echo $bookDetail['path']; ?></td>
			<td><?php echo $bookDetail['packing']; ?></td>
			<td><?php echo $bookDetail['folio']; ?></td>
			<td><?php echo $bookDetail['publication_time']; ?></td>
			<td><?php echo $bookDetail['printing_time']; ?></td>
			<td><?php echo $bookDetail['paper']; ?></td>
			<td><?php echo $bookDetail['pages']; ?></td>
			<td><?php echo $bookDetail['impression']; ?></td>
			<td><?php echo $bookDetail['number_suits']; ?></td>
			<td><?php echo $bookDetail['number_words']; ?></td>
			<td><?php echo $bookDetail['body_language']; ?></td>
			<td><?php echo $bookDetail['editor']; ?></td>
			<td><?php echo $bookDetail['brief_introduction']; ?></td>
			<td><?php echo $bookDetail['wonderful_review']; ?></td>
			<td><?php echo $bookDetail['catalog']; ?></td>
			<td><?php echo $bookDetail['digest']; ?></td>
			<td><?php echo $bookDetail['foreword_preface']; ?></td>
			<td><?php echo $bookDetail['http_code']; ?></td>
			<td><?php echo $bookDetail['download_time']; ?></td>
			<td><?php echo $bookDetail['created']; ?></td>
			<td><?php echo $bookDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'book_details', 'action' => 'view', $bookDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'book_details', 'action' => 'edit', $bookDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'book_details', 'action' => 'delete', $bookDetail['id']), array(), __('Are you sure you want to delete # %s?', $bookDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book Detail'), array('controller' => 'book_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
