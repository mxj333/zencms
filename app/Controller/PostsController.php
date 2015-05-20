<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
                    
                   // public $theme = 'Admin';

/*
 * 添加一些例外，以便AuthComponent将使我们能够创造一些组和用户。
 * 
 */
//                    public function beforeFilter() {
//                        parent::beforeFilter();
//                        $this->Auth->allow('add');
//                    }        

/*
 * 我们要在PostsController中增加规则，允许作者创建posts并且防止其他作者对其post做改动。 
 * 
 * 我们现在重写了 AppController 的 isAuthorized() 方法并且在父类中已核准用户后再进行内部检查，
 * 如果他不是,只允许他访问add动作, 并有条件访问edit 和 delete动作. 
 * 最后在 Post 模型中调用 isOwnedBy() 来告诉用户是否有权限来编辑post.
 * 一般的好做法是，以尽可能多的把逻辑挪到模型中去实现。
 */                    
                    public function isAuthorized($user) {
                        // All registered users can add posts
//                        if ($this->action === 'add') {
//                            return true;
//                        }
                        $this->Post->locale = Configure::read('Config.languages');

                        // The owner of a post can edit and delete it
                        if (in_array($this->action, array('edit', 'delete'))) {
                            $postId = $this->request->params['pass'][0];
                            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                                return true;
                            }
                        }

                        return parent::isAuthorized($user);
                    }


/**
 * index method
 *
 * @return void
 */
	public function index() {
                                        $this->theme =  'Admin';
//                                        $this->Post->locale = Configure::read('Config.languages');
		$this->Post->recursive = 0;
//                                        $this->paginate = array(
//                                                    'Post'=>array(
//                                                                            'conditions' => array(), //'Contract.contract_name LIKE' => 'a%'					
//                                                                            'limit' => 200)
//                                            );
//                                        $this->paginate = array('limit' => 1);
                                            $this->paginate = array(
                                                    'Post'=>array('conditions' => array(), //'Contract.contract_name LIKE' => 'a%'
				'limit' => 4,
                                                                                'order'=>'Post.id desc'
                                                        )

			);
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                                        $this->theme =  'Admin';
		if ($this->request->is('post')) {
			$this->Post->create();
                        
                                                            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
                                                                               
				return $this->redirect(array('action' => 'index'));
			} else {
//				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
                                                                                $this->Session->setFlash(__('The post could not be saved. Please, try again..'), 'alert', array(
                                                                                        'plugin' => 'BoostCake',
                                                                                        'class' => 'alert-warning'
                                                                                ));
			}
		}
                                        $this->Post->locale = Configure::read('Config.languages');
		$users = $this->Post->User->find('list');
               
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
                                        $this->theme =  'Admin';
                                        /*
                                         * 这个动作首先确保用户已经访问到了一个已存的记录。
                                         * 如果他们没有传入 $id 的值或者post 没有找到，就抛出 NotFoundException 异常让 CakePHP ErrorHandler 来处理.
                                         */
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
                                        /*
                                         * 检查这个请求是否是一个POST请求，如果是，然后我们使用POST中的数据来 更新Post记录，否则就退回并将验证的错误显示给用户。
                                         */
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
//                 $acls =  $this->Acl->check('User::'.$this->Auth->user('id'), 'Post', 'update') ;
//                                         pr($acls);
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 * 在View中使用 postLink() 将创建一个链接使用Javascrip来创建一个删除我们post的POST类型请求. 
 * 使用GET请求来删除内容是危险的,因为web爬虫将有机会删除你所有的内容.
 */
	public function delete($id = null) {
		$this->Post->id = $id;
                                        //显示给用户确认信息。如果用户尝试通过GET请求删除post时，我们抛出异常。
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
