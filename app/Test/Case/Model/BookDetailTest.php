<?php
App::uses('BookDetail', 'Model');

/**
 * BookDetail Test Case
 *
 */
class BookDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book_detail',
		'app.category',
		'app.author'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookDetail = ClassRegistry::init('BookDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookDetail);

		parent::tearDown();
	}

}
