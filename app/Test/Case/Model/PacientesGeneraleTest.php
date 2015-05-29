<?php
App::uses('PacientesGenerale', 'Model');

/**
 * PacientesGenerale Test Case
 *
 */
class PacientesGeneraleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_generale',
		'app.paciente',
		'app.user',
		'app.datos_generale',
		'app.diagnostico',
		'app.examene',
		'app.examenes_paciente',
		'app.sintoma',
		'app.pacientes_sintoma',
		'app.generale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesGenerale = ClassRegistry::init('PacientesGenerale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesGenerale);

		parent::tearDown();
	}

}
