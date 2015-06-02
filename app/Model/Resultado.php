<?php
App::uses('AppModel', 'Model');
/**
 * Resultado Model
 *
 * @property Examen $Examen
 * @property ExamenesPaciente $ExamenesPaciente
 */
class Resultado extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Examene' => array(
			'className' => 'Examene',
			'foreignKey' => 'examene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ExamenesPaciente' => array(
			'className' => 'ExamenesPaciente',
			'foreignKey' => 'resultado_id',
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
