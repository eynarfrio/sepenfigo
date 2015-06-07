<?php

class ExamenesController extends AppController {

    public $uses = array('Examene','Penfigo','PenfigosResultado','Resultado');

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
        $this->layout='ajax';
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
            $this->Session->setFlash('No existe.','msgerror');
        }
        if ($this->Examene->delete()) {
            $this->Session->setFlash('se elimino correctamente.','msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }
    public function penfigos($idResultado = null){
      $resultado = $this->Resultado->findByid($idResultado,null,null,-1);
      $penfigos = $this->Penfigo->find('list',array('fields' => 'Penfigo.nombre'));
      $this->set(compact('penfigos','resultado'));
    }
}
