<div class="bookDetails view">
<h2><?php echo __('Book Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookDetail['Category']['name'], array('controller' => 'categories', 'action' => 'view', $bookDetail['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumbnail'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['thumbnail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wareid'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['wareid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cid'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['cid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pressid'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['pressid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookDetail['Author']['name'], array('controller' => 'authors', 'action' => 'view', $bookDetail['Author']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Translator'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['translator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drawing'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['drawing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isbn'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['isbn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revision'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['revision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Packing'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['packing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Folio'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['folio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publication Time'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['publication_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Printing Time'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['printing_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paper'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['paper']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pages'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['pages']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Impression'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['impression']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number Suits'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['number_suits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number Words'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['number_words']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body Language'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['body_language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Editor'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['editor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brief Introduction'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['brief_introduction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wonderful Review'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['wonderful_review']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Catalog'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['catalog']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Digest'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['digest']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreword Preface'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['foreword_preface']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Http Code'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['http_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Download Time'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['download_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bookDetail['BookDetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Book Detail'), array('action' => 'edit', $bookDetail['BookDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Book Detail'), array('action' => 'delete', $bookDetail['BookDetail']['id']), array(), __('Are you sure you want to delete # %s?', $bookDetail['BookDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
	</ul>
</div>
