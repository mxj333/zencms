<?php echo $this->Form->create('Post', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
));?>
<fieldset>
		<legend><?php echo $label ?></legend>
	<?php echo $this->Form->input('title',array(
		'label' => __('title'),
		'placeholder' => __('Please fill in the title'),
//		'after' => '<span class="help-block">Example block-level help text here.</span>'
		));?>

	<?php echo $this->Form->input('body', array(
		'label' => __('body'),
                                        'placeholder' => __('Please fill in the body'),
//		'value' => !empty( $user['body'] ) ? $user['body'] : ''
		));?>
                    <?php echo $this->Form->submit(__("Submit"), array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		)); ?>
	<?php // echo $this->Form->input('password',array(
//		'label' => __('Password'),
//		'value' => false));?>

	<?php // echo $this->Form->input('role', array(
//		'label' => __('Role'),
//		'options' => array('admin' => __('Admin'), 'author' => __('Author')),
//		'selected' => !empty( $user['role'] ) ? $user['role'] : ''));?>
</fieldset>
<?php echo $this->Form->end();?>


<!--
<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
