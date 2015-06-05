<?php
App::uses('AppModel', 'Model');
/**
 * PacientesSintomasObservacione Model
 *
 * @property Pasientessintoma $Pasientessintoma
 * @property Observacione $Observacione
 */
class PacientesSintomasObservacione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PacientesSintoma' => array(
			'className' => 'PacientesSintoma',
			'foreignKey' => 'pasientessintoma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Observacione' => array(
			'className' => 'Observacione',
			'foreignKey' => 'observacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
