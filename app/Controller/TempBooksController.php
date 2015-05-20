<?php
App::uses('AppController', 'Controller');
/**
 * TempBooks Controller
 *
 * @property TempBook $TempBook
 * @property PaginatorComponent $Paginator
 */
class TempBooksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TempBook->recursive = 0;
		$this->set('tempBooks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TempBook->exists($id)) {
			throw new NotFoundException(__('Invalid temp book'));
		}
		$options = array('conditions' => array('TempBook.' . $this->TempBook->primaryKey => $id));
		$this->set('tempBook', $this->TempBook->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TempBook->create();
			if ($this->TempBook->save($this->request->data)) {
				$this->Session->setFlash(__('The temp book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->TempBook->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TempBook->exists($id)) {
			throw new NotFoundException(__('Invalid temp book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TempBook->save($this->request->data)) {
				$this->Session->setFlash(__('The temp book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The temp book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TempBook.' . $this->TempBook->primaryKey => $id));
			$this->request->data = $this->TempBook->find('first', $options);
		}
		$categories = $this->TempBook->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TempBook->id = $id;
		if (!$this->TempBook->exists()) {
			throw new NotFoundException(__('Invalid temp book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TempBook->delete()) {
			$this->Session->setFlash(__('The temp book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The temp book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
