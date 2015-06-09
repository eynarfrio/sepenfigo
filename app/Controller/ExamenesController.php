<?php

class ExamenesController extends AppController {

  public $uses = array('Examene', 'Penfigo', 'PenfigosResultado', 'Resultado');
  var $components = array('RequestHandler');

  public function index() {
    $examenes = $this->Examene->find('all');
    $this->set(compact('examenes'));
  }

  //Funcion Insertar un nuevo examen
  public function add() {
    $this->layout = 'ajax';
    if ($this->request->is('post')) {
      $this->Examene->create();
      if ($this->Examene->save($this->request->data)) {
        $this->Session->setFlash('Registrado Correctamente', 'msgbueno');
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash('Error el registrar!', 'msgerror');
      }
    }
  }

  //Funcion Editar Examen
  public function edit($id = null) {
    $this->layout = 'ajax';
    $this->Examene->id = $id;
    if (!$this->Examene->exists()) {
      throw new NotFoundException(__('Invalido'));
    }
    if ($this->request->is(array('post', 'put'))) {

      if ($this->Examene->save($this->request->data)) {
        $this->Session->setFlash('Registro exitoso', 'msgbueno');
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash('Error al registrar', 'msgerror');
      }
    } else {
      $this->request->data = $this->Examene->read(null, $id);
    }
  }

  //Funcion eliminar Ezamen
  public function delete($id = null) {
    $this->Examene->id = $id;
    if (!$this->Examene->exists()) {
      $this->Session->setFlash('No existe.', 'msgerror');
    }
    if ($this->Examene->delete()) {
      $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
    } else {
      $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

  public function penfigos($idResultado = null) {
    $this->layout = 'ajax';
    $resultado = $this->Resultado->findByid($idResultado, null, null, 0);
    $penfigos = $this->Penfigo->find('list', array('fields' => 'Penfigo.nombre'));
    $penfigos_reg = $this->PenfigosResultado->find('all', array('conditions' => array('PenfigosResultado.resultado_id' => $idResultado)));
    $this->set(compact('penfigos', 'resultado', 'penfigos_reg'));
  }

  public function registra_su_penfigo() {
    $array['correcto'] = '';
    $this->PenfigosResultado->create();
    if ($this->PenfigosResultado->save($this->request->data['PenfigosResultado'])) {
      $array['correcto'] = 'Excelente, Se registro correctamente!!!';
    }
    $this->respond($array, true);
  }

  function respond($message = null, $json = false) {
    if ($message != null) {
      if ($json == true) {
        $this->RequestHandler->setContent('json', 'application/json');
        $message = json_encode($message);
      }
      $this->set('message', $message);
    }
    $this->render('message');
  }
  
  public function quita_su_penfigo($id = null){
    $array['correcto'] = '';
    if ($this->PenfigosResultado->delete($id)) {
      $array['correcto'] = 'Excelente, Se quito la relacion correctamente!!!';
    }
    $this->respond($array, true);
  }

}
