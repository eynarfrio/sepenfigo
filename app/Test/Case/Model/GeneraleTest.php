<?php
App::uses('Generale', 'Model');

/**
 * Generale Test Case
 *
 */
class GeneraleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.generale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Generale = ClassRegistry::init('Generale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Generale);

		parent::tearDown();
	}

}
