<div class="users form">
<?php
            echo $this->Form->create('User', array('action' => 'login'));
            echo $this->Form->inputs(array(
                'legend' => __('Login'),
                'username',
                'password'
            ));
            echo $this->Form->end('Log In');

?>	
</div>