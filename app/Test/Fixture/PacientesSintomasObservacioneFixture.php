<?php
/**
 * PacientesSintomasObservacioneFixture
 *
 */
class PacientesSintomasObservacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'pasientessintoma_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'observacione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'pasientessintoma_id' => 1,
			'observacione_id' => 1,
			'created' => '2015-06-04 22:28:46',
			'modified' => '2015-06-04 22:28:46'
		),
	);

}
