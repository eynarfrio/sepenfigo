<?php
App::uses('PacientesSintomasObservacione', 'Model');

/**
 * PacientesSintomasObservacione Test Case
 *
 */
class PacientesSintomasObservacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_sintomas_observacione',
		'app.pasientessintoma',
		'app.observacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesSintomasObservacione = ClassRegistry::init('PacientesSintomasObservacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesSintomasObservacione);

		parent::tearDown();
	}

}
