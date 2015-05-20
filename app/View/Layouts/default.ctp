<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'ZenCMS');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');
                                    echo $this->Html->css('bootstrap');
		echo $this->Html->script('jquery');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    
        <?php 
        echo $this->Html->css('bootstrap.min'); 
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->script('bootstrap.min'); 
?>
    
</head>
<body>
	<div  id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>
                        <div class="nav">
                                            <div class="nav_links">      
                                                
                                                <?php
//                                                    echo $this->MenuBuilder->build('main-menu');
                                                ?>
                                                <?php echo $this->Html->link( __( 'Home', true ), '/' ); ?>
                                               
                                                &nbsp;|&nbsp;
                                                
                                                <?php echo $this->Html->link('Русский', array('language'=>'chi')); ?>
                                                
                                                &nbsp;|&nbsp;
                                               
                                                <?php 
                                                    
                                                   if ( $this->session->read( 'Auth.User' ) ) {
                                                       
                                                            echo $this->Html->link( __( 'Control Panel', true ), '/admin/acl/acos/index' ); 
                                                            echo "&nbsp;|&nbsp;";
                                                            echo __('Hello') .': '.$this->Html->link($this->session->read( 'Auth.User.username' ) ,'/Users/view/'.$this->session->read( 'Auth.User.id' )). "&nbsp;&nbsp;"; 
//                                                pr($this->session->read( 'Auth.User.username' ) );
                                                            echo $this->Html->link( __( 'Logout', true ), '/Users/logout' );
                                                    }
                                                    else {
                                                            echo $this->Html->link( __( 'Login', true ), '/Users/login' );
                                                    }
                                                ?>                        
                                    </div>                                
                              </div>
		</div>
             <?php
//            if ($this->Session->check('Message.auth')) {
//                echo $this->Session->flash('auth');
//            }
        ?>
                                   
                                    
                                    
                                    
        <div id="content ">
                                           
        <?php
            if ( $this->Session->read( 'Auth.User' ) ) {
                echo '<div class="nav_1">';
                    echo '<div class="nav_links">';     
                    
                        echo $this->Html->link( __( 'Users', true ), '/Users' );
                        
                        echo '&nbsp;|&nbsp;';
                        echo $this->Html->link( __( 'Groups', true ), '/Groups' );
                        
                        echo '&nbsp;|&nbsp;';
                        echo $this->Html->link( __( 'Actions', true ), '/Actions' );
                     
                        echo '&nbsp;|&nbsp;';
                        echo $this->Html->link( __( 'Widgets', true ), '/Widgets/someAction' );
                        
                    echo '</div>';
                echo '</div>';
            }
        ?>
                    
                    
                                                            <?php 
//                                                pr($this->Session->user());
                                                                    echo $this->Session->flash('auth'); //访问权限提示
                                                            ?>
			<?php echo $this->Session->flash(); ?>
                           <?php  echo $this->MenuBuilder->build('left-menu'); ?>
			<?php echo $this->fetch('content'); ?>
                                                            
                                                            
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
    

</body>
</html>
