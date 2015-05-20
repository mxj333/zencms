<?php
App::uses('TempBook', 'Model');

/**
 * TempBook Test Case
 *
 */
class TempBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.temp_book',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TempBook = ClassRegistry::init('TempBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TempBook);

		parent::tearDown();
	}

}
