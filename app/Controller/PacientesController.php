<?php

App::uses('AppController', 'Controller');

class PacientesController extends AppController {
  public $uses = array('Paciente','Generale','PacientesGenerale');
  public function index(){
    $pacientes = $this->Paciente->find('all');
    $this->set(compact('pacientes'));
  }
  public function paciente($idPaciente = null){
    $this->Paciente->id = $idPaciente;
    $this->request->data = $this->Paciente->read();
  }
  public function registra_paciente(){
    if(!empty($this->request->data['Paciente'])){
      $this->Paciente->create();
      $this->Paciente->save($this->request->data['Paciente']);
      $this->Session->setFlash("Se registro los datos del paciente correctamente!!",'msgbueno');
      if(empty($this->request->data['Paciente']['id'])){
        $idPaciente = $this->Paciente->getLastInsertID();
        $this->redirect(array('action' => 'generales',$idPaciente));
      }else{
        $this->redirect(array('action' => 'index'));
      }
    }else{
      $this->Session->setFlash("No se pudo registrar los datos del paciente intente nuevamente!!",'msgerror');
      $this->redirect($this->referer());
    }
  }
  public function generales($idPaciente = null,$fecha = NULL){
    $paciente = $this->Paciente->find('first',array(
      'conditions' => array('Paciente.id' => $idPaciente),
      'fields' => array('Paciente.id','Paciente.nombre_completo')
    ));
    $edita = $this->PacientesGenerale->find('list',array(
      'fields' => array('generale_id','valor'),
      'conditions' => array('paciente_id' => $idPaciente,'created' => $fecha)
    ));
    $edita_id = $this->PacientesGenerale->find('list',array(
      'fields' => array('generale_id','id'),
      'conditions' => array('paciente_id' => $idPaciente,'created' => $fecha)
    ));
    $generales = $this->Generale->find('all');
    $this->set(compact('generales','paciente','edita','edita_id'));
  }
  public function registra_generales($idPaciente = null){
    if(!empty($this->request->data['PacientesGenerale'])){
      $this->PacientesGenerale->saveAll($this->request->data['PacientesGenerale']);
    $this->Session->setFlash("Se registro correctamente los datos generales del paciente!!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se pudo registrar los datos generales del paciente intente nuevamente!!",'msgbueno');
    }
    $this->redirect(array('action' => 'verpaciente',$idPaciente));
  }
  public function verpaciente($idPaciente =- null){
    $paciente = $this->Paciente->findByid($idPaciente,null,null,2);
    //debug($paciente);exit;
    $this->set(compact('paciente'));
  }
  
}