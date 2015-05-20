<!--<form class="form-signin" role="form">
        
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>-->

<?php echo $this->Form->create('User', array(
                    'action' => 'login',
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-signin'
	),
	'class' => 'form-signin well'
));?>

		<h2 class="form-signin-heading">Please sign in </h2>
	<?php echo $this->Form->input('username',array(
//		'label' => __('username'),
		'label' =>false,
                                        'autofocus'=>'autofocus',
		'placeholder' => __('Please fill in the username'),
                                        'class' => 'form-control'
//		'after' => '<span class="help-block">Example block-level help text here.</span>'
		));?>

	<?php echo $this->Form->input('password', array(
//		'label' => __('password'),
		'label' =>false,
                                        'placeholder' => __('Please fill in the password'),
                                        'class' => 'form-control'
//		'value' => !empty( $user['body'] ) ? $user['body'] : ''
		));?>
                    <div class="checkbox">
                            <label>
                                  <input type="checkbox" value="remember-me"> <?php echo __('Remember me'); ?>
                            </label>
                    </div>
                    <?php echo $this->Form->submit(__("Sign in"), array(
			'div' => 'form-group',
			'class' => 'btn btn-lg btn-primary btn-block'
		)); ?>
	<?php // echo $this->Form->input('password',array(
//		'label' => __('Password'),
//		'value' => false));?>

	<?php // echo $this->Form->input('role', array(
//		'label' => __('Role'),
//		'options' => array('admin' => __('Admin'), 'author' => __('Author')),
//		'selected' => !empty( $user['role'] ) ? $user['role'] : ''));?>

<?php echo $this->Form->end();?>

<!--<div class="users form">-->

<?php
//            echo $this->Form->create('User', array('action' => 'login'));
//            echo $this->Form->inputs(array(
//                'legend' => __('Login'),
//                'username',
//                'password'
//            ));
//            echo $this->Form->end('Log In');

?>	
<!--</div>-->