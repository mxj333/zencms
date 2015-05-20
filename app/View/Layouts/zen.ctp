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
		echo $this->Html->css('zen');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    
        <?php 
//        echo $this->Html->css('bootstrap.min'); 
//        echo $this->Html->css('bootstrap-responsive.min');
//        echo $this->Html->script('bootstrap.min'); 
?>
</head>
<body>



    
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
            <a class="navbar-brand"  target="_blank" href="/" title="<?php echo $cakeDescription ?>"><span class="glyphicon glyphicon-home"></span> <?php echo $cakeDescription ?></a>
            <?php //echo $this->Html->image('logo.png', array('alt' => $cakeDescription, 'border' => '0')); ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#Bolg">Bolg</a></li>
            <li><a href="#Download">Download</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
            
<!--          <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown ">
                      <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">中文简体 <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                          
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
                      </ul>
                    </li>
          </ul>-->
          <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="搜索">
                </div>
                <button type="submit" class="btn btn-default hidden">Submit</button>
              </form>
              <!--<li><a href="#">未读消息 <span class="badge">5</span></a></li>-->
              <li><a href="/users/login">登录</a></li>
              <!--<li class="dropdown">-->
                  <?php 
                                                    
//                                                   if ( $this->session->read( 'Auth.User' ) ) {
//                                                       
//                                                            echo $this->Html->link( __( 'Control Panel', true ), '/admin/acl/acos/index' ); 
//                                                            echo "&nbsp;|&nbsp;";
//                                                            echo __('Hello') .': '.$this->Html->link($this->session->read( 'Auth.User.username' ) ,'/Users/view/'.$this->session->read( 'Auth.User.id' )). "&nbsp;&nbsp;"; 
////                                                pr($this->session->read( 'Auth.User.username' ) );
//                                                            echo $this->Html->link( __( 'Logout', true ), '/Users/logout' );
//                                                    }
//                                                    else {
//                                                            echo $this->Html->link( __( 'Login', true ), '/Users/login' );
//                                                    }
                                                ?>        
                  
                  
<!--                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->read( 'Auth.User.username' );?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/Users/view/<?php echo $this->session->read( 'Auth.User.id' );?>"><span class="glyphicon glyphicon-user"></span>  查看</a></li>
                  <li><a href="/Users/edit/<?php echo $this->session->read( 'Auth.User.id' );?>"><span class="glyphicon glyphicon-pencil"></span> 修改</a></li>
                  <li class="divider"></li>
                  <li><a href="/Users/logout"><span class="glyphicon glyphicon-off"></span> 注销</a></li>-->
                </ul>  
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   
      
        
        <div class="container sidebar-nav">
          <div class="row">  


        <!--左侧目录-->
<!--        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
          <div class="list-group">
            <a href="/Posts" class="list-group-item  <?php echo $this->params->params['controller'] == 'Posts' ? 'active' : ''?>"><span class="glyphicon glyphicon-list-alt"></span> 内容管理</a>
            <a href="/Categories" class="list-group-item <?php echo $this->params->params['controller'] == 'Categories' ? 'active' : ''?>"><span class="glyphicon glyphicon-list-alt"></span> 分类管理</a>
            <a href="/Users/" class="list-group-item  <?php echo $this->params->params['controller'] == 'Users' ? 'active' : ''?>"><span class="glyphicon glyphicon-user"></span> 用户管理</a>
            <a href="/admin/acl" class="list-group-item  <?php echo $this->params->params['controller'] == 'acos' ? 'active' : ''?>"><span class="glyphicon glyphicon-cog"></span> 权限控制</a>

          </div>
        </div>-->
 
   <div class="col-xs-12 ">         
<!--            <ol class="breadcrumb">
          <?php echo $this->element('breadcrumb');
//                    echo $this->Html->getCrumbs(' > ', 'Home');
//                    $options = array('tag'=>'li');
//                    echo $this->Html->getCrumbs(' /  ', array(
//                        'text' => ' <span class="glyphicon glyphicon-home"></span> ',
//                        'url' => array('controller' => 'pages', 'action' => 'display', 'home'),
//                        'escape' => false,$options
//                    ));
          ?>  
            </ol>-->
            <?php 
        echo $this->Session->flash('auth'); //访问权限提示
?>
        <?php echo  $this->Session->flash('flash', array('element' => 'failure')); ?>
     <?php // echo $this->params->params['controller'];?>

          <?php echo $this->fetch('content'); ?>
          
          </div>
          </div>

    </div><!-- /.container -->

    
    
 <div class="footer">
      <div class="container">
          			
        <p class="text-muted">© Company <?php echo date("Y");?> <?php echo $this->Html->link(
                        $cakeDescription,
                        'http://www.zencms.cn/',
                        array('target' => '_blank', 'escape' => false)
                );
        ?> Inc. Powered by <?php echo $cakeVersion; ?>
        <?php echo $this->Html->link(
                        $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                        'http://www.cakephp.org/',
                        array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered','class'=>"pull-right")
                );
        ?>
        </p>
      </div>
    </div>


<?php
                    echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap');
?>

	<?php //echo $this->element('sql_dump'); ?>
    

</body>
</html>
