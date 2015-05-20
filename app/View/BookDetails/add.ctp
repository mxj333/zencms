<div class="bookDetails form">
<?php echo $this->Form->create('BookDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Book Detail'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('thumbnail');
		echo $this->Form->input('wareid');
		echo $this->Form->input('cid');
		echo $this->Form->input('name');
		echo $this->Form->input('price');
		echo $this->Form->input('pressid');
		echo $this->Form->input('author_id');
		echo $this->Form->input('translator');
		echo $this->Form->input('drawing');
		echo $this->Form->input('isbn');
		echo $this->Form->input('revision');
		echo $this->Form->input('path');
		echo $this->Form->input('packing');
		echo $this->Form->input('folio');
		echo $this->Form->input('publication_time');
		echo $this->Form->input('printing_time');
		echo $this->Form->input('paper');
		echo $this->Form->input('pages');
		echo $this->Form->input('impression');
		echo $this->Form->input('number_suits');
		echo $this->Form->input('number_words');
		echo $this->Form->input('body_language');
		echo $this->Form->input('editor');
		echo $this->Form->input('brief_introduction');
		echo $this->Form->input('wonderful_review');
		echo $this->Form->input('catalog');
		echo $this->Form->input('digest');
		echo $this->Form->input('foreword_preface');
		echo $this->Form->input('http_code');
		echo $this->Form->input('download_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Book Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
	</ul>
</div>
