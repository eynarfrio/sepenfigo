<?php
App::uses('AppModel', 'Model');
/**
 * Tratamiento Model
 *
 * @property Diagnostico $Diagnostico
 */
class Tratamiento extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Diagnostico' => array(
			'className' => 'Diagnostico',
			'foreignKey' => 'tratamiento_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
