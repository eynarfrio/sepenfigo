<?php
App::uses('AppModel', 'Model');
/**
 * Paciente Model
 *
 * @property User $User
 * @property Diagnostico $Diagnostico
 * @property Generale $Generale
 */
class Paciente extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
  public $virtualFields = array(
    'nombre_completo' => 'CONCAT(Paciente.nombre, " ", Paciente.ap_paterno," ",Paciente.ap_materno)',
    'ambos_telefonos' => 'CONCAT(Paciente.celular," - ",Paciente.telefono)'
  );
  
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'Diagnostico' => array(
			'className' => 'Diagnostico',
			'foreignKey' => 'paciente_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Generale' => array(
			'className' => 'Generale',
			'joinTable' => 'pacientes_generales',
			'foreignKey' => 'paciente_id',
			'associationForeignKey' => 'generale_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
