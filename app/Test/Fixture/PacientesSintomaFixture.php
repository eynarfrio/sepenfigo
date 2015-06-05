<?php
/**
 * PacientesSintomaFixture
 *
 */
class PacientesSintomaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'paciente_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sintoma_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'region_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'observacion_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'diagnostico_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'paciente_id' => 1,
			'sintoma_id' => 1,
			'region_id' => 1,
			'observacion_id' => 1,
			'user_id' => 1,
			'diagnostico_id' => 1,
			'created' => '2015-06-04 19:12:14',
			'modified' => '2015-06-04 19:12:14'
		),
	);

}
