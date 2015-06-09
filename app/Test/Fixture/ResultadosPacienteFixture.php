<?php
/**
 * ResultadosPacienteFixture
 *
 */
class ResultadosPacienteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'resultado_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'paciente_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'valor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'resultado_id' => 1,
			'paciente_id' => 1,
			'valor' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'fecha' => '2015-06-09',
			'created' => '2015-06-09 13:42:12',
			'modified' => '2015-06-09 13:42:12'
		),
	);

}
