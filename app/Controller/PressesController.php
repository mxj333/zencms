<?php
App::uses('AppController', 'Controller');
/**
 * Presses Controller
 *
 * @property Press $Press
 * @property PaginatorComponent $Paginator
 */
class PressesController extends AppController {

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
		$this->Press->recursive = 0;
		$this->set('presses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Press->exists($id)) {
			throw new NotFoundException(__('Invalid press'));
		}
		$options = array('conditions' => array('Press.' . $this->Press->primaryKey => $id));
		$this->set('press', $this->Press->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Press->create();
			if ($this->Press->save($this->request->data)) {
				$this->Session->setFlash(__('The press has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The press could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Press->exists($id)) {
			throw new NotFoundException(__('Invalid press'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Press->save($this->request->data)) {
				$this->Session->setFlash(__('The press has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The press could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Press.' . $this->Press->primaryKey => $id));
			$this->request->data = $this->Press->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Press->id = $id;
		if (!$this->Press->exists()) {
			throw new NotFoundException(__('Invalid press'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Press->delete()) {
			$this->Session->setFlash(__('The press has been deleted.'));
		} else {
			$this->Session->setFlash(__('The press could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
