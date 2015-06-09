<?php
App::uses('AppModel', 'Model');
/**
 * ResultadosPaciente Model
 *
 * @property Resultado $Resultado
 * @property Paciente $Paciente
 * @property User $User
 */
class ResultadosPaciente extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Resultado' => array(
			'className' => 'Resultado',
			'foreignKey' => 'resultado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		)
	);
}
