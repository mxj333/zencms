<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
 App::import('Core', 'l10n');     

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   
  /*
   * 因为我们希望我们整个网站的控制，身份验证和访问控制列表，我们将它们设置在 AppController的
   *
   * 创建 ‘root’ 或者被称为 ‘controllers’ 的顶层的 ACO。 
   * 这个root节点的目的是为了在整个应用的空间内更方便地允许/拒绝访问。 
   * 并且允许对 跨控制器/动作（例如检查模型记录权限）使用Acl。 
   * 为了使用全局的root ACO，我们需要修改 AuthComponent 配置。 
   * AuthComponent 需要知道root节点是否存在，所以当进行ACL 检查的时候它可以在控制器/动作中寻找到正确的节点路径。
   * 在中确保 AppController 你的 $components 数组中包含 actionPath 的定义 
   * 
   * 让我们增强应用的安全性，避免用户编辑或删除其他用户的posts，
   * 基本的规则是管理用户可以访问任何的url地址，
   * 当前的用户（作者角色）只可以访问到允许的地址。
   */
       public $components = array(
                    'DebugKit.Toolbar',
                    'Acl',
                    'Auth' => array(
//                        'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
                            'authorize' => array('Actions' => array('actionPath' => 'controllers') ,'Controller' ),//root 让我们增强应用的安全性，避免用户编辑或删除其他用户的posts，
                            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
                            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
                            'flash' => array(
				'element' => 'alert',
				'key' => 'auth',
				'params' => array(
					'plugin' => 'BoostCake',
					'class' => 'alert-warning alert-error'
				)
			)
                    ),

           
           
           
                    'Session'
          );
       
       
            
            
            public $helpers = array('Html', 'Form', 'Session', 'MenuBuilder.MenuBuilder');
//            public $helpers = array(
//		'Session',
//		'CakeStrap' => array('className' => 'CakeStrapHtml'),
//		'Form' => array('className' => 'CakeStrapForm'),
////		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
//                                        'MenuBuilder.MenuBuilder'
//	);
//                public $helpers = array(
//		'Session',
//		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
//		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
//		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
//	);
               public $theme = "Cakestrap";

//public $helpers = array(
//                         'CakeStrap' => array('className' => 'CakeStrapHtml'),
//                          'Form' => array('className' => 'CakeStrapForm'));
/*
 * 我们在 `` beforeFilter`` 中所做的功能是告诉组件 AuthComponent，在控制器中的所有 index 和 view 行动都不需要登录。
 * 我们希望我们的访问者能够读取和列出posts，而不需要注册网站。
 * 
 */            
                    public function beforeFilter() {
                        
//                        if ($this->Session->check('Config.language')) {
//                                Configure::write('Config.language', $this->Session->read('Config.language'));
//                        }
                        
                        $locale = Configure::read('Config.language');
                        if ($locale && file_exists(APP . 'View' . DS . $locale . DS . $this->viewPath)) {
                            // e.g. use /app/View/fra/Pages/tos.ctp instead of /app/View/Pages/tos.ctp
                            $this->viewPath = $locale . DS . $this->viewPath;
                        }
//                        pr($locale);
                        if  ( $this -> Session -> check ( 'Config.language' ))  { 
                                 Configure :: write ( 'Config.language' ,  $this -> Session -> read ( 'Config.language' )); 
                        } 
                        
                        $user = $this->Auth->user();
//                        $this->set(compact('user'));
//        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');

        
                        //Configure AuthComponent
                        $this->Auth->loginAction = array(
                          'admin' => false,
                          'controller' => 'users',
                          'action' => 'login'
                        );
                        $this->Auth->logoutRedirect = array(
                           'admin' => false,
                          'controller' => 'users',
                          'action' => 'login'
                        );
                        $this->Auth->logoutRedirect = array(
                           'full_calendar' => false,
                          'controller' => 'users',
                          'action' => 'login'
                        );
                           $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
//                        $this->Auth->loginRedirect = array(
//                          'controller' => 'posts',
//                          'action' => 'add'
//                        );
                        $this->Auth->allow('display');
//                        $this->Auth->deny('admin');
                        
                        $leftmenus = array();
                        $controller = $this->params['controller'];
                        switch ($controller) {
                            case 'posts':
                                        $leftmenus =array(
                                        'title' => 'Item 1',
                                        'url' => array('controller' => 'posts', 'action' => 'index'),
                                        'children' => array(
                                            array(
                                                'title' => 'Item 3',
                                                'url' => array('controller' => 'Groups', 'action' => 'index'),
                                            ),
                                            array(
                                                'title' => 'Item 4',
                                                'url' => array('controller' => 'items', 'action' => 'view', 4),
                                            ),
                                        )
                                    );

                                break;
                            case 'manuals':
                                        $leftmenus=array(
                                            'title' => 'Item 2',
                                            'url' => array('controller' => 'items', 'action' => 'view', 2),
                                             'children' => array(
                                                    array(
                                                        'title' => 'Item 33',
                                                        'url' => array('controller' => 'Groups', 'action' => 'view', 3),
                                                    ),
                                                    array(
                                                        'title' => 'Item 444',
                                                        'url' => array('controller' => 'items', 'action' => 'view', 4),
                                                    ),
                                                )
                                        );

                                break;
                            case 'Groups':
                                        $leftmenus=array(
                                                'title' => 'Item 2221',
                                                'url' => array('controller' => 'items', 'action' => 'view', 1),
                                                'children' => array(
                                                    array(
                                                        'title' => 'Item 3222',
                                                        'url' => array('controller' => 'Groups', 'action' => 'view', 3),
                                                    ),
                                                    array(
                                                        'title' => 'Item 4222',
                                                        'url' => array('controller' => 'items', 'action' => 'view', 4),
                                                    ),
                                                )
                                        );

                                break;

                            default:
                                break;
                        }
                        
                        
                            // Define your menu
                            $menu = array(
                                'main-menu' => array(
                                    //任何人都可以看到这个
                                    array(
                                        'title' => '软件下载',
                                        'url' => array('controller' => 'posts', 'action' => 'index'),
                                    ),
                                    array(
                                        'title' => '操作手册',
                                        'url' => array('controller' => 'manuals', 'action' => 'index'),
                                    ),
                                    array(
                                        'title' => '常见问题',
                                        'url' => array('controller' => 'posts', 'action' => 'index'),
                                    ),
                                    //用户和管理员可以看到这一点，客人和管理者不能
                                    array(
                                        'title' => '后台管理',
                                        'url' => '/pages/about-us',
//                                        'permissions' => array('user','admin'),
                                    ),
                                ),
                                'left-menu' => array( $leftmenus),
                            );
//pr($leftmenus);
                            // For default settings name must be menu
                            $this->set(compact('menu','user'));
    
    
    
                    }
            

            
            /*
             * 
             * 我们只创建了一个非常简单的权限机制。
             * 在这个例子中用户登录后角色是``admin`` 的将可以访问任何地址，而其余的（例如角色 author ) 同未登录的用户一样不能够做任何事。
             * 这并不是我们所想要的，所以我们需要在我们的 isAuthorized() 方法中支持更多的规则. 与其在 AppController中设置, 
             * 不如委托每个控制器提供这些额外的规则。
             * 
             */
            
                public function isAuthorized($user) {
                        // Any registered user can access public functions
//                        if (empty($this->request->params['admin'])) {
//                            return true;
//                        }

                        // Only admins can access admin functions
//                        if (isset($this->request->params['admin'])) {
//                            return (bool)($user['group_id'] === '1');
//                        }
//                        // Default deny
//                        return false;
    
                }

    
    
}
