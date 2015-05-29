<?php
/**
 * PacientesGeneraleFixture
 *
 */
class PacientesGeneraleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'paciente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'generale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'valor' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '15,2', 'unsigned' => false),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'user_id' => 1,
			'generale_id' => 1,
			'valor' => '',
			'created' => '2015-05-29',
			'modified' => '2015-05-29'
		),
	);

}
