<?php
App::uses('ResultadosPaciente', 'Model');

/**
 * ResultadosPaciente Test Case
 *
 */
class ResultadosPacienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.resultados_paciente',
		'app.resultado',
		'app.examene',
		'app.examenes_paciente',
		'app.paciente',
		'app.user',
		'app.diagnostico',
		'app.generale',
		'app.pacientes_generale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResultadosPaciente = ClassRegistry::init('ResultadosPaciente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResultadosPaciente);

		parent::tearDown();
	}

}
