<?php
App::uses('AppModel', 'Model');
/**
 * PacientesGenerale Model
 *
 * @property Paciente $Paciente
 * @property User $User
 * @property Generale $Generale
 */
class PacientesGenerale extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'paciente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Generale' => array(
			'className' => 'Generale',
			'foreignKey' => 'generale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
