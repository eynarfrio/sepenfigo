<?php
App::uses('AppModel', 'Model');
/**
 * PenfigosResultado Model
 *
 * @property Penfigo $Penfigo
 * @property Resultado $Resultado
 */
class PenfigosResultado extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Penfigo' => array(
			'className' => 'Penfigo',
			'foreignKey' => 'penfigo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Resultado' => array(
			'className' => 'Resultado',
			'foreignKey' => 'resultado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
