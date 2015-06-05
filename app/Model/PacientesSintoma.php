<?php
App::uses('AppModel', 'Model');
/**
 * PacientesSintoma Model
 *
 * @property Paciente $Paciente
 * @property Sintoma $Sintoma
 * @property Region $Region
 * @property Observacion $Observacion
 * @property User $User
 * @property Diagnostico $Diagnostico
 */
class PacientesSintoma extends AppModel {


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
		'Sintoma' => array(
			'className' => 'Sintoma',
			'foreignKey' => 'sintoma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Regione' => array(
			'className' => 'Regione',
			'foreignKey' => 'regione_id',
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
		'Diagnostico' => array(
			'className' => 'Diagnostico',
			'foreignKey' => 'diagnostico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
