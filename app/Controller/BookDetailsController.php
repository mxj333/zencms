<?php
App::uses('AppController', 'Controller');
/**
 * BookDetails Controller
 *
 * @property BookDetail $BookDetail
 * @property PaginatorComponent $Paginator
 */
class BookDetailsController extends AppController {

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
		$this->BookDetail->recursive = 0;
		$this->set('bookDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BookDetail->exists($id)) {
			throw new NotFoundException(__('Invalid book detail'));
		}
		$options = array('conditions' => array('BookDetail.' . $this->BookDetail->primaryKey => $id));
		$this->set('bookDetail', $this->BookDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BookDetail->create();
			if ($this->BookDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The book detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book detail could not be saved. Please, try again.'));
			}
		}
		$categories = $this->BookDetail->Category->find('list');
		$authors = $this->BookDetail->Author->find('list');
		$this->set(compact('categories', 'authors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BookDetail->exists($id)) {
			throw new NotFoundException(__('Invalid book detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BookDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The book detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BookDetail.' . $this->BookDetail->primaryKey => $id));
			$this->request->data = $this->BookDetail->find('first', $options);
		}
		$categories = $this->BookDetail->Category->find('list');
		$authors = $this->BookDetail->Author->find('list');
		$this->set(compact('categories', 'authors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BookDetail->id = $id;
		if (!$this->BookDetail->exists()) {
			throw new NotFoundException(__('Invalid book detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BookDetail->delete()) {
			$this->Session->setFlash(__('The book detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
