<?php
App::uses('AppModel', 'Model');
/**
 * Examene Model
 *
 * @property Resultado $Resultado
 */
class Examene extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Resultado' => array(
			'className' => 'Resultado',
			'foreignKey' => 'examene_id',
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
