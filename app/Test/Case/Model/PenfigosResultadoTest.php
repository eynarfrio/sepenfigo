<?php
App::uses('PenfigosResultado', 'Model');

/**
 * PenfigosResultado Test Case
 *
 */
class PenfigosResultadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.penfigos_resultado',
		'app.penfigo',
		'app.resultado',
		'app.examene',
		'app.examenes_paciente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PenfigosResultado = ClassRegistry::init('PenfigosResultado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PenfigosResultado);

		parent::tearDown();
	}

}
