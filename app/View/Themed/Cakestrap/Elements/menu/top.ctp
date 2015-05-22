<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, '/'); ?></h1>
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
             